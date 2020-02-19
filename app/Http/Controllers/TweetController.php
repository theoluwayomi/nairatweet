<?php

namespace App\Http\Controllers;

use App\Tweet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        $current_tweets = Tweet::whereDate('created_at', Carbon::today())->first();
        return view('admin.tweet')->with([
            'tweets' => $current_tweets,
        ]);;
    }

    public function save(Request $request)
    {
        $request->validate([
            'tweet_1' => 'required|string',
            'tweet_2' => 'required|string',
            'tweet_3' => 'required|string',
        ]);
        $tweet = Tweet::updateOrCreate(
            ['date' => Carbon::today()->format('Y-m-d')],
            [
                'tweet_1' => $request->tweet_1,
                'tweet_2' => $request->tweet_2,
                'tweet_3' => $request->tweet_3,
                'date' => Carbon::today()->format('Y-m-d')
            ]
        );

        return back()->with('success_message', 'Tweet posted already!');
    }
}
