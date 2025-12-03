<?php

namespace App\Http\Controllers;

use App\Models\UserTaskSubmission;
use App\Models\User;
  use App\Notifications\PlatformNotification;
  use Illuminate\Support\Facades\Auth;

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
    public function approve(Request $request, $id)
    {
   
        $submission = UserTaskSubmission::with('task', 'user')->findOrFail($id);

        // Update status
        $submission->status = 'approved';
        $submission->badge_icon = $submission->task->badge_icon;
        $submission->badges_name = $submission->task->badge_name;
        $submission->decision_message = $request->decision_message;
        $submission->save();

        // Award task points to user's total points
        $user = $submission->user;
        $user->points += $submission->task->task_points;

        $user->save();


$user->notify(new PlatformNotification(
    title: 'Task Approved',
    message: 'Congratulations! Your '.$submission->task->taskname.' has been approved!',
    url: route('task.show', encrypt($submission->task->id)),
    type: 'task_approved',
    meta: ['task_id' => $submission->task->id],
));
         $notification = array(
                    'message' => 'Submission approved and points awarded!',
                    'alert-type' => 'success'
                );
         return redirect()->back()->with($notification);
       
    }


    // Reject submission
    public function reject(Request $request, $id)
    {
        
        $submission = UserTaskSubmission::findOrFail($id);
        $submission->status = 'rejected';

        $submission->decision_message = $request->decision_message;
        $submission->save();
// Get the user who submitted it
    $user = $submission->user; // <-- FIXED HERE
$user->notify(new PlatformNotification(
    title: 'Task Rejected',
    message: 'Sorry! Your '.$submission->task->taskname.' has been rejected!',
    url: route('task.show', encrypt($submission->task_id)),
    type: 'task_rejected',
    meta: ['task_id' => $submission->task_id],
));
$notification = array(
                    'message' => 'Submission rejected.',
                    'alert-type' => 'success'
                );
         return redirect()->back()->with($notification);
       
    }
}
