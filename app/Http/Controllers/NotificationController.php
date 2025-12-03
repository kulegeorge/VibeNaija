<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // List all notifications
    public function index()
    {
        $notifications = Auth::user()->notifications()->latest()->paginate(20);
        return view('notifications.index', compact('notifications'));
    }

    // Show full notification
    public function show($id)
    {
        $notification = Auth::user()->notifications()->findOrFail($id);

        // Mark as read when opened
        if (is_null($notification->read_at)) {
            $notification->markAsRead();
        }

        return view('notifications.show', compact('notification'));
    }

    // Mark all as read
    public function markAllRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return back()->with('success', 'All notifications marked as read.');
    }

    // Clear all notifications
    public function clear()
    {
        Auth::user()->notifications()->delete();
         return redirect()
        ->route('dashboard')
        ->with('success', 'All notifications cleared.');
    }
}
