<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use DB;
use App\Models\User;
use App\Models\Badge;
use App\Models\Level;
use App\Models\UserTaskSubmission;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    //Task profile

  



    public function Task()
    {
        $user = Auth::user();
        $userId = $user->id;

        /* ------------------------------
         * 1. Total Earnings
         * ------------------------------ */
        $badges = UserTaskSubmission::where('user_id', $userId)
            ->where('status', 'approved')
            ->get(); 
            $taskcompleted =  UserTaskSubmission::where('user_id', $userId)
            ->where('status', 'approved')
            ->count(); 
            // Make sure your table has earnings_amount column


        /* ------------------------------
         * 2. Total Points (XP)
         * ------------------------------ */
    


        /* ------------------------------
         * 3. Completed Tasks
         * ------------------------------ */
        // $completedTasks = UserTaskSubmission::where('user_id', $userId)
        //     ->where('status', 'approved')
        //     ->count();


        /* ------------------------------
         * 4. User Level
         * ------------------------------ */
        // $level = Level::where('min_points', '<=', $totalPoints)
        //     ->where('max_points', '>=', $totalPoints)
        //     ->first();

        // if (!$level) {
        //     $level = Level::orderBy('min_points', 'asc')->first();
        // }

        // $nextLevel = Level::where('min_points', '>', $totalPoints)
        //     ->orderBy('min_points', 'asc')
        //     ->first();

        // $percentageToNextLevel = $nextLevel
        //     ? round(($totalPoints / $nextLevel->min_points) * 100)
        //     : 100;

        // $xpNeeded = $nextLevel
        //     ? $nextLevel->min_points - $totalPoints
        //     : 0;


        /* ------------------------------
         * 5. User Badges
         * ------------------------------ */
        // $badges = DB::table('badges')
        //     ->join('badges', 'badges.id', '=', 'user_badges.badge_id')
        //     ->where('user_badges.user_id', $userId)
        //     ->select('badges.*')
        //     ->get();


        /* ------------------------------
         * 6. Leaderboard (Top 10)
         * ------------------------------ */
         $leaders = User::select('id', 'name', 'points', 'photo')
        ->orderByDesc('points')
        ->get();

       
        return view('frontend.user_earnings', compact('user','badges','taskcompleted','leaders'));
    }
}


