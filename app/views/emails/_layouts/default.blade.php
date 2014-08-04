<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
</head>
<body style="margin-top: 200px;
			font-family: 'Helvetica Neue', 'Helvetica','Microsoft YaHei', 'WenQuanYi Micro Hei',Arial, sans-serif;">
		
	<div class="container" style="padding: 50px 0;
			margin-top: 100px;
			width: auto;
			margin: 0 auto;
			width: 75%;
			box-shadow: rgb(153, 153, 153) 0px 0px 15px 0px;
			border-radius: 5px;">
		<div style="margin: 0 auto;
				width: 75%;
				float: left;
				text-align: left;
				">
			<!-- <center>
				<h1><a href="{{route('site.index')}}">TA社会化学习引擎服务</a></h1><br>
			</center> -->
		</div>
		<div style="padding:0 30px;">
			<h1>
				<a href="{{route('site.index')}}" style="text-decoration: none;color: #008cff;">TA社会化学习引擎服务</a>
			</h1>
			@yield('content')
		</div>
		<br><br><br>
		<div style="margin: 0 auto;
				width: 50%;
				padding-left:30px;
				padding-right:30px;
				float: right;
				text-align: right;
				">
			这封邮件来自<a href="{{route('site.index')}}" style="text-decoration: none;color: #008cff;">TA社会化学习引擎服务</a><br>
			联系我们<a href="mailto:yule@trht.com.cn" style="text-decoration: none;color: #008cff;">yule@trht.com.cn</a><br>
			2014 © | TRHT <br>
		</div>
		<br><br><br>
	</div>
</body>
</html>