@extends('emails/_layouts/default')

@section('content')
	
	{{$user['first_name']}}先生/女士，你好：<br>
	感谢您使用TA社会化学习引擎服务</a><br>
	请点击以下链接进行密码重置<br>
	<a style="text-decoration:none;
	    text-decoration: none;
	    padding: 15px 50px;
	    display: inline-block;
	    border-radius: 3px;
	    color:white;
	    background-color: #00b5e5;" href="{{URL('/').'/users/reset-password?id='.$user['id'].'&resetPasswordCode='.$resetPasswordCode}}">马上密码重置</a><br>
	<a href="{{URL('/').'/users/reset-password?id='.$user['id'].'&resetPasswordCode='.$resetPasswordCode}}">{{URL('/').'/users/reset-password?id='.$user['id'].'&resetPasswordCode='.$resetPasswordCode}}</a><br>
	如果您并未申请TA社会化学习帐号进行密码重置，可能是其他用户误输入了您的邮箱地址。请忽略此邮件，<br>
	可能是其他用户误输入了您的邮箱地址，请忽略此邮件。<br>

@stop