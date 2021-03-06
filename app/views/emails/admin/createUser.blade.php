@extends('emails/_layouts/default')

@section('content')
	
	{{ $user['first_name'] }} 先生/女士，你好：<br>
	
	感谢您使用TA社会化学习引擎服务。<br>
	请点击以下链接进行邮箱验证，以便开始使用您的TA社会化学习帐号：<br>
	<a href="{{ route('site.login.get') }}">登录</a><br>
	你的密码为：{{ $password }}<br>
	如果您无法点击以上链接，请复制以下网址到浏览器里直接打开： <br>
	<a href="{{ route('site.login.get') }}">{{ route('site.login.get') }}</a><br>
	如果您并未申请TA社会化学习帐号，可能是其他用户误输入了您的邮箱地址。请忽略此邮件，<br>
	
@stop