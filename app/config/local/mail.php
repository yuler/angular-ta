<?php

return array(
	/*
	|--------------------------------------------------------------------------
	| Mail Driver
	|--------------------------------------------------------------------------
	|
	| Laravel supports both SMTP and PHP's "mail" function as drivers for the
	| sending of e-mail. You may specify which one you're using throughout
	| your application here. By default, Laravel is setup for SMTP mail.
	|
	| Supported: "smtp", "mail", "sendmail", "mailgun", "mandrill", "log"
	|
	*/

	'host'       => $_ENV['email.host'],
	'port'       => $_ENV['email.port'],
	'from'       => array('address' => $_ENV['email.from.address'], 'name' => $_ENV['email.from.name']),
	'encryption' => $_ENV['email.encryption'],
	'username'   => $_ENV['email.username'],
	'password'   => $_ENV['email.password'],
);