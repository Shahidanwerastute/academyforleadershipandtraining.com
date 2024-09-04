<!DOCTYPE html>
<html lang="en">
<head>
	@include('admin.layouts.head')
</head>
<body class=" sidebar_slim sidebar_slim_inactive">
	@include('admin.layouts.header')
	@include('admin.layouts.sidebar')
	@yield('content')
	@include('admin.layouts.footer')
	@include('admin.layouts.routes')
	@include('admin.layouts.language')
	@include('admin.layouts.jquery')
</body>
</html>