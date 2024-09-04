@extends('theme.layouts.template')
@section('content')
<div id="BannerInner">
	<img src="{{URL::to('/')}}/public/assets/theme/images/banner-consulting.jpg" alt="Banner About" class="img-fluid w-100">
	<div class="caption small">
		TERMS & CONDITIONS
	</div>
</div>

<main id="main">
	<section id="CustomizedTrainingCourses" class="pt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<p>By purchasing your seat at our public workshop, you are deemed to have read and agreed to the following terms and conditions:</p>
					<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and any or all Agreements: “Client”, “You” and “Your” refers to you, the person accessing the Resource Portal and accepting the Company’s Terms and Conditions. “The Company”, “Ourselves”, “We” and “Us”, refers to our Company. “Party”, “Parties”, or “Us”, refers to both the Client and ourselves, or either the Client or ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner, whether by formal meetings of a fixed duration, or any other means, for the express purpose of meeting the Client’s needs in respect of provisions of the Company’s stated services/products, in accordance with and subject to, prevailing United States law. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>
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
<title>TERMS & CONDITIONS</title>
<meta name="description" content="TERMS & CONDITIONS" />
@endpush