<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Event;
use App\Models\Activities;
use App\Models\Expenses;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminController extends Controller
{
   

 public function AdminDashboard(Request $request)
    {
        
        $records = array();
        $event = Event::all();
        $exp = array();
        $expense = Expenses::all();

        foreach($event as $events){
            $records[] = [
                'id' => $events->id, 
                'title' => $events->title,
                'start' => $events->start,
                'end' => $events->end,
                        ];
        }

        foreach($expense as $expenses){
            $exp[] = [
                'id' => $expenses->id, 
                'title' => $expenses->title,
                'start' => $expenses->start,
                'end' => $expenses->end,
                'amount' => $expenses->amount,
                'month' => $expenses->month,
                'author' => $expenses->author,
                        ];
        }


        return view('admin.index', ['records' => $records, 'exp' => $exp]);
    } // End Method


    public function store(Request $request)
    {
        
        if($request->ajax())
        {
            if($request->type == 'add')
            {
                if(!empty($request->title) && !empty($request->start) && !empty($request->end)){

                $event = Event::create([
                    'title'     =>  $request->title,
                    'start'     =>  $request->start,
                    'end'       =>  $request->end
                ]);

                return response()->json($event);
                 }else{
                    return response()->json(['error' => 'Event Title is required!']);
                 }
            }




            if($request->type == 'update')
            {

                $id = $request->id;
                $event = Event::find($id)->update([
                    'title'     =>  $request->title,
                    'start'     =>  $request->start,
                    'end'       =>  $request->end
                ]);

                return response()->json($event);
            }

            if($request->type == 'delete')
            {

                $event = Activities::where('event_id',$request->id)->delete();
                $activity = Event::find($request->id)->delete();

                return response()->json($event);
            }

            if($request->type == 'addExpense')
            {
                if(!empty($request->title) && !empty($request->title) && !empty($request->title)){

                $exEvent = Expenses::create([
                    'title'     =>  $request->title,
                    'start'     =>  $request->start,
                    'end'       =>  $request->end,
                    'amount'    =>  $request->amount,
                    'month'     =>  $request->month,
                    'event_id'  =>  $request->id,
                    'author'    =>  Auth()->User()->name
                ]);

                return response()->json($exEvent);
                 }else{
                    return response()->json(['error' => 'Expenses Event Title is required!']);
                 }
            }

        }
    } // End Method
    /**
     * Destroy an authenticated session.
     */
    public function adminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }// End method

    //Admin Login Page

    public function adminLogin(){
        return view('admin.login');
    }// End method

    //Admin Profile Page

    public function adminProfile(){
        $id = Auth::User()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }// End method

    //store Admin profile update
    public function adminProfileStore(Request $request){
        $id = auth::User()->id;
        $data = User::find($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            ]);
        $data->name = $request->name;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->location = $request->location;
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
            $file->move(public_path('upload/admin_images'),$filename);
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $data['photo'] = $filename;

        }
        $data->save();
        $notification = array(
            'message' => 'Profile updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

        
    }// End method

    public function adminChangePassword() {
        $id = Auth::User()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));

    }// End method

    public function adminUpdatePassword(Request $request){

        //validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        //Check Password match
        if(!Hash::check($request->old_password, auth::user()->password)){
            $notification = array(
                'message' => 'Old Password Does not Match! ',
                'alert-type' => 'error'
            );
            return back()->with($notification);

            }

        //update the new password

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password Changed Successfully!',
            'alert-type' => 'success'
        );
        return back()->with($notification);

    }// End method

////////////////////Admin Management /////////////////////////
public function AllAdmin(){
    $allAdmin = User::where('role','Admin')->get();
    return view('Backend.pages.adminUser.all_admin', compact('allAdmin'));
}// End Method

public function AddAdmin(){
$roles = Role::all();
return view('Backend.pages.adminUser.add_admin', compact('roles'));
}//End Method

Public function StoreAdmin(Request $request){
    $check = User::where('email', $request->email)->first();
    if(!$check){
        $user = new User();
        $user->name = $request->name;
        $user->title = $request->title;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->location = $request->location;
        $user->role = 'Admin';
        $user->password = Hash::make($request->password);
        $user->status = 'active';
        $user->save();

        if($request->roles){
            $user->assignRole($request->roles);
        }
        $notification = array(
            'message' => 'New Admin User created Successfully!',
            'alert-type' => 'success'
        );
         return redirect()->route('all.admin')->with($notification);
    }else{
        $notification = array(
            'message' => 'Error! Email Address Already in use',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }// End Condition 

}//End Method


public function EditAdmin($id){
    $userID = User::findOrFail($id);
    $roles = Role::all();

    return view('Backend.pages.adminUser.edit_admin',compact('userID','roles'));

}// End method

public function UpdateAdmin(Request $request, $id){
    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->title = $request->title;
    $user->email = $request->email;
    $user->address = $request->address;
    $user->phone = $request->phone;
    $user->location = $request->location;
    $user->role = 'Admin';
    $user->status = 'active';
    $user->save();
$user->roles()->detach();
    if($request->roles){
        $user->assignRole($request->roles);
    }
    $notification = array(
        'message' => 'Admin User updated Successfully!',
        'alert-type' => 'success'
    );
     return redirect()->route('all.admin')->with($notification);


}// End Method

public function DeleteAdmin($id){
    $user = User::findOrFail($id);
    if(!is_null($user)){
        $user->delete();
    }
    $notification = array(
        'message' => 'Admin User deleted Successfully!',
        'alert-type' => 'success'
    );
     return redirect()->back()->with($notification);
}//End method



}
