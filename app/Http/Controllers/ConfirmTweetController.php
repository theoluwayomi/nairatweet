<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Plan;
use Carbon\Carbon;

class ConfirmTweetController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'pending')->with('user', 'plan')->simplePaginate(25);

        $count = Post::where('status', 'pending')->count();
        $cur_count = Post::where('status', 'pending')->whereDate('created_at', Carbon::today())->count();
        return view('admin.confirm')->with([
            'posts' => $posts,
            'count' => $count,
            'today' => $cur_count,
        ]);
    }

    public function confirm(Request $request)
    {
        $post = Post::find($request->id);

        $user = User::find($post->user_id);
        $plan = Plan::find($post->plan_id);
        
        if ($request->action == 'decline') {
            $post->status = 'declined';
            $post->save();
            return back()->with('success_message', 'Action Successful! User Declined.');
        } elseif ($request->action == 'confirm') {
            if ($post->status == 'pending') {
                creditUser($user, $plan->returns);
                $post->status = 'confirmed';
                $post->save();
                return back()->with('success_message', 'Action Successful and user credited!');
            }
        } else {
            return back();
        }
        
        return back();
    }
}
