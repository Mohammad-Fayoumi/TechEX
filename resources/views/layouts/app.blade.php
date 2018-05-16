<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	<title>TeachEX-@yield('title')</title>
</head>
<body>
	<div class="container">

	 {{-- @yield it is a blade's engine function to display content in html  --}}

		@yield('content')

	</div>

	@yield('footer')
	@yield('JS')

</body>
</html>