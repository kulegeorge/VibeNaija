<?php

namespace App\Http\Controllers;

use App\Models\UserTaskSubmission;
use App\Models\User;

use Illuminate\Http\Request;

class AdminTaskController extends Controller
{
    // List all pending submissions
    public function index()
    {
        $submissions = UserTaskSubmission::with('task', 'user')
            ->where('status', 'pending')
            ->latest()
            ->paginate(20);

        return view('admin.taskSubmissions.taskApproval', compact('submissions'));
    }


    // Show a specific submission
    public function show($id)
    {
        $submission = UserTaskSubmission::with('task', 'user')->findOrFail($id);

        return view('admin.task_submissions.view', compact('submission'));
    }


    // Approve submission + award points
    public function approve($id)
    {
        $submission = UserTaskSubmission::with('task', 'user')->findOrFail($id);

        // Update status
        $submission->status = 'approved';
        $submission->save();

        // Award task points to user's total points
        $user = $submission->user;
        $user->points += $submission->task->points;
        $user->save();

        return redirect()->back()->with('success', 'Submission approved and points awarded!');
    }


    // Reject submission
    public function reject($id)
    {
        $submission = UserTaskSubmission::findOrFail($id);
        $submission->status = 'rejected';
        $submission->save();

        return redirect()->back()->with('info', 'Submission rejected.');
    }
}
