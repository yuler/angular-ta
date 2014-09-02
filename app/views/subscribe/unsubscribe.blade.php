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
		$('#unsubscribeBtn').click(function(event) {
			$('#unsubscribeBtn').addClass('hide');
			$('#unsubscribeLoading').removeClass('hide');
			$.ajax({
                type: "POST",
                url: "/mailChimps/unsubscribe",
                data: "email="+$("input[name='email']").val(),
                success: function(data){
                	if(data.status == 'error'){
                		if(data.name="Email_NotExists"){
                			$('#alert').html("你的邮箱已经取消过注册。");
	                	}else{
	                		$('#alert').html("服务器异常...");
	                		
	                	}	
                	}else{
                		$('#unsubscribeConfirm').addClass('hide');
                		$('#unsubscribeSuccess').removeClass('hide');
                	}
                	$('#unsubscribeLoading').addClass('hide');
					$('#unsubscribeBtn').removeClass('hide');
                },
                error: function(data) {
                	$('#alert').html("服务器异常...");
                	$('#unsubscribeLoading').addClass('hide');
					$('#unsubscribeBtn').removeClass('hide');
                }
            });
		});
		$('#reasonBtn').click(function(event) {
			$.ajax({
                type: "POST",
                url: "/mailChimps/unsubscribe-reason",
                data: "email="+$("input[name='email']").val()+"&"+$("input[name='reason']").serialize(),
                success: function(data){
                	$('#alert').html("非常感谢你的意见和反馈。");
                },
                error:function(data){
                	console.log(data);
                	$('#alert').html("服务器异常...");
                }
            });
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
			<span style="font-size:16px; text-align:center;color:#7d878a;">请核对一下邮件地址点击取消注册</span><br />
			<br /><br />
			<input type="email" name="email" style="height:36px;font-size:18px;padding-left:15px;width:250px;" value="{{ Input::get('email') }}" disabled>
			<a class="button" style="background-color:#eeeeee" id="unsubscribeBtn"><span style="background-color:#eeeeee;color:#7d878a;font-size:18px;">取消注册</span></a>
			<a class="button hide" style="background-color:#eeeeee" id="unsubscribeLoading"><span style="background-color:#eeeeee;color:#7d878a;font-size:18px;"><i class="fa fa-spin fa-spinner"></i>  正在处理</span></a>
			<br /><br />
			<p style="text-align: center;">
				<span style="color:#7d878a; font-size:12px">如果你错误的进入到该页面，只需将其关闭即可。如果你不点击上面的按钮，就不会取消。<br />
				如果对本事宜由任何问题，请联系：<a href="mailto:service@fffffun.com">service@fffffun.com</a></span> &nbsp;
			</p>
		</div>
		<div id="unsubscribeSuccess" class="hide">
			<span style="font-size:16px; text-align:center;color:#7d878a;">你已成功取消注册</span><br />
			<br />
			<span style="font-size:16px; text-align:center;color:#7d878a;">如果你有时间，请告诉我们您取消注册登记的原因</span><br />
			<br />
			<input type="radio" name="reason" id="reason_1" value="我不希望再收到这些邮件">&nbsp;&nbsp;&nbsp;&nbsp;<label for="reason_1" onMouseOver="this.style.cursor = 'pointer' " style="font-size:14px; color:#999999;">我不希望再收到这些邮件</label><br><br>
			<input type="radio" name="reason" id="reason_2" value="我误操作注册了这个服务">&nbsp;&nbsp;&nbsp;&nbsp;<label for="reason_2" onMouseOver="this.style.cursor = 'pointer' " style="font-size:14px; color:#999999;">我误操作注册了这个服务</label><br><br>
			<input type="radio" name="reason" id="reason_3" value="我不喜欢这个邮件的内容">&nbsp;&nbsp;&nbsp;&nbsp;<label for="reason_3" onMouseOver="this.style.cursor = 'pointer' " style="font-size:14px; color:#999999;">我不喜欢这个邮件的内容</label><br><br>
			<a class="button tpl-content-highlight" style="background-color:#eeeeee" id="unsubscribeBtn">
				<span class="tpl-content-highlight" style="background-color:#eeeeee;color:#7d878a;font-size:18px;" id="reasonBtn">现在提交</span>
			</a>
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