<!DOCTYPE html>
<html lang="en">
<head>
	@include('catalog.layouts.head')

	<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-DPF3EK6HJQ"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'G-DPF3EK6HJQ');
		</script>

</head>
<body class="{{(app()->getLocale() == 'ar' ? 'arb' : '')}}">
	@if(!request()->ajax())
		@if(!isset($data['pdf_view'])) 
			@if(!Route::is('admin-generate-survey-avg-pdf'))
			<div class="alert alert-success alert-dismissible alert-top" role="alert">
				Take the Assessment for <strong>FREE</strong> this month by typing in the coupon code <strong>TAFLAT!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif

			@if(!Route::is('admin-generate-survey-avg-pdf'))
			<div id="loader-content"><div class="loader">Loading...</div></div>
			@endif
		@endif
	@endif
	@yield('content')
	@include('catalog.layouts.routes')
	@include('catalog.layouts.jquery')
</body>
</html>