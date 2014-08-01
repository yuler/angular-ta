angular.module('services', ['ngResource'])

.factory('UserService',function($http){
	return {
		login : function(user){
			return $http.post('/login',user);
		},
		// get : function() {
		// 	return $http.get('/api/comments');
		// },
		// show : function(id) {
		// 	return $http.get('/api/comments/' + id);
		// },
		// save : function(commentData) {
		// 	return $http({
		// 		method: 'POST',
		// 		url: '/api/comments',
		// 		headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
		// 		data: $.param(commentData)
		// 	});
		// },
		// destroy : function(id) {
		// 	return $http.delete('/api/comments/' + id);
		// }
	}
})

.factory('AuthService', function($http) {
	
	var auth = false;

	var check = function(){
		$http.post('/auth/check').success(function(response){	
			if(response == 'true'){
				auth = true;
			}
		});
	}

	return {
		login:function(user){
			return $http.post('/auth/login',user);
		},
		check:function(){
			return $http.post('/auth/check');
		},
		logout:function(){
			return $http.post('/auth/logout');
		}
	};

})

.factory('UserServices', function($resource){
    return $resource('/users/:id', {},{
    	login :{url:'/users/login',method:'post'},
    	register :{url:'/users/register',method:'post'},
    	index : {method:'GET'},
    	show : {method:'GET'},
		store : {method:'POST', params:{entryId:''}, isArray:true},
		update: {method:'PUT', params: {entryId: '@entryId'}},
		destroy: {method:'DELETE'}
    });
 })