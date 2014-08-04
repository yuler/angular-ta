<?php

class UserController extends BaseController {

	/*

	|--------------------------------------------------------------------------
	| UserController
	|--------------------------------------------------------------------------
	
	*/

	//用户登录
	public function postLogin(){
		$credentials = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		);
		try{
			$user = Sentry::authenticate($credentials, false);
			if ($user){
				return Response::json(array('message'=>'登录成功','type'=>'success'));
			}
		}catch (Cartalyst\Sentry\Users\LoginRequiredException $e){
			return Response::json(array('message'=>'登录邮箱不能为空','type'=>'error'),500);
		}catch (Cartalyst\Sentry\Users\PasswordRequiredException $e){
			return Response::json(array('message'=>'登录密码不能为空','type'=>'error'),500);
		}catch (Cartalyst\Sentry\Users\WrongPasswordException $e){
			$user = Sentry::findUserByLogin(Input::get('email'));
			$throttle = Sentry::findThrottlerByUserId($user['id']);
			$attempts = $throttle->getLoginAttempts();
			return Response::json(array('message'=>'密码错误, '.'你已经被拦截
				<font style="color:red">'.$attempts.'</font> 次, 
				当连续被拦截 <font style="color:red">5</font> 
				次的时候 ，我们会临时 <font style="color:red">冻结 </font>你的账号15分钟',
				'type'=>'warning'),500);
		}catch (Cartalyst\Sentry\Users\UserNotFoundException $e){
			return Response::json(array('message'=>'邮箱地址不存在','type'=>'error'),500);
		}catch (Cartalyst\Sentry\Users\UserNotActivatedException $e){
			return Response::json(array('message'=>'用户未激活，请去邮箱激活','type'=>'info'),500);
		}catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e){
			$user = Sentry::findUserByLogin(Input::get('email'));
			$throttle = Sentry::findThrottlerByUserId($user['id']);
			$suspensionTime = $throttle->getSuspensionTime();
			$suspended_at = $throttle['suspended_at'];
			return Response::json(array('message'=>'你的账号冻结于 '.
				'<font style="color:red">'.$suspended_at.'</font> 时间,冻结时间 '.
				'<font style="color:red">'.$suspensionTime.'</font> 分钟后我们将会为你解除','type'=>'info'),500);
		}catch (Cartalyst\Sentry\Throttling\UserBannedException $e){
			return Response::json(array('message'=>'账号被禁用','type'=>'info'),500);
		}catch (Exception $e){
			return Response::json(array('message'=>'服务器错误','type'=>'error'),500);
		}
	}

	//注册用户
	public function postRegister(){
		try{
			//开启事物
			DB::transaction(function(){
				$user = Sentry::register(array(
					'first_name' => Input::get('first_name'),
					'last_name' => Input::get('last_name'),
					'email' => Input::get('email'),
					'password' => Input::get('password')
				));
				$activationCode = $user->getActivationCode();

				// 发送验证邮箱邮件
				$data = array(
					'user'=>$user,
					'activationCode' => $activationCode
				);
				Mail::send('emails.auth.activation', $data, function($message) use ($user)
				{
					$message->to($user['email'], $user['first_name'])->subject('TA的邮箱验证');
				});
			});
			return Response::json(array('message'=>'注册成功,请去邮箱激活你的账号','type'=>'success'));
		}catch (Cartalyst\Sentry\Users\LoginRequiredException $e){
		    return Response::json(array('message'=>'邮箱地址必须存在','type'=>'error'),500);
		}catch (Cartalyst\Sentry\Users\PasswordRequiredException $e){
		    return Response::json(array('message'=>'密码必须存在','type'=>'error'),500);
		}catch (Cartalyst\Sentry\Users\UserExistsException $e){
		    return Response::json(array('message'=>'邮箱地址已注册过','type'=>'error'),500);
		}catch (Exception $e){
			return $e;
			return Response::json(array('message'=>'服务器错误','type'=>'error'),500);
		}
		
	}

	//用户激活
	public function getActivate(){
		$id = Input::get('id');
		$activationCode = Input::get('activationCode');
		try {
			// Find the user using the user id
		    $user = Sentry::findUserById($id);

		    // Attempt to activate the user
		    if ($user->attemptActivation($activationCode)){
		        $message ='账号激活成功';
		        $type = 'success';
		        return Redirect::to('/#/login')->with(array('message'=>$message,'type'=>$type));
		    }else{
		        $message ='账号激活失败';
		        $type = 'error';
		        return Redirect::to('/#/login')->with(array('message'=>$message,'type'=>$type));
		    }
		}catch (Cartalyst\Sentry\Users\UserNotFoundException $e){
		    $message ='账号激活失败,用户不存在';
		    $type = 'error';
		    return Redirect::to('/#/login')->with(array('message'=>$message,'type'=>$type));
		}
		catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e){
		    $message ='用户已经激活';
		    $type = 'error';
		    return Redirect::to('/#/login')->with(array('message'=>$message,'type'=>$type));
		}
	}

	//遗忘密码、发送密码重置邮件
	public function postForget(){
		try {
			DB::transaction(function(){
				$email = Input::get('email');
				$user = Sentry::findUserByLogin($email);
			    $resetPasswordCode = $user->getResetPasswordCode();
			    //发送密码重置邮件
			    $data = array(
			    	'user' => $user,
			    	'resetPasswordCode' => $resetPasswordCode
			    );
			    Mail::send('emails.auth.resetPassword', $data, function($message) use ($user)
			    {
			    	$message->to($user['email'], $user['first_name'])->subject('TA的密码重置');
			    });
			});
		   	return Response::json(array('message'=>'邮件已发出，请注意查收','type'=>'success'));
		}catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
		   	return Response::json(array('message'=>'邮箱不存在','type'=>'warning'),500);
		}catch (Exception $e){
			return Response::json(array('message'=>'服务器错误','type'=>'error'),500);
		}
	}

	//重置密码页面
	public function getResetPassword(){
		try{
			$id = Input::get('id');
			$resetPasswordCode = Input::get('resetPasswordCode');
		    $user = Sentry::findUserById($id);
		    if ($user->checkResetPasswordCode($resetPasswordCode)) {
		    	$message ='现在，您可以修改你的密码';
				$type = 'info';
    			return Redirect::to('/#/resetPassword'.'?id='.$id.'&resetPasswordCode='.$resetPasswordCode)->with(array('message'=>$message,'type'=>$type));
		    } else {
		    	$message ='无效的连接';
				$type = 'warning';
				return Redirect::to('/')->with(array('message'=>$message,'type'=>$type),500);
		    }
		} catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
		    $message ='无效的连接';
			$type = 'warning';
			return Redirect::to('/')->with(array('message'=>$message,'type'=>$type),500);
		}catch (Exception $e){
			return Response::json(array('message'=>'服务器错误','type'=>'error'),500);
		}
	}

	//重置密码
	public function postResetPassword(){
		try{
		    $id = Input::get('id');
		    $resetPasswordCode = Input::get('resetPasswordCode');
		    $password = Input::get('password');
		    $user = Sentry::findUserById($id);
		    if ($user->checkResetPasswordCode($resetPasswordCode)) {
		        if ($user->attemptResetPassword($resetPasswordCode, $password)) {
		            $message ='密码修改成功';
    				$type = 'success';
    				return Response::json(array('message'=>$message,'type'=>$type));
		        } else {
		            // Password reset failed
		            $message ='密码修改失败';
    				$type = 'error';
		            return Response::json(array('message'=>$message,'type'=>$type),500);
		        }
		    } else {
		        // The provided password reset code is Invalid
	            $message ='提供的密码重置码是无效的';
				$type = 'error';
	            return Response::json(array('message'=>$message,'type'=>$type),500);
		    }
		}catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
		    $message ='密码修改失败';
			$type = 'error';
			return Response::json(array('message'=>$message,'type'=>$type),500);
		}catch (Exception $e){
			return Response::json(array('message'=>'服务器错误','type'=>'error'),500);
		}
	}

	//获取当前User
	public function getCurrentUser(){
		try
		{
		    $user = Sentry::getUser();
		    return Response::json($user);
		}catch (Cartalyst\Sentry\Users\UserNotFoundException $e){
			$message ='你没有登陆或者你的会话失效';
			$type = 'error';
		    return Response::json(array('message'=>$message,'type'=>$type),500);
		}catch (Exception $e){
			return Response::json(array('message'=>'服务器错误','type'=>'error'),500);
		}
	}
}
