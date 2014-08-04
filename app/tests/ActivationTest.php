<?php

class ActivationTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		// $data = array(
		// 	'user'=>$user,
		// 	'activationCode' => $activationCode
		// );

		Mail::send('emails.test', array(), function($message)
		{
		    $message->to('393342914@qq.com', 'John Smith')->subject('Welcome!');
		});
	}

}
