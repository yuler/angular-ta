<?php

class UserController extends BaseController {

	/*

	|--------------------------------------------------------------------------
	| UserController
	|--------------------------------------------------------------------------
	
	*/

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

	public function postRegister(){
		//注册用户
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
			return Response::json(array('message'=>'服务器错误','type'=>'error'),500);
		}
		
	}

	public function postForget(){

	}

}
