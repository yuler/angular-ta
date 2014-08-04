@extends('emails/_layouts/default')

@section('content')
	
	{{$user['first_name']}}先生/女士，你好：<br>
	
	感谢您使用TA社会化学习引擎服务</a>。<br>
	请点击以下链接进行邮箱验证，以便开始使用您的TA社会化学习帐号：<br>
	<a style="text-decoration:none;
	    text-decoration: none;
	    padding: 15px 50px;
	    display: inline-block;
	    border-radius: 3px;
	    color:white;
	    background-color: #00b5e5;" href="{{URL('/').'/users/activate?id='.$user['id'].'&activationCode='.$activationCode}}">马上验证邮箱</a><br>
	如果您无法点击以上链接，请复制以下网址到浏览器里直接打开： <br>
	<a href="{{URL('/').'/users/activate?id='.$user['id'].'&activationCode='.$activationCode}}">{{URL('/').'/users/activate?id='.$user['id'].'&activationCode='.$activationCode}}</a><br>
	如果您并未申请TA社会化学习帐号。<br>
	可能是其他用户误输入了您的邮箱地址，请忽略此邮件。<br>
	
@stop