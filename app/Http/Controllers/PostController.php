<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function save(Request $request)
    {
        // return auth()->user()->wallet->plan_id;
        $request->validate([
            'link_1' => 'required|url',
            'link_2' => 'required|url',
            'link_3' => 'required|url',
        ]);

        $posted = !is_null(Post::whereDate('created_at', Carbon::today())->where('user_id', auth()->id())->first());

        if ($posted)
        {
            return back()->withErrors('You are restricted from posting links twice a day!');
        }

        $post = Post::create([
            'links' => json_encode(Array($request->link_1, $request->link_2, $request->link_3)),
            'plan_id' => auth()->user()->wallet->plan_id,
        ]);

        $user = auth()->user();
        $user->posts()->save($post);
        
        return back()->with('success_message', 'Your tweet link has been submitted successfully! Please wait for confirmation.');
    }
}
