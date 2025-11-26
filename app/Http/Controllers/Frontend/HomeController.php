<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
     public function homepage(){
      $tasks = Tasks::limit(3)->get();

        return view('frontend.index', compact('tasks'));
    }
    

    // public function apitest(){
    //   $response = http::get('http://localhost/nitda/webservice/rest/server.php?wstoken=50fa31a54989fbc8797eddb876ffda01&moodlewsrestformat=json&wsfunction=auth_email_signup_user');
      
    //   $result = json_decode($response, true);
    //   dd($result);
    // }


    public function userProfile(){
        $id = Auth::User()->id;
        $profileData = User::find($id);
        return view('frontend.user_profile_view', compact('profileData'));
    }// End method


    //store User profile update
    public function userProfileStore(Request $request){
        $id = auth::User()->id;
        $data = User::find($id);

        $this->validate($request, [
             'name' => 'required|string|max:255',
             'address' => 'required|string|max:555',
             'phone' => 'required|string|max:255',
           
            ]);

        $data->name = $request->name;
        $data->address = $request->address;
        $data->phone = $request->phone;
     
        $data->title = $request->title;
     
        if($request->file('photo')){
            $file = $request->file('photo');
            $fileExt = $file->getClientOriginalExtension();
            $filename = date('Ymdhis').$file->getClientOriginalName();
            $filesize = $file->getSize();
            //check file size
            $ext = array('jpg','png','jpeg','JPG','PNG','JPEG');

            if(($filesize/1024) > 500){
                $notification = array(
                    'message' => 'File Size must NOT be greater than 500kb',
                    'alert-type' => 'error'
                );
             
                return redirect()->back()->with($notification);
            //check file Extension
            }elseif(!in_array($fileExt, $ext)){
                $notification = array(
                    'message' => 'File Type must be "jpg|png|jpeg',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
            $file->move(public_path('upload/'),$filename);
            @unlink(public_path('upload/'.$data->photo));
            $data['photo'] = $filename;

        }
        $data->save();
        $notification = array(
            'message' => 'Profile updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

        
    }// End method

}
