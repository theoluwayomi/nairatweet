<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Wallet;

class UsersController extends Controller
{
    public function edit()
    {
        return view('edit-account')->with('user', auth()->user());
    }

    public function update(Request $request)
    {
        // return $request;
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:11',
            'twitter_handle' => 'required|string',
            'email' => 'required|string|email|max:255',
            'account_name' => 'required|string|max:255',
            'account_number' => 'required|numeric',
            'bank_name' => 'required|string|max:255',
            'new_pass' => 'sometimes|nullable|string|min:6|confirmed',
            'password' => 'sometimes|nullable|string|min:6',
        ]);

        $user = auth()->user();
        $wallet = Wallet::where('user_id', $user->id)->first();
        $bank = $request->only(['account_name', 'account_number', 'bank_name']);
        $input = $request->except(['password', 'new_pass', 'new_pass_confirmation', 'account_name', 'account_number', 'bank_name']);
        
        if (!$request->filled('password')) {
            $user->fill($input)->save();
            $wallet->fill($bank)->save();
            return back()->with('success_message', 'Profile updated successfully!');
        }
        if (Hash::check($request->password, $user->password)) {
        	$user->password = bcrypt($request->new_pass);
        	$user->fill($input)->save();
            $wallet->fill($bank)->save;
        } else {
        	return back()->withErrors('Password incorrect!');
        }

        return back()->with('success_message', 'Profile (and password) updated successfully!');
    }
}
