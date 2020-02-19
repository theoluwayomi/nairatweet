<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Wallet;
use Carbon\Carbon;

class SubscribeController extends Controller
{
    public function subscribe()
    {
        $user = auth()->user();
        $plans = Plan::orderBy('amount', 'asc')->get();
        if (is_null($user->wallet->plan))
        {
            return view('pre-activation')->with([
                'plans' => $plans,
                ]);
        }
        return redirect()->route('upgrade');
    }

    public function activateFreePlan(Request $request) {
        $wallet = Wallet::where('user_id', auth()->id())->first();
        if ($wallet->trial == 'closed') {
            return back()->withErrors('You are not eligible for this offer.');
        }
        $plan = Plan::where('name', 'Free Trial')->first();
        $wallet->trial = 'closed';
        $wallet->plan_id = $plan->id;
        $wallet->plan_started_at = Carbon::today()->format('Y-m-d');
        $wallet->save();
        return redirect()->route('home')->with( 'You have successfully activated a Free Trial for 15 days. Check your dashboard daily for the daily tweets.');
    }
}
