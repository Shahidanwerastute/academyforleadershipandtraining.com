<!DOCTYPE html>
<html lang="en">
<head>
	@include('theme.layouts.head')

	<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-07MG94PZLY"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'G-07MG94PZLY');
		</script>

	<style>
		div.g-recaptcha > div {
    		height: auto !important;
		}
	</style>
</head>
<body>
	<div class="alert alert-success alert-dismissible alert-top" role="alert">
		Take the Assessment for <strong>FREE</strong> this month by typing in the coupon code <strong>TAFLAT!</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@include('theme.layouts.header')
	@yield('content')
	@include('theme.layouts.routes')
	@include('theme.layouts.jquery')
	@include('theme.layouts.footer')
</body>
</html>