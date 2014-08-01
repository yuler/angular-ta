@extends('emails/_layouts/default')

@section('content')

	{{ $reply_user['first_name'] }} 先生/女士，你好：<br><br>
	
	你的评论有了新的回复<br><br>
	
	{{ $user['first_name'].$user['last_name'] }}  回复了你的评论<br><br>

	{{ Markdown::string($comment['content']) }}<br><br>
	

	<a href="{{ $comment['url']}}">查看详细内容</a><br><br>
	
	
@stop