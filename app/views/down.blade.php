<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
	<title>社会化学习引擎 |（TA）</title>
    <script type="text/javascript" src="{{asset('/assets/js/lib/jquery-1.11.1.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/buttons.css')}}">
    <link rel="stylesheet" type="text/css" href="http://{{($_SERVER['SERVER_NAME']).':3000/down.css'}}">

    <script type="text/javascript" src="{{asset('/assets/js/lib/toastr.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/toastr.min.css')}}">

    <script type="text/javascript">
      $(function(){
          toastr.options = {
            "closeButton": false,
            "positionClass": "toast-bottom-full-width",
            "onclick": null,
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showMethod": "slideDown",
            "hideMethod": "slideUp"
          }
        
          $("form").submit(function(){
            $('#subscribe').addClass('hide');
            $('#subscribe_loadding').removeClass('hide');
            $.ajax({
              type: "POST",
              url: "/PushMailController/addSubscriber",
              data: "email="+$("input[name='email']").val(),
              success: function(data){
                $("input[name='email']").val('');
                toastr.clear()
                if(data.name == "List_AlreadySubscribed"){
                  toastr.warning('该邮箱已订阅！！！','信息提示');  
                }else if(data.name == "ValidationError"){
                  toastr.warning('邮箱地址不能为空','信息提示');  
                }
                else{
                  toastr.success('订阅成功，请到邮箱去确认','信息提示');
                }
                $('#subscribe_loadding').addClass('hide');
                $('#subscribe').removeClass('hide');
              },
              error:function(data){
                $("input[name='email']").val('');
                toastr.clear()
                toastr.error('服务器代码错误，订阅失败','信息提示');
                $('#subscribe_loadding').addClass('hide');
                $('#subscribe').removeClass('hide');
              }
            });
          	return false;
          });
      });
    </script>
    <style type="text/css">
      .hide{
        display: none;
      }
    </style>
</head>
<body class="container">
	<header>
		<h1>社会化学习引擎（TA）</h1>
		<br>
		<p>一个在非正式环境下，通过目标导向的持续改进方式,更好地实现有效学习的工具。</p>
  </header>
  <br><br><br>
  <div id="content">
    <form>
      <input type="email" name="email" placeholder="请输入你的邮箱" autofocus="autofocus">
      <button class="button glow button-flat button-primary" id="subscribe"><i class="fa fa-envelope"></i>&nbsp;&nbsp;订阅</button>
      <button class="button disabled button-flat button-primary hide" id="subscribe_loadding" disabled="disabled"><i class="fa fa-spin fa-spinner"></i>&nbsp;&nbsp;处理中...</button>
		</form>
	</div>
	<br><br><br>
	<footer>
		<p>
      <a href="http://www.trht.com.cn/">TRHT</a>&nbsp;&nbsp;|&nbsp;&nbsp;
      <a href="http://www.trht.com.cn/">乐聚 Blog</a>&nbsp;&nbsp;|&nbsp;&nbsp;
      <a href="http://www.trht.com.cn/">XX</a>
    </p>
		<p>Copyright &copy; XX 2014 All rights reserved.</p>
    <p>Updated on 2014-8-8</p>
	</footer>
</body>
</html>