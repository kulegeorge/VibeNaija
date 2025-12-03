<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
  use App\Notifications\PlatformNotification;
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
        $user = Auth::user();
         $user->notify(new PlatformNotification(
            title: 'Profile Updated',
            message: 'Changes have been make to your profile',
            type: 'profile_updated',
           
        ));

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
            
        /* ------------------------------
         * 6. Leaderboard (Top 10)
         * ------------------------------ */
         $leaders = User::select('id', 'name', 'points', 'photo')
        ->orderByDesc('points')
        ->get();

       
        return view('frontend.user_earnings', compact('user','badges','taskcompleted','leaders'));
    }
}


