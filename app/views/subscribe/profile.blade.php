<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Unsubscribe</title>
	<script type="text/javascript" src="{{asset('/assets/js/lib/jquery-1.11.1.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/font-awesome.min.css')}}">
</head>
<style type="text/css">
	body,input{
		font-family: "lucida Grande",Verdana;
	}
	.button{
		display: inline-block;
		font-weight: 500;
		font-size: 16px;
		line-height: 42px;
		font-family: 'Helvetica', Arial, sans-serif;
		width: auto;
		white-space: nowrap;
		height: 42px;
		margin: 0px 5px 0px 0;
		padding: 0 22px;
		text-decoration: none;
		text-align: center;
		cursor: pointer;
		border: 0;
		border-radius: 3px;
		vertical-align: top;
		text-transform: capitalize;
	}
	.hide{
		display: none ! important;
	}
</style>
<script type="text/javascript">
	$(function(){
		$('form').submit(function(){
			$('#unsubscribeBtn').addClass('hide');
			$('#unsubscribeLoading').removeClass('hide');
			$.ajax({
                type: "POST",
                url: "/mailChimps/profile",
                data: "email="+$("input[name='email']").val()+"&newEmail="+$("input[name='newEmail']").val(),
                success: function(data){
                	if(data.status == 'error'){
                		if(data.name == "Email_NotExists"){
                			$('#alert').html("您的邮箱并没有注册我们的服务。");
	                	}else if(data.name == "List_MergeFieldRequired"){
	                		$('#alert').html("您输入的邮件地址有误。");
	                	}
	                	else{
	                		$('#alert').html("服务器异常...");
	                	}	
                	}else{
                		$('#unsubscribeConfirm').addClass('hide');
                		$('#unsubscribeSuccess').removeClass('hide');
                	}
                	$('#unsubscribeLoading').addClass('hide');
					$('#unsubscribeBtn').removeClass('hide');
					$('#newEmail').html($("input[name='newEmail']").val());
                },
                error: function(data) {
                	$('#alert').html("服务器异常...");
                	$('#unsubscribeLoading').addClass('hide');
					$('#unsubscribeBtn').removeClass('hide');
                }
            });
			return false;
		});
	})

</script>
<body>
	<header style="text-align: center;padding-top:50px;padding-bottom:50px;">
		<strong><span style="color:#35393B; font-size:38px">XXXXX</span></strong>
	</header>

	<div style="text-align: center;">
		<div style="border-top: 2px solid #eeeeee;max-width:600px;margin:0px auto;">&nbsp;</div>
		<br />
	
		<div id="unsubscribeConfirm">
			<form>
				<span style="font-size:16px; text-align:center;color:#7d878a;">请输入您的邮箱地址点击更新邮箱</span><br />
				<br /><br />
				<input type="text" name="email" value="{{ Input::get('email') }}" class="hide">
				<input type="text" name="newEmail" style="height:36px;font-size:18px;padding-left:15px;width:250px;">
				<button class="button" style="background-color:#eeeeee" id="unsubscribeBtn"><span style="background-color:#eeeeee;color:#7d878a;font-size:18px;">更新邮箱</span></button>
				<a class="button hide" style="background-color:#eeeeee" id="unsubscribeLoading"><span style="background-color:#eeeeee;color:#7d878a;font-size:18px;"><i class="fa fa-spin fa-spinner"></i>  正在处理</span></a>
				<br /><br />
				<p style="text-align: center;">
					<span style="color:#7d878a; font-size:12px">如果您错误的进入到该页面，只需将其关闭即可。如果您不点击上面的按钮，就不会取消。<br />
					如果对本事宜由任何问题，请联系：<a href="mailto:service@fffffun.com">service@fffffun.com</a></span> &nbsp;
				</p>
			</form>
		</div>

		<div id="unsubscribeSuccess" class="hide">
			<span style="font-size:16px; text-align:center;color:#7d878a;">您的邮箱地址更新成功</span><br />
			<br />
			<br />
			<div style="font-size:18px; text-align:center;color:#7d878a;">邮箱地址：<span id="newEmail"></span></div>
			<br />
			<br />
			<p style="text-align: center;">
				<span style="color:#7d878a; font-size:12px">如果您错误的进入到该页面，只需将其关闭即可。如果您不点击上面的按钮，就不会取消。<br />
				如果对本事宜由任何问题，请联系：<a href="mailto:service@fffffun.com">service@fffffun.com</a></span> &nbsp;
			</p>
		</div>
		<br />
			<div id="alert" style="font-size:14px;color:#7d878a;"></div>
		<br />
		<div style="border-bottom: 2px solid #eeeeee;max-width:600px;margin:0px auto;">&nbsp;</div>
	</div>
	<footer>
		<p style="text-align: center;padding-top:50px;"><span style="color:#999999; font-size:14px">XX &nbsp;| &nbsp;XX &nbsp;| &nbsp;XX </span><br />
		<span style="color:#999999; font-size:14px">Copyright&nbsp; &copy; &nbsp;XX 2014 All rights reserved.</span><br />
		<span style="color:#999999; font-size:14px">Updated on 2014-8-8</span> &nbsp;</p>
	</footer>
</body>
</html>