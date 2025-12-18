<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class UnsubscribeController extends Controller
{
    public function unsubscribe($token)
    {
        $email = decrypt($token);

        Subscriber::where('email', $email)->update([
            'is_active' => false
        ]);

        return view('emails.unsubscribed');
    }
}
