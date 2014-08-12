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

//cookie
Route::controller('cookies', 'CookieController');
Route::resource('users', 'UserController',array('only' => array('update')));
Route::controller('users', 'UserController');


//MailChimp 邮件订阅
Route::post('/PushMailController/addSubscriber','MailChimpController@addSubscriber');
Route::get('/',function(){ return View::make('down'); });

//邮件模板测试
Route::get('/mail',function(){ return View::make('mail'); });