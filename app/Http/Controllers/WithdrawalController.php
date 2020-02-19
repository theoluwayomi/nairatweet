<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wallet;
use App\Withdrawal;
use App\User;

class WithdrawalController extends Controller
{
    public function index()
    {
        $withdrawals = Withdrawal::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        // return config('app.timezone');
        // return \Carbon\Carbon::now();
        return view('withdrawal')->with([
            'withdrawals' => $withdrawals,
            'wallet' => auth()->user()->wallet,
            'user' => auth()->user(),
        ]);
    }

    public function save(Request $request)
    {
        $plan = auth()->user()->wallet->plan;
        if (is_null($plan)) {
            return back();
        }

        if (freePlan($plan)) {
            return back()->withErrors('You need to upgrade from free trial plan before you can withdraw. Please upgrade to an actual plan to withdraw your funds.');
        }

        if (!canWithdraw()) {
            return back()->withErrors('Withdrawal is closed. You can only make withdrawals on Monday.');
        }

        $request->validate([
            'amount' => 'required|numeric',
        ]);
        $user = auth()->user();
        if (insufficient($user, $request->amount))
        {
            return back()->withErrors('Insufficient balance to make this withdrawal.');
        }

        if(debitUser($user, $request->amount))
        {
            $withdrawal = Withdrawal::create([
                'amount' => $request->amount,
                'user_id' => $user->id,
            ]);

            return back()->with('success_message', 'Your withdrawal request has been noted successfully!');
        }

        return back()->withErrors('An unknown error occured while processing the withdrawal.');
    }
}
