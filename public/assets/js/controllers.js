// 消息提示
function tipMsg(data){
	if(data.type == 'success'){
		toastr.success(data.message,'信息提示');
	}else if(data.type == 'info'){
		toastr.info(data.message,'信息提示');
	}else if(data.type == 'warning'){
		toastr.warning(data.message,'信息提示');
	}else if(data.type == 'error'){
		toastr.error(data.message,'信息提示');
	}
}

angular.module('controllers',[
	'angular-loading-bar',
	'ngAnimate',
	'angularFileUpload',
])

.controller('IndexCtrl',function($scope, $http, $timeout, cfpLoadingBar){

	// angular.element('#sb-site').style();

	// angular.element('#sb-site').css('background-image','url(http://img.taopic.com/uploads/allimg/120224/37-12022409521021.jpg)');
	// angular.element('#sb-site').css('background-repeat','no-repeat');
	// angular.element('#sb-site').css('background-position','150% 150%');
	$scope.start = function() {
	  cfpLoadingBar.start();
	};
	$scope.complete = function () {
	  cfpLoadingBar.complete();
	}
	$scope.start();
	$scope.fake = true;
	$timeout(function() {
	  $scope.complete();
	  $scope.fake = false;
	}, 500);
})

.controller('NavCtrl', function($scope,$location,$http,$route) {
	
	$scope.home = function(){
		$location.path('/');
	}
	$scope.login = function(){
		$location.path('/login');
	}
	$scope.settings = function(){
		$location.path('/settings');
	}
	$scope.logout = function(){
		// AuthService.logout().success(function(){
		// 	$location.path('/').replace();
		// 	Messenger().post({
		// 		message : '登出成功',
		// 		type : 'success',
		// 	});
		// });
	}
})

//用户验证的控制器，登录，注册，重置密码。
.controller('UserCtrl',function($scope,$http,$location,$routeParams,$timeout,$upload,cfpLoadingBar,UserServices){
	//登陆连接和登陆
	$scope.login = function(){
		$location.path('/login');
	};
	$scope.postLogin = function(){
		UserServices.login($scope.user,
			function(data){
				tipMsg(data);
				$location.path('/topics');
			},
			function(error){
				tipMsg(error.data);
			}
		);
	};
	//注册连接和注册
	$scope.register = function(){
		$location.path('/register');
	}
	$scope.postRegister = function(){
		UserServices.register($scope.user,
			function(data){
				tipMsg(data);
				$location.path('/login');
			},
			function(error){
				tipMsg(error.data);
				console.log(error);
			}
		);
	}
	//忘记密码连接和发送重置密码邮件
	$scope.forget = function(){
		$location.path('/forget');
	}
	$scope.postForget = function(){
		UserServices.forget($scope.user,
			function(data){
				tipMsg(data);
				//用户未登录，跳转
				if(!$scope.user.id){
					$location.path('/login');
				}
			},
			function(error){
				tipMsg(error.data);
				console.log(error);
			}
		);
	}
	//重置密码页面初始化，重置密码
	$scope.resetPassowrdInit = function(){
		$scope.user = {'id':$routeParams.id,'resetPasswordCode':$routeParams.resetPasswordCode};
		if(!$scope.user.id || !$scope.user.resetPasswordCode){
			$location.path('/login');
			tipMsg({'message':'无效的链接地址','type':'warning'});
		}
	}
	$scope.postResetPassword = function(){
		UserServices.resetPassword($scope.user,
			function(data){
				tipMsg(data);
				$location.url('/login');
			},
			function(error){
				tipMsg(error.data);
				console.log(error);
				$location.url('/login');
			}
		);
	}

	//个人设置
	$scope.edit = function(){
		UserServices.currentUser(
			function(data){
				$scope.user = data;
			},
			function(error){
				tipMsg(error.data);
				console.log(error);
			}
		);
	}
	$scope.putUpdate = function(){
		UserServices.update($scope.user.id,$scope.user,
			function(data){
				tipMsg(data);
			},
			function(error){
				tipMsg(error.data);
				console.log(error);
			}
		)
	}
	//上传头像
	$scope.uploadAvatar = function($files) {
	  //$files: an array of files selected, each file has name, size, and type.
	  for (var i = 0; i < $files.length; i++) {
	    var file = $files[i];
	  	console.log(file);
	    $scope.upload = $upload.upload({
	      url: '/users/upload-avatar', 
	      method: 'POST',
	      data: {avatar: file,userId : $scope.user.id},
	    }).progress(function(evt) {
	    	console.log('percent: ' + parseInt(100.0 * evt.loaded / evt.total));
	    }).success(function(data, status, headers, config) {
	    	tipMsg(data);
	    	console.log(data.file_path);
	    	$scope.user.extension.avatar = data.file_path;
	    }).error(function(error){
	    	tipMsg(error);
	    });
	  }
	};

	$scope.start = function() {
	  cfpLoadingBar.start();
	};
	$scope.complete = function () {
	  cfpLoadingBar.complete();
	}
	$scope.start();
	$scope.fake = true;
	$timeout(function() {
	  $scope.complete();
	  $scope.fake = false;
	}, 500);
})

.controller('RegisterCtrl', function($scope,$http,$location,$timeout,cfpLoadingBar) {
	$scope.login = function(){
		$location.path('/login');
	}
	$scope.forget = function(){
		$location.path('/forget');
	}

	$scope.start = function() {
	  cfpLoadingBar.start();
	};
	$scope.complete = function () {
	  cfpLoadingBar.complete();
	}
	$scope.start();
	$scope.fake = true;
	$timeout(function() {
	  $scope.complete();
	  $scope.fake = false;
	}, 500);
})

.controller('ForgetCtrl', function($scope,$http,$location,$timeout,cfpLoadingBar) {

	$scope.start = function() {
	  cfpLoadingBar.start();
	};
	$scope.complete = function () {
	  cfpLoadingBar.complete();
	}

	$scope.start();
	$scope.fake = true;
	$timeout(function() {
	  $scope.complete();
	  $scope.fake = false;
	}, 500);
})

.controller('TopicCtrl',function($scope,$timeout,cfpLoadingBar){
	
	$scope.start = function() {
	  cfpLoadingBar.start();
	};
	$scope.complete = function () {
	  cfpLoadingBar.complete();
	}
	$scope.start();
	$scope.fake = true;
	$timeout(function() {
	  $scope.complete();
	  $scope.fake = false;
	}, 500);
})

.controller('Ctrl', function($scope,$http,$location,$timeout,cfpLoadingBar) {
	
	
})