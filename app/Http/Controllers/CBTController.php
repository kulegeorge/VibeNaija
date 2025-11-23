<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class CBTController extends Controller
{
   public function start(Topic $topic)
{
    // Prevent re-opening exam after attempt
    $attempted = UserAnswer::where('user_id', auth()->id())
        ->whereIn('question_id', $topic->questions->pluck('id'))
        ->exists();

    if ($attempted) {
        return redirect()->route('cbt.result', $topic->id)
                         ->with('error', 'You have already taken this test.');
    }

    $questions = $topic->questions;

    return view('admin.cbt.start', compact('topic', 'questions'));
}


    public function submit(Request $request)
{
    // Check if user has already attempted this CBT
    $existing = UserAnswer::where('user_id', auth()->id())
        ->whereIn('question_id', $request->question_id)
        ->exists();

    if ($existing) {
        return back()->with('error', 'You have already attempted this test. Only one attempt is allowed.');
    }

    // Save new answers (first and only attempt)
    foreach ($request->question_id as $key => $id) {

        $question = Question::find($id);
        $selected = $request->selected_option[$key];

        UserAnswer::create([
            'user_id'        => auth()->id(),
            'question_id'    => $id,
            'selected_option'=> $selected,
            'is_correct'     => $selected == $question->correct_option,
        ]);
    }

    return redirect()->route('cbt.result', $request->topic_id);
}


    public function result(Topic $topic)
    {
        $questionIDs = $topic->questions()->pluck('id');

        $total = $questionIDs->count();

        $score = UserAnswer::where('user_id', auth()->id())
                           ->whereIn('question_id', $questionIDs)
                           ->where('is_correct', true)
                           ->count();

        $percentage = $total ? ($score / $total) * 100 : 0;

        return view('admin.cbt.result', compact('topic', 'score', 'total', 'percentage'));
    }
}
