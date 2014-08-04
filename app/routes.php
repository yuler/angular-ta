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

Route::get('/', array('as' => 'site.index', function() {return View::make('index'); }));

// Route::get('/activate/{activationCode}',array('as' => 'site.activate','uses' => 'UserController@activate'));

//cookie
Route::controller('cookies', 'CookieController');
Route::controller('users', 'UserController');


//邮件模板测试

Route::get('/mail',function(){ return View::make('mail'); });