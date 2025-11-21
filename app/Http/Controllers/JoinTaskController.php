<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JoinTask;
use App\Models\Tasks;
use DB;

class JoinTaskController extends Controller
{
    //Enrol for Task
    public function enrolTask($id)
{
    $userID = Auth::id();

    // 1. Verify that the task exists
    $task = Tasks::find($id);
    if (!$task) {
        return redirect()->back()->with([
            'message' => 'Invalid Task!',
            'alert-type' => 'error'
        ]);
    }

    // 2. (Optional) verify task is active
    if ($task->status != 1) { // if you use 1 = active
        return redirect()->back()->with([
            'message' => 'This task is no longer available!',
            'alert-type' => 'error'
        ]);
    }

    // 3. Check for duplicates
    $alreadyJoined = DB::table('join_tasks')
        ->where('userID', $userID)
        ->where('taskID', $id)
        ->first();

    if ($alreadyJoined) {
        return redirect()->back()->with([
            'message' => "You are already enrolled!",
            'alert-type' => 'error'
        ]);
    }

    // 4. Save new enrollment
    $join = new JoinTask();
    $join->userID = $userID;
    $join->taskID = $task->id;
    $join->status = 1;

    if ($join->save()) {
        return redirect()->route('user.all-task')->with('enrolled', true);
    } else {
        return redirect()->route('user.all-task')->with('enroll_failed', true);
    }
}
}
