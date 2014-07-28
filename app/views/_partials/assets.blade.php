

<script type="text/javascript" src="{{asset('/assets/js/jquery-1.11.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/headroom.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/jQuery.headroom.min.js')}}"></script>

<!-- <link rel="stylesheet" type="text/css" href="{{asset('/assets/css/animate.min.css')}}"> -->

<script type="text/javascript" src="{{asset('/assets/js/slidebars.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/slidebars.min.css')}}">


<link rel="stylesheet" type="text/css" href="{{asset('/assets/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="http://{{($_SERVER['SERVER_NAME']).':3000/app.css'}}">


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
		        initial : "headroom",
		        // when scrolling up
		        pinned : "headroom--pinned",
		        // when scrolling down
		        unpinned : "headroom--unpinned",
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
		

		
	});
</script>
<style type="text/css">
	.headroom--pinned{
		position: fixed;
		right: 0;
		left: 0;
	}
	.headroom--unpinned{
		display: none;
	}
</style>