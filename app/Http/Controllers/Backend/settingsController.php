<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class settingsController extends Controller
{
    //Api get method
    public function getData($id=null){
        
        return $id?User::find($id):User::all();
    }// End Method

//API Post method

public function storeUser(Request $request){
    
    return 'Data saved successfully'.$request->name;

}//End Method




}
