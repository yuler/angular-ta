<!doctype html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,maximum-scale=1.0, user-scalable=no">
	  <title>乐聚 - 学习的乐趣</title>
    <script type="text/javascript" src="{{asset('/assets/js/lib/jquery-1.11.1.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/buttons.css')}}">
    <link rel="stylesheet" type="text/css" href="http://{{($_SERVER['SERVER_NAME']).':3000/down.css'}}">

    <script type="text/javascript" src="{{asset('/assets/js/lib/toastr.min.js')}}"></script>
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/toastr.min.css')}}"> -->

    <script type="text/javascript">
      $(function(){
          // toastr.options = {
          //   "closeButton": false,
          //   "positionClass": "toast-bottom-full-width",
          //   "onclick": null,
          //   "timeOut": "2000",
          //   "extendedTimeOut": "1000",
          //   "showMethod": "slideDown",
          //   "hideMethod": "slideUp"
          // }
        
          function disabledAlert(){
            setTimeout(function() {
              $('#alert').text('');
            }, 10000);
          }
          $("form").submit(function(){
            $('#subscribe').addClass('hide');
            $('#subscribe_loadding').removeClass('hide');
            $.ajax({
              type: "POST",
              url: "/mailChimps/add-subscriber",
              data: "email="+$("input[name='email']").val(),
              success: function(data){
                $("input[name='email']").val('');
                toastr.clear()
                if(data.name == "List_AlreadySubscribed"){
                  // toastr.warning('该邮箱已订阅！！！','信息提示');
                  $('#alert').text('您的地址已经注册，谢谢。');
                  disabledAlert();
                }else if(data.name == "ValidationError"){
                  // toastr.warning('邮箱地址不能为空','信息提示');
                  $('#alert').text('您的邮件地址填写有误，请检查后重新提交。');
                  disabledAlert();
                }
                else{
                  console.log(data);
                  // toastr.success('订阅成功，请到邮箱去确认','信息提示');
                  $('#alert').text('你已提交成功，请查询邮箱进行验证。');
                  disabledAlert();
                }
                $('#subscribe_loadding').addClass('hide');
                $('#subscribe').removeClass('hide');
              },
              error:function(data){
                $("input[name='email']").val('');
                // toastr.clear()
                // toastr.error('服务器代码错误，订阅失败。','信息提示。');
                $('#alert').text('服务器代码错误，订阅失败。','信息提示。');
                disabledAlert();
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
        display: none ! important;
      }
    </style>
</head>
<body class="container">
	<header>
		<p style="font-size:38px;color:#35393B;">XXXXX</p>
		<p>XXXXXXXXXXXXX XXXXXXXXXXXXXXX XXXX</p>
    <p>XXXXXXXXXXX XXXXXXXXXXXXXXXXXXXXX XXXXXXXXXXXX XXXXXXXXXXXXXXXXXXX XXXXXXXXXXXXXXXXX XXXXXXXXXXXXXXXXXXXXXXXXX</p>
  </header>
  <br>
  <div style="border-top: 1px solid #eee;max-width:650px;margin:0px auto;">&nbsp;</div>
  <br>
  <div id="content">
    <form>
      <div>
        <input type="text" name="email" placeholder="请输入你的邮箱" autofocus="autofocus">
        <!-- <button class="button glow button-flat button-primary" id="subscribe"><i class="fa fa-envelope"></i><span>&nbsp;&nbsp;现在提交</span></button> -->
        <!-- <button class="button disabled button-flat button-primary hide" id="subscribe_loadding" disabled="disabled"><i class="fa fa-spin fa-spinner"></i><span>&nbsp;&nbsp;处理中...</span></button> -->
        <span style="display:table-cell;text-align:right;width:100px;padding-left:10px;">
          <a id="subscribe" onclick="$('form').submit();"><i class="fa fa-envelope"></i><span>&nbsp;&nbsp;现在提交</span></a>
          <a id="subscribe_loadding" class="hide"><i class="fa fa-spin fa-spinner"></i><span>&nbsp;&nbsp;处理中...</span></a>
        </span>
      </div>
    </form>
  </div>
  <br>
  <div id="alert" style="font-size:14px;text-align:center;color:#7d878a;"></div>
  <br>
  <br>
	<footer>
		<p>
      <a href="http://114.215.149.143:2368/">XX</a>&nbsp;&nbsp;|&nbsp;&nbsp;
      <a href="http://www.trht.com.cn/">XX</a>&nbsp;&nbsp;|&nbsp;&nbsp;
      <a href="http://www.trht.com.cn/">XX</a>
    </p>
		<p>Copyright &copy; XX 2014 All rights reserved.</p>
    <p>Updated on 2014-8-8</p>
	</footer>
</body>
</html>