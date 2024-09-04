@extends('theme.layouts.template')
@section('content')
<div id="BannerInner">
	<img src="{{URL::to('/')}}/public/assets/theme/images/banner-consulting.jpg" alt="Banner About" class="img-fluid w-100">
	<div class="caption small">
		Privacy Policy
	</div>
</div>

<main id="main">
	<section id="CustomizedTrainingCourses" class="pt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<p>We are committed to protecting your privacy. Only authorized employees within our company will access any information collected from individual customers. We constantly review our systems and data to ensure the best possible service to our customers. </p>
					<p>Please note that the United States Congress has created established laws specifically prohibiting the unauthorized access of computer systems and data. We will investigate any attempts to access our systems, with the intent to prosecute and/or enforce civil damages against those responsible.</p>
				</div>
			</div>
		</div>
	</section>
</main>
@endsection
@push('css')

@endpush
@push('js')

@endpush
@push('metainfo')
<title>Privacy Policy</title>
<meta name="description" content="Privacy Policy" />
@endpush