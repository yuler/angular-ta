<div id="navigation" class="animated" ng-controller="NavCtrl">
	<a href="javascript:void(0);" ng-class="{'active':silder_left}" ng-init="silder_left=false" ng-click="silder_left=!silder_left" class="sb-toggle-left" tipsy-w title="目录"><i class="fa fa-bars"></i></a>
	<a href="javascript:void(0);" onclick="night()" tipsy-w title="黑夜"><i class="fa fa-moon-o"></i></a>
	<a href="javascript:void(0);" onclick="day()" tipsy-w title="白天"><i class="fa fa-sun-o"></i></a>
	<a href="javascript:void(0);" class="sb-toggle-right" tipsy-w title="用户"><i class="fa fa-user"></i></a>
	<a href="javascript:void(0);" ng-click="home()" tipsy-w title="主页"><i class="fa fa-home"></i></a>
	<a href="javascript:void(0);" ng-click="loginout()" tipsy-w title="退出"><i class="fa fa-sign-out"></i></a>
	<a href="javascript:void(0);" ng-click="login()" tipsy-w title="登录"><i class="fa fa-sign-in"></i></a>
	<a></a> 
</div>

<script type="text/javascript">
	$(function(){
		init();
	});
	function init(){
		$.ajax({
			url:'/cookies/theme',
			method:'get',
			success:function(res){
				if(res == 'day'){
					// loadjscssfile("http://"+localhost+":3000/app.css","css");
				}else if(res == 'night'){
					loadjscssfile("http://"+localhost+":3000/app-night.css","css");
					setTimeout(function(){
						removejscssfile("http://"+localhost+":3000/app.css","css");
					},100);
				}else{
					// alert(res);
				}
			},
			error:function(res){
				console.log('加载 Theme 失败。。。'+res);
			}
		})
	}
	function day(){
		$.ajax({
			url:'/cookies/theme',
			method:'put',
			data:'theme=day',
			success:function(res){
				dayTheme();
			},
			error:function(res){
				console.log('加载 Theme 失败。。。'+res);
			}
		})
	}
	function night(){
		$.ajax({
			url:'/cookies/theme',
			method:'put',
			data:'theme=night',
			success:function(res){
				nightTheme();
			},
			error:function(res){
				console.log('加载 Theme 失败。。。'+res);
			}
		})
	}

	function dayTheme(){
		loadjscssfile("http://"+localhost+":3000/app.css","css");
		setTimeout(function(){
			removejscssfile("http://"+localhost+":3000/app-night.css","css");
		},100);
	}
	function nightTheme(){
		loadjscssfile("http://"+localhost+":3000/app-night.css","css");
		setTimeout(function(){
			removejscssfile("http://"+localhost+":3000/app.css","css");
		},100);
	}
</script>