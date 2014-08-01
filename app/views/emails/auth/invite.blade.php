@extends('emails/_layouts/default')

@section('content')

	你好：<br><br>
	
	{{ $user['first_name'].$user['last_name'] }} 邀请你加入到TA 。<br><br>
	
	{{ $user['first_name'].$user['last_name'] }} 给你的留言<br><br>

	<blockquote>{{ $leave_message }}</blockquote><br><br>

	<a href="{{route('site.index')}}">进入到TA</a><br><br>

	<a href="{{route('site.register.get')}}">进入到TA注册</a><br><br>

@stop