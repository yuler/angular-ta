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
.controller('UserCtrl',function($scope,$http,$location,$timeout,cfpLoadingBar,UserServices){
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

	$scope.register = function(){
		$location.path('/register');
	}

	$scope.postRegister = function(){
		UserServices.register($scope.user,
			function(data){
				tipMsg(data);
				// $location.path('/login');
			},
			function(error){
				tipMsg(error.data);
			}
		);
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