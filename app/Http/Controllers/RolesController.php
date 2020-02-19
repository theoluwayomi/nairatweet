<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Setting;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::with('users')->get();
        return view('admin.role')->with([
            'roles' => $roles,
        ]);
    }

    public function role(Request $request)
    {
        $user = User::where('user_name', $request->user_name)->first();
        $id = $request->role_id;
        if(is_null($user)) {
            return back()->withErrors('No such user found!');
        }

        if ($request->action == 'add') {
            foreach($user->roles as $role) {
                if ($role->id == $id) {
                    return back()->withErrors('User already has the role!');
                }
            }
            $user->roles()->attach($id);
            return back()->with('success_message', 'Action succesful!');
        } else if ($request->action == 'remove') {
            foreach($user->roles as $role) {
                if ($role->id == $id) {
                    $user->roles()->detach($role->id);
                    return back()->with('success_message', 'Action succesful! Role successfully removed.');
                }
            }
            
            return back()->withErrors('User does not have the role you are trying to remove!');
        }

        return back();
    }

    public function toggle(Request $request)
    {
        $withdrawal = Setting::where('name', 'Withdrawal')->first();
        if (canWithdraw())
            $withdrawal->value = 0;
        else
            $withdrawal->value = 1;
        $withdrawal->save();
        
        return back()->with('success_message', 'Action succesful!');
    }
}
