<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
     public function homepage(){
        return view('frontend.index');
    }
    

    // public function apitest(){
    //   $response = http::get('http://localhost/nitda/webservice/rest/server.php?wstoken=50fa31a54989fbc8797eddb876ffda01&moodlewsrestformat=json&wsfunction=auth_email_signup_user');
      
    //   $result = json_decode($response, true);
    //   dd($result);
    // }
}
