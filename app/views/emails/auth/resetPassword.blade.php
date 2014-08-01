@extends('emails/_layouts/default')

@section('content')
	
	{{ $user['first_name'] }} 先生/女士，你好：<br>
	
	感谢您使用TA社会化学习引擎服务。<br>
	请点击以下链接进行密码重置<br>
	<a href="{{ route('site.resetPassword.get',array('id'=>$user['id'],'resetCode'=>$resetCode)) }}">马上密码重置</a><br>
	如果您无法点击以上链接，请复制以下网址到浏览器里直接打开： <br>
	<a href="{{ route('site.resetPassword.get',array('id'=>$user['id'],'resetCode'=>$resetCode)) }}">{{ route('site.resetPassword.get',array('id'=>$user['id'],'resetCode'=>$resetCode)) }}</a><br>
	如果您并未申请TA社会化学习帐号进行密码重置，可能是其他用户误输入了您的邮箱地址。请忽略此邮件，<br>	

@stop