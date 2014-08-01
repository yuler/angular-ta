<script type="text/javascript">
	var localhost = "{{$_SERVER['SERVER_NAME']}}";
</script>

<script type="text/javascript" src="{{asset('/assets/js/lib/jquery-1.11.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/lib/underscore-min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/animate.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/buttons.css')}}">

<script type="text/javascript" src="{{ asset('/assets/js/lib/angular.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/lib/angular-resource.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/lib/angular-route.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/lib/angular-animate.min.js') }}"></script>

<!-- angular-loading-bar-master -->
<script type="text/javascript" src="{{ asset('/assets/js/lib/loading-bar.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/loading-bar.css') }}">

<script type="text/javascript" src="{{asset('/assets/js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/controllers.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/services.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/directives.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/filters.js')}}"></script>

<script type="text/javascript" src="{{asset('/assets/js/lib/headroom.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/lib/jQuery.headroom.min.js')}}"></script>

<script type="text/javascript" src="{{asset('/assets/js/lib/slidebars.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/slidebars.min.css')}}">

<script type="text/javascript" src="{{asset('/assets/js/lib/jquery.tipsy.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/tipsy.css')}}">

<script type="text/javascript" src="{{asset('/assets/js/lib/toastr.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/toastr.min.css')}}">

<link rel="stylesheet" type="text/css" href="http://{{($_SERVER['SERVER_NAME']).':3000/app.css'}}">
<script type="text/javascript" src="{{asset('/assets/js/global.js')}}"></script>


<script type="text/javascript">
	$(function(){
		$('#navigation').headroom({
		    // vertical offset in px before element is first unpinned
		    offset : 0,
		    // scroll tolerance in px before state changes
		    tolerance : 0,
		    // or scroll tolerance per direction
		    tolerance : {
		        down : 0,
		        up : 0
		    },
		    // css classes to apply
		    classes : {
		        // when element is initialised
		        initial : "animated",
		        // when scrolling up
		        pinned : "fadeInDown",
		        // when scrolling down
		        unpinned : "fadeOutUp",
		        // when above offset
		        top : "headroom--top",
		        // when below offset
		        notTop : "headroom--not-top"
		    },
		    // callback when pinned, `this` is headroom object
		    onPin : function() {},
		    // callback when unpinned, `this` is headroom object
		    onUnpin : function() {},
		    // callback when above offset, `this` is headroom object
		    onTop : function() {},
		    // callback when below offset, `this` is headroom object
		    onNotTop : function() {}
		});
		
		$.slidebars();
		
		// 设置提示信息
		toastr.options = {
		  "closeButton": false,
		  "positionClass": "toast-top-full-width",
		  "onclick": null,
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showMethod": "slideDown",
		  "hideMethod": "slideUp"
		}
		// function tipMsg(data){
		// 	if(data.type == 'success'){
		// 		toastr.success(data.message,'信息提示');
		// 	}else if(data.type == 'info'){
		// 		toastr.info(data.message,'信息提示');
		// 	}else if(data.type == 'warning'){
		// 		toastr.warning(data.message,'信息提示');
		// 	}else if(data.type == 'error'){
		// 		toastr.error(data.message,'信息提示');
		// 	}
		// }
		// toastr.success('Have fun storming the castle!', 'Miracle Max Says');
	});

</script>