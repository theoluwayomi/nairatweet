<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@landingPage');

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/edit-account', 'UsersController@edit')->name('user.edit');
    Route::patch('/edit-account', 'UsersController@update')->name('user.update');

    Route::post('/post-links', 'PostController@save')->name('tweet.save');


    Route::get('/subscribe', 'SubscribeController@subscribe')->name('subscribe');
    Route::post('/activate-free-plan', 'SubscribeController@activateFreePlan')->name('activate_free_plan');

    Route::get('/upgrade', 'PagesController@upgrade')->name('upgrade');

    Route::get('/withdraw', 'WithdrawalController@index')->name('withdraw.show');
    Route::post('/withdraw', 'WithdrawalController@save')->name('withdraw.save');

    Route::prefix('admin')->group(function() {
        Route::middleware('confirmer')->group(function() {
            Route::get('/confirm-tweets', 'ConfirmTweetController@index')->name('confirm');
            Route::patch('/confirm-tweets', 'ConfirmTweetController@confirm')->name('confirm');
        });
        
        Route::middleware('compiler')->group(function() {    
            Route::get('/withdrawals', 'CompilerController@index')->name('withdrawals');
            Route::post('/withdrawals', 'CompilerController@settle')->name('withdrawals');
        });

        Route::middleware('activator')->group(function() {
            Route::get('/activate-users', 'ActivatorController@showActivate')->name('activate');
            Route::post('/activate-users', 'ActivatorController@activate')->name('activate');
    
            Route::get('/upgrade-users', 'ActivatorController@showUpgrade')->name('admin.upgrade');
            Route::post('/upgrade-users', 'ActivatorController@upgrade')->name('admin.upgrade');
        });

        Route::middleware('admin')->group(function() {
            Route::get('/tweets', 'TweetController@index')->name('tweet');
            Route::post('/tweets', 'TweetController@save')->name('tweet');
        
            Route::get('/transfer', 'TransfersController@index')->name('transfer');
            Route::post('/transfer', 'TransfersController@save')->name('transfer');
            Route::get('/roles', 'RolesController@index')->name('role');
            Route::post('/roles', 'RolesController@role')->name('role');
            Route::post('/toggle', 'RolesController@toggle')->name('toggle');
        });
    });
    
});
Route::get('/frequently-asked-questions', 'PagesController@faq')->name('faq');
Route::get('/terms-and-conditions', 'PagesController@terms')->name('terms');
Route::get('/privacy-policy', 'PagesController@policy')->name('policy');
Route::get('/advertise-with-us', 'PagesController@advert')->name('advert');
Route::get('/become-an-agent', 'PagesController@agent')->name('agent');



