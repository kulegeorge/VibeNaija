<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscriber;
use App\Mail\CustomCampaignMail;
use Illuminate\Support\Facades\Mail;

class EmailCampaignController extends Controller
{
    public function create()
    {
        return view('admin.emails.compose');
    }

    public function send(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'audience' => 'required|in:users,subscribers,both',
        ]);

        if (in_array($request->audience, ['users', 'both'])) {
            User::chunk(100, function ($users) use ($request) {
                foreach ($users as $user) {
                    Mail::to($user->email)->queue(
                        new CustomCampaignMail(
                            $request->subject,
                            $request->body
                        )
                    );
                }
            });
        }

        if (in_array($request->audience, ['subscribers', 'both'])) {
            Subscriber::where('is_active', true)->chunk(100, function ($subs) use ($request) {
                foreach ($subs as $sub) {
                    Mail::to($sub->email)->queue(
                        new CustomCampaignMail(
                            $request->subject,
                            $request->body,
                            route('unsubscribe', encrypt($sub->email))
                        )
                    );
                }
            });
        }

$notification = array(
                    'message' => "Emails are being sent in the background.",
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
       
    }
}
