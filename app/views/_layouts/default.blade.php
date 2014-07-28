<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	@include('_partials/assets')
	<title>
		@section('title')
			TA主页
		@show
	</title>
</head>
<body>
	@include('_partials/navigation')

	<div class="container">

		@yield('main')

	</div>
	
	@include('_partials/footer')
</body>
</html>
