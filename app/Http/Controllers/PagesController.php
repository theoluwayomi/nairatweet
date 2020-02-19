<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class PagesController extends Controller
{
    public function landingPage()
    {
        $plans = Plan::orderBy('amount', 'asc')->get();
        return view('welcome')->with('plans', $plans);
    }

    public function upgrade()
    {
        return view('upgrade');
    }

    public function faq()
    {
        return view('faq');
    }

    public function terms()
    {
        return view('terms');
    }

    public function policy()
    {
        return view('privacy');
    }

    public function advert()
    {
        return view('advertise');
    }

    public function agent()
    {
        return view('agent');
    }
}
