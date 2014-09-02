<?php

class MailChimpController extends BaseController {

	/*
	
	|--------------------------------------------------------------------------
	| MailChimpController
	|--------------------------------------------------------------------------
	
	*/
	public $APIkey = "a22d86c9b3f05b734e19a257ce061364-us8";
	public $id = "e690bdac7a";

	function postAddSubscriber(){
		$MailChimp = new \Drewm\MailChimp($this->APIkey);
		$result = $MailChimp->call('lists/subscribe', array(
		                'id'                => $this->id,
		                'email'             => array('email'=>Input::get('email')),
		                'merge_vars'        => array('FNAME'=>null, 'LNAME'=>null),
		                'double_optin'      => true,
		                'update_existing'   => false,
		                'replace_interests' => true,
		                'send_welcome'      => true,
		            ));
		return $result;
	}

	function postUnsubscribe(){
		$MailChimp = new \Drewm\MailChimp($this->APIkey);
		$result = $MailChimp->call('lists/unsubscribe', array(
		                'id'                => $this->id,
		                'email'             => array('email'=>Input::get('email')),
		                'delete_member'     => false,
		                'send_goodbye'      => true,
		                'send_notify'  		=> true,
		            ));
		return $result;
	}

	function postUnsubscribeReason(){
		$email = Input::get('email');
		$reason = Input::get('reason');
		$path = base_path().'\\public\\log\\unsubscribeReason.log';
		$fopen = fopen($path,'a');
		fwrite($fopen,$email.'      '.$reason.'      '.date('Y-m-d H:i:s')."\r\n");
		fclose($fopen);
	}

	function postProfile(){
		$MailChimp = new \Drewm\MailChimp($this->APIkey);
		$result = $MailChimp->call('lists/update-member', array(
		                'id'                => $this->id,
		                'email'             => array('email'=>Input::get('email')),
		                'merge_vars'        => array('email'=>Input::get('newEmail')),
		                'email_type'      	=> 'html',
		            ));
		return $result;
	}

	// function getCheckEmail(){
	// 	$MailChimp = new \Drewm\MailChimp($this->APIkey);
	// 	$result = $MailChimp->call('lists/member-info', array(
	// 	                'id'           => $this->id,
	// 	                'emails'        => array(array('email'=>'yule@trht.com.cn')),
	// 	            ));
	// 	return $result;
	// }

	

}
