angular.module('directives',[])

.directive('focusMe', function($timeout,$parse) {
	return {
    link: function(scope, element, attrs) {
      scope.$watch(attrs.focusMe, function(value) {
        if(value === true) { 
          // console.log('value=',value);
          $timeout(function() {
            element[0].focus();
            // scope[attrs.focusMe] = false;
          },500);
        }
      });
    }
  };
})

.directive('tipsyW', function($timeout,$parse) {
  return {
    restrict: 'A',
    link: function (scope, element, attrs) {
        element.tipsy({gravity: 'w'});
    }
  };
})
.directive('tipsyS', function($timeout,$parse) {
  return {
    restrict: 'A',
    link: function (scope, element, attrs) {
        element.tipsy({gravity: 's'});
    }
  };
})


.directive('tipsyFS', function($timeout,$parse) {
  return {
    restrict: 'A',
    link: function (scope, element, attrs) {
        element.tipsy({trigger: 'focus', gravity: 's'});
    }
  };
})