<?php

class CookieController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getTheme(){
		return Cookie::get('theme');
	}

	public function putTheme()
	{
		$theme = Input::get('theme');
		Cookie::queue('theme', $theme ,2628000);
		return $theme;
	}
}