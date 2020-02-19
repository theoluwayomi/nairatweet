<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Withdrawal;
use Carbon\Carbon;

class CompilerController extends Controller
{
    public function index()
    {
        $withdrawals = Withdrawal::where('status', 'pending')->with('user')->simplePaginate(25);

        $count = Withdrawal::where('status', 'pending')->count();
        $cur_count = Withdrawal::where('status', 'pending')->whereDate('created_at', Carbon::today())->count();
        return view('admin.withdrawals')->with([
            'withdrawals' => $withdrawals,
            'count' => $count,
            'today' => $cur_count,
        ]);;
    }

    public function settle(Request $request)
    {
        $withdrawal = Withdrawal::find($request->id);
        if ($request->action == 'delete') {
            $withdrawal->status = 'cancelled';
            $withdrawal->save();
            return back()->with('success_message', 'Action Successful! Withdrawal Deleted.');
        } elseif ($request->action == 'settle') {
            $withdrawal->status = 'cancelled';
            $withdrawal->save();
            return back()->with('success_message', 'Action Successful! Withdrawal successfully settled.');
        } else {
            return back();
        }
        
        return back();
    }
}
