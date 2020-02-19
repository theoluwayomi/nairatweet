<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Post;
use App\Tweet;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $wallet = auth()->user()->wallet;
        $plan = $wallet->plan;

        if (is_null($plan))
        {
            return redirect()->route('subscribe');
        }


        // Check if the plan is due for expiry
        $days_used = Carbon::today()->diffInDays($wallet->plan_started_at);
        $current_tweets = Tweet::whereDate('created_at', Carbon::today())->first();
        // return $days_used;
        
        // Checking plan for deactivation
        if ($days_used >= $plan->cycle) {
            $wallet->plan_id = null;
            $wallet->plan_started_at = null;
            $wallet->save();
            if ($plan->getName() == 'Free Trial')
                return redirect()->route('subscribe')->with('success_message', 'You trial period has expired. Contact any of the agents below to upgrade to a Premium plan. Thank you!');
            else
                return redirect()->route('subscribe')->with('success_message', 'You current plan has expired. Contact any of the agents below to renew your plan or upgrade.');
        }

        
        $post = Post::whereDate('created_at', Carbon::today())->where('user_id', auth()->id())->first();
        $prev_post = Post::whereDate('created_at', Carbon::yesterday())->where('user_id', auth()->id())->first();
        $posted = !is_null($post);
        $posted_prev = !is_null($prev_post);
        
        return view('home')->with([
            'plan' => $plan,
            'wallet' => $wallet,
            'posted' => $posted,
            'posted_prev' => $posted_prev,
            'post' => $post,
            'prev_post' => $prev_post,
            'left' => ($plan->cycle - $days_used),
            'tweets' => $current_tweets,
        ]);
    }
}
