<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Application Debug Mode
	|--------------------------------------------------------------------------
	|
	| When your application is in debug mode, detailed error messages with
	| stack traces will be shown on every error that occurs within your
	| application. If disabled, a simple generic error page is shown.
	|
	*/

	'debug' => true,

	'timezone' => 'Asia/Hong_Kong',

	'mysql.host'     => 'localhost',
	'mysql.database' => 'ta',
	'mysql.username' => 'root',
	'mysql.password' => '',

	'email.host'       => 'smtp.exmail.qq.com',
	'email.port'       => 465,
	// 'email.from.address' => 'yule@trht.com.cn',
	// 'email.form.name'  => 'TA',
	'email.encryption' => 'ssl',
	'email.username'   => 'yule@trht.com.cn',
	'email.password'   => '123456a',
);
