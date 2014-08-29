<?php

class MailChimpController extends BaseController {

	/*
	
	|--------------------------------------------------------------------------
	| MailChimpController
	|--------------------------------------------------------------------------
	
	*/

	function postAddSubscriber(){
		$MailChimp = new \Drewm\MailChimp('a22d86c9b3f05b734e19a257ce061364-us8');
		$result = $MailChimp->call('lists/subscribe', array(
		                'id'                => 'e690bdac7a',
		                'email'             => array('email'=>Input::get('email')),
		                'merge_vars'        => array('FNAME'=>null, 'LNAME'=>null),
		                'double_optin'      => true,
		                'update_existing'   => false,
		                'replace_interests' => true,
		                'send_welcome'      => true,
		            ));
		return $result;
	}


}
