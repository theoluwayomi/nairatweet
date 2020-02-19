<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\User;
use App\Wallet;
use Carbon\Carbon;

class ActivatorController extends Controller
{
    public function showActivate()
    {
        $plan = Plan::where('name', 'Free Trial')->first();
        $plans = Plan::orderBy('amount', 'asc')->get()->except($plan->id);
        return view('admin.activate')->with([
            'plans' => $plans,
        ]);
    }

    public function activate(Request $request)
    {
        $user = User::where('user_name', $request->user_name)->first();
        if (is_null($user)) {
            return back()->withErrors('Invalid user account!');
        }
        $wallet = Wallet::where('user_id', $user->id)->first();
        if (!is_null($wallet->plan)) {
            return back()->withErrors('User already has an active plan. Contact the admin to upgrade the user if necessary.');
        }
        $plan = Plan::find($request->plan_id);
        $wallet->plan_id = $request->plan_id;
        $wallet->plan_started_at = Carbon::today()->format('Y-m-d');
        $wallet->save();
        return back()->with('success_message', 'Action Successful! User: ' .$user->user_name . ' is now activated for the selected plan ['.$plan->getName(). '].');
    }

    public function showUpgrade()
    {
        $plan = Plan::where('name', 'Free Trial')->first();
        $plans = Plan::orderBy('amount', 'asc')->get()->except($plan->id);
        return view('admin.upgrade')->with([
            'plans' => $plans,
        ]);
    }

    public function upgrade(Request $request)
    {
        $user = User::where('user_name', $request->user_name)->first();
        if (is_null($user)) {
            return back()->withErrors('Invalid user account!');
        }
        $wallet = Wallet::where('user_id', $user->id)->first();
        if (is_null($wallet->plan)) {
            return back()->withErrors('User does not have an active plan. You can only upgrade a user with an active plan.');
        }
        $plan = $wallet->plan;
        $wallet->plan_id = $request->plan_id;
        $wallet->plan_started_at = Carbon::today()->format('Y-m-d');
        $wallet->save();
        $n_plan = Plan::find($request->plan_id);
        return back()->with('success_message', 'Action Successful! User: ' .$user->user_name . ' is now upgraded from '.$plan->getName().' to '.$n_plan->getName().' plan.');
    }
}
