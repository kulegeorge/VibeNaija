<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use DB;

class RoleController extends Controller
{
    public function AllPermission(){
        $permission = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permission'));
    }// End Method

    public function AddPermission(){
       
        return view('backend.pages.permission.add_permission');
    }// End Method

    public function StorePermission(Request $request){
     
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission created Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);

    }//End Method

    public function EditPermission($id){
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permission.edit_permission', compact('permission'));

    }// End Edit Method

    public function UpdatePermission(Request $request){
     $per_id = $request->id;
         Permission::findOrFail($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);

    }//End Method

    Public function DeletePermission($id){
        $permission = Permission::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Permission Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.permission')->with($notification);


    }// End Delete Method

//Roles Methods

    public function AllRoles(){
        $roles = Role::all();
        return view('backend.pages.roles.all_roles', compact('roles'));
    }// End Method


    public function AddRoles(){
        
        return view('backend.pages.roles.add_roles');
    }// End Method


    public function StoreRoles(Request $request){
        
        $role = Role::create([
            'name' => $request->name,
        
        ]);

        $notification = array(
            'message' => 'Roles created Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);

    }//End Method

    public function EditRoles($id){
   
        $role = Role::findOrFail($id);
        return view('backend.pages.roles.edit_roles', compact('role'));

    }// End Edit Method

    public function UpdateRoles(Request $request){
        $per_id = $request->id;
            Role::findOrFail($per_id)->update([
               'name' => $request->name,
           ]);
   
           $notification = array(
               'message' => 'Role Updated Successfully!',
               'alert-type' => 'success'
           );
           return redirect()->route('all.roles')->with($notification);
   
    }//End Method

    Public function DeleteRoles($id){
        Role::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Role Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }// End Delete Method

    ///////////////Role in Permission
    public function AddRolesPermission(){
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();

        return view('backend.pages.rolesetup.add_role_permission', compact('roles','permissions','permission_groups'));

    }//End Method

    public function rolesPermissionStore(Request $request)
{
    $permissions = $request->permission;
    $roleId = $request->role_id;

    if ($permissions && count($permissions) > 0) {
        foreach ($permissions as $permissionId) {
            // ✅ Only insert if not already existing
            $exists = DB::table('role_has_permissions')
                ->where('role_id', $roleId)
                ->where('permission_id', $permissionId)
                ->exists();

            if (!$exists) {
                DB::table('role_has_permissions')->insert([
                    'role_id' => $roleId,
                    'permission_id' => $permissionId,
                ]);
            }
        }
    }

    $notification = [
        'message' => 'Role permissions added successfully!',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.roles.permission')->with($notification);
}
// End Method

    public function AllRolesPermission(){
        $roles = Role::all();
        return view('backend.pages.rolesetup.all_roles_permission', compact('roles'));

    }//End Method

    public function AdminRolesEdit($id){
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
  
         return view('backend.pages.rolesetup.edit_role_permission',compact('role','permissions','permission_groups'));
  
    }//End Method

    public function AdminRolesUpdate(Request $request, $id){
        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if(!empty($permissions)){
            $role->syncPermissions($permissions);

        }
        $notification = array(
            'message' => 'Role Permission Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    

    }//End Method

    public function AdminDeleteRoles($id){
        $role = Role::findOrFail($id);
        if(!is_null($role)){
            $role->delete();
        }
        $notification = array(
            'message' => 'Role and Permissions deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    

    }//End Method

}
