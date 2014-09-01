<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', array('as' => 'site.index', function() {return View::make('index'); }));
// Route::get('/activate/{activationCode}',array('as' => 'site.activate','uses' => 'UserController@activate'));

//root
// Route::get('/',function(){ return Redirect::to('http://subscribe.lifengchai.com/welcome'); });
Route::get('/',function(){ return Redirect::to('/subscribe'); });
Route::get('/subscribe',function(){ return View::make('subscribe.addSubscribe'); });
Route::get('/subscribe/thank-you', function() { return View::make('subscribe.thankYou'); });
Route::group(array('before'=>'checkEmailFormMailChimp','prefix'=>'subscribe'),function(){
    Route::get('/unsubscribe', function() { return View::make('subscribe.unsubscribe'); });
    Route::get('/profile', function() { return View::make('subscribe.profile'); });
});


//cookie
Route::controller('cookies', 'CookieController');
Route::resource('users', 'UserController',array('only' => array('update')));
Route::controller('users', 'UserController');


//MailChimp 邮件订阅

Route::controller('mailChimps', 'MailChimpController');

//邮件模板测试
Route::get('/mail',function(){ return View::make('mail'); });


// Route::group(array('domain' => 'subscribe.lifengchai.com'), function()
// {
// 	   Route::get('/welcome', function(){ return View::make('subscribe.addSubscribe'); });
//     Route::get('/thank-you', function() { return View::make('subscribe.thankYou'); });
//     Route::get('/unsubscribe', function() { return View::make('subscribe.unsubscribe'); });
//     Route::get('/profile', function() { return View::make('subscribe.profile'); });
// });