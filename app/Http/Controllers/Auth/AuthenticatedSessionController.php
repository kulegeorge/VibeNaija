<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = $request->user();

        // Admins
        if ($user->role === 'Admin') {
            return redirect()->intended('/admin/dashboard');
        }

        // Agents
        if ($user->role === 'Agent') {
            return redirect()->intended('/agent/dashboard');
        }

        // Normal users MUST verify email before login completes
        if (! $user->hasVerifiedEmail()) {

            // LOG USER OUT IMMEDIATELY
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('verification.notice')
                ->with('message', 'Please verify your email before logging in.');
        }

        // Verified normal users
        return redirect()->intended('/dashboard');
    }

    /**
     * Logout
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
