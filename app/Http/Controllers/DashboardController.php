<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserTaskSubmission;
use Auth;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        $taskcompleted = DB::table('user_task_submissions')->where('user_id', $id)->where('status', 'approved')->count();
    return view('dashboard', compact('user','taskcompleted'));

    }
   
}
