<?php

use Carbon\Carbon;
use App\Setting;
use App\Wallet;
use Illuminate\Support\Facades\Log;

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function debitUser($user, $amount)
{
    $wallet = Wallet::where('user_id', $user->id)->first();
    $wallet->balance = ($wallet->balance - $amount);
    $wallet->save();
    return true;
}

function creditUser($user, $amount)
{
    $wallet = Wallet::where('user_id', $user->id)->first();
    $wallet->balance = ($wallet->balance + $amount);
    $wallet->save();
    Log::debug('Crediting user : ' . $user->user_name . ' | Id : ' . $user->id . ' | Amount : ' . $amount);
    return true;
}

function insufficient($user, $amount)
{
    $wallet = Wallet::where('user_id', $user->id)->first();
    return $wallet->balance < $amount;
}

function presentDate($date)
{
    return Carbon::parse($date)->format('M d, Y');
}

function presentPrice($price)
{
    if (is_numeric($price))
        return number_format($price, 0, ".", " ");
    return $price;
}

function getBanks() {
    $banks = \App\Bank::orderBy('bank_name', 'asc')->get('bank_name');
    return $banks;
}

function getLinks($links) {
    return json_decode($links);
}

function canWithdraw() {
    $withdrawal = Setting::where('name', 'Withdrawal')->first();
    return $withdrawal->value == true;
}

function freePlan($plan) {
    return $plan->getName() == "Free Trial";
}

function freeTrial() {
    $wallet = Wallet::where('user_id', auth()->id())->first();
    return ($wallet->trial == 'open');
}