@extends('emails/_layouts/default')

@section('content')
	
	你好：<br><br>
	
	{{ $user['first_name'].$user['last_name'] }} 邀请你加入到 {{ $topic['name'] }} 。<br><br>
	
	{{ $user['first_name'].$user['last_name'] }}:{{ $leave_message }} <br><br>

	如果你已经注册，<a href="{{ route('site.topics.validation',$validation_code)}}">点击确认加入</a>，加入到主题中。<br><br>

	若果未注册，请先<a href="{{route('site.register.get')}}">注册</a>，

	再<a href="{{route('site.topics.validation',$validation_code)}}">点击确认加入。</a><br><br>
	

@stop