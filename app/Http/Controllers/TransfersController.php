<?php

namespace App\Http\Controllers;

use App\Transfer;
use App\User;
use App\Wallet;
use Illuminate\Http\Request;

class TransfersController extends Controller
{
    
    public function index()
    {
        return view('admin.transfer');
    }

    public function save(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
        ]);
        
        $user = User::where('user_name', $request->user_name)->first();
        if (is_null($user)) {
            return back()->withErrors('Invalid user account!');
        }
        $subtotal = $user->wallet->balance;
        $total = $user->wallet->balance + $request->amount;
        if (creditUser($user, $request->amount)) {
            Transfer::create([
                'user_id' => auth()->id(),
                'recipient' => $user->id,
                'amount' => $request->amount,
            ]);
            return back()->with('success_message', 'Action Successful! User credited. **Initial Balance : ' .$subtotal . ' **Current Balance : '.$total);
        }

        return back()->withErrors('An unknown error occured!');
    }
}
