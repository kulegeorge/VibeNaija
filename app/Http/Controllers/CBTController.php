<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
  use App\Notifications\PlatformNotification;

class CBTController extends Controller
{

    
    public function start($encryptedTopicId, $encryptedTaskId)
{


    // First decrypt the IDs
   $id = decrypt($encryptedTopicId);
    $taskId  = decrypt($encryptedTaskId);
     
 
    // Now fetch the topic
    $topic = Topic::findOrFail($id);

    // Prevent re-opening exam after attempt
    $attempted = UserAnswer::where('user_id', auth()->id())->where('taskId',$taskId)
        ->whereIn('question_id', $topic->questions->pluck('id'))
        ->exists();

    if ($attempted) {
$user = Auth::user();
$user->notify(new PlatformNotification(
    title: 'Quiz Already Attempted',
    message: ' You have already taken this Quiz',
    type: 'Quiz',
   
));
        return redirect()->route('cbt.result', $topic->id)
                         ->with('error', 'You have already taken this test.');
    }

    $questions = $topic->questions;

    return view('admin.cbt.start', compact('topic', 'questions','taskId'));
}



    public function submit(Request $request)
{
    // Check if user has already attempted this CBT
    $existing = UserAnswer::where('user_id', auth()->id())->where('taskId',$request->task_id)
        ->whereIn('question_id', $request->question_id)
        ->exists();

    if ($existing) {
        $user = Auth::user();
$user->notify(new PlatformNotification(
    title: 'Quiz Already Attempted',
    message: ' You have already taken this Quiz',
    type: 'Quiz',
   
));
        return back()->with('error', 'You have already attempted this test. Only one attempt is allowed.');
    }

    // Save new answers (first and only attempt)
    foreach ($request->question_id as $key => $id) {

        $question = Question::find($id);
        $selected = $request->selected_option[$key];

        UserAnswer::create([
            'user_id'        => auth()->id(),
            'question_id'    => $id,
            'taskId'        => $request->task_id,
            'selected_option'=> $selected,
            'is_correct'     => $selected == $question->correct_option,
        ]);
    }

    $user = Auth::user();
$user->notify(new PlatformNotification(
    title: 'Quiz completed',
    message: ' You just concluded your Quiz',
    type: 'Quiz',
   
));

    return redirect()->route('cbt.result', $request->topic_id);
}


    public function result(Topic $topic)
{
    $userId = auth()->id();
    $questionIDs = $topic->questions()->pluck('id');

    $total = $questionIDs->count();

    $score = UserAnswer::where('user_id', $userId)
                       ->whereIn('question_id', $questionIDs)
                       ->where('is_correct', true)
                       ->count();

   $taskId = UserAnswer::where('user_id', $userId)
                    ->whereIn('question_id', $questionIDs)
                    ->where('is_correct', true)
                    ->value('taskId');
                    

    $percentage = $total ? ($score / $total) * 100 : 0;

    // 🔍 Check if result already exists
    $existingResult = Result::where('user_id', $userId)
                            ->where('topic_id', $topic->id)
                            ->where('taskId', $taskId)
                            ->exists();

    // 💾 Only store if not already stored
    if (!$existingResult) {
        Result::create([
            'user_id'    => $userId,
            'topic_id'   => $topic->id,
            'score'      => $score,
            'total'      => $total,
            'percentage' => $percentage,
            'taskId'     => $taskId,
        ]);

        $user = Auth::user();
$user->notify(new PlatformNotification(
    title: 'Quiz Result',
    message: ' Your performance is:'.$percentage.'. Check task submissions to see result',
    type: 'Quiz',
   
));
    }



    return view('admin.cbt.result', compact('topic', 'score', 'total', 'percentage'));
}
}
