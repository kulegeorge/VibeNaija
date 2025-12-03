<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
  use App\Notifications\PlatformNotification;

class QuestionController extends Controller
{
    public function index(Topic $topic)
    {

           
        return view('admin.questions.index', [
            'topic' => $topic,
            'questions' => $topic->questions
        ]);
    }

    public function create(Topic $topic)
    {
        return view('admin.questions.create', compact('topic'));
    }

    public function store(Request $request, Topic $topic)
    {
        $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'correct_option' => 'required|in:a,b,c,d',
        ]);

        $topic->questions()->create($request->all());

        return redirect()->route('questions.index', $topic->id)
                         ->with('success', 'Question added!');
    }
}


