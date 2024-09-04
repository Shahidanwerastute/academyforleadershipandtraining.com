@extends('theme.layouts.template')
@section('content')
<div id="banner" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#banner" data-slide-to="0" class="active"></li>
		<li data-target="#banner" data-slide-to="1"></li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
			{{HTML::image("public/assets/theme/images/banner.jpg", "Leadership and Training", array("class" => "d-block w-100"))}}
			<div class="carousel-caption d-none d-md-block">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="carousel-box">
								<span>Welcome to </span>
								<h1>The Academy for Leadership and Training!</h1>
								<p>​Whether you're in Operations, Human Resources,or the President of the company, you rely on your
									people to deliver results. Our training programs are customized to maximize your leaders'
									potential!</p>
								<a href="{{route('theme-leadership-training')}}" class="BtnDiscover">Discover More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="carousel-item">
			{{HTML::image("public/assets/theme/images/banner2.jpg", "COMMUNICATIONS ASSESSMENT", array("class" => "d-block w-100"))}}
			<div class="carousel-caption d-none d-md-block">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="carousel-box">
								<h1>COMMUNICATIONS ASSESSMENT</h1>
								<p>For your own, personal Communication Assessment report, click here. The Assessment is $10, but this month, just use the coupon "TAFLAT" for a FREE assessment!</p>
								<div>
									Take the Assessment for <strong>free</strong> this month by typing in the coupon code <strong>TAFLAT</strong>
								</div>
								<div class="clearfix"></div><br>
								<a href="{{route('theme-communications-assessment')}}" class="BtnDiscover">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a class="carousel-control-prev" href="#banner" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#banner" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<main id="main">
	<section id="MainServices" class="MainServices">
		<div class="container text-center">
			<h2>EXPLORE TAFLAT'S SERVICES</h2>
			<p class="DarkBlue">Our focus is helping you achieve business goals, through the development of your employees.</p>
			<div class="row MarginBottom">
				<article class="col-xl-4 col-lg-4 mb-4 mb-lg-0">
					<div class="BorderBox">
						<span class="Leadrship_Training"></span>
						<h5>CUSTOMIZED LEADERSHIP TRAINING</h5>
						<p>Each company is unique, so your training programs should be unique as well!</p>
						<a href="{{route('theme-leadership-training')}}" class="readMore">Read More</a>
					</div>
				</article>
				<article class="col-xl-4 col-lg-4 mb-4 mb-lg-0">
					<div class="BorderBox">
						<span class="Executive_Coaching"></span>
						<h5>EXECUTIVE <br> COACHING</h5>
						<p>Gain the understanding to identify the right areas of opportunity within your company.</p>
						<a href="{{route('theme-executive-coaching')}}" class="readMore">Read More</a>
					</div>
				</article>
				<article class="col-xl-4 col-lg-4 mb-4 mb-lg-0">
					<div class="BorderBox">
						<span class="Organization_Consultant"></span>
						<h5>ORGANIZATIONAL CONSULTING</h5>
						<p>Drill down to the root causes of concern to discover how they impact broader areas of organizational opportunity.</p>
						<a href="{{route('theme-consulting')}}" class="readMore">Read More</a>
					</div>
				</article>
			</div>

			<!-- <div id="VideoBox" class="row">
					<div class="col-12">
						<div class="PlayIcon">
							<img src="images/img-video.jpg" alt="Video" class="img-fluid">
							<span class="d-none d-sm-block">View Our Presentation Video
							We love Our Client!</span>
						</div>
					</div>
				</div> -->
		</div>
	</section>
	@include("theme.section.courses", ["can_register" => 1])

	<section class="MainServices text-center">
		<div class="container">
			<h2>COMMUNICATIONS ASSESSMENT</h2>
			<p class="DarkBlue mb-0">Which of these Communication Styles are you???</p>

			<img src="{{URL::to('/')}}/public/assets/theme/images/ca.png" alt="COMMUNICATIONS ASSESSMENT" class="img-fluid mt-5 mb-5">

			<div class="row">
				<div class="col-12">
					<p>Your Communication Style is the most predictable way to learn more about <b>how you interact with people around you.</b></p>
					<p>Our Assessment takes under 5 minutes to complete. Our cost of $10 for the Communication Assessment, paid through Paypal, will provide you with a <b>detailed, customized report</b> on your Communication Style, how your Style tends to interact with other Styles, and several critical, personalized Coaching techniques that will help you make small adjustments that yield huge benefits for your communication effectiveness!</p>
					<div class="w-100"><a href="{{route('theme-communications-assessment')}}" target="_blank" class="BtnBlue">Click here for More Detail</a></div>

					<div class="clearfix"></div><br>

					<div class="text-center" style="font-size: 16px;">
						Take the Assessment for <strong>free</strong> this month by typing in the coupon code <strong>TAFLAT</strong>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="Clients">
		<div class="container text-center">
			<h2>EXPLORE FORMER &amp; CURRENT CLIENTS</h2>
			<p class="DarkBlue">THAT HAVE BENEFITED FROM THE ACADEMY'S UNIQUE LEADERSHIP AND DEVELOPMENT TRAININGS!</p>
			<div class="row">
				<div class="col-xl-3 col-md-4 col-sm-6 mb-5">
					<a class="hoverBox" href="https://www.wonderful.com/" target="_blank">
						<div class="imgbox d-flex">
							<img src="{{URL::to('/')}}/public/assets/theme/images/client-img-1.jpg" alt="The wonderful company" class="img-fluid m-auto">
						</div>
						<span>The wonderful <br> company</span>
					</a>
				</div>
				<div class="col-xl-3 col-md-4 col-sm-6 mb-5">
					<a class="hoverBox" href="https://www.justinwine.com/" target="_blank">
						<div class="imgbox d-flex">
							<img src="{{URL::to('/')}}/public/assets/theme/images/client-img-2.jpg" alt="Justin vineyards and winery" class="img-fluid m-auto">
						</div>
						<span>Justin vineyards <br> & winery</span>
					</a>
				</div>
				<div class="col-xl-3 col-md-4 col-sm-6 mb-5">
					<a class="hoverBox" href="javascript:(void);" target="_blank">
						<div class="imgbox d-flex">
							<img src="{{URL::to('/')}}/public/assets/theme/images/client-img-3.jpg" alt="Paramount Farms pistachios and Almonds" class="img-fluid m-auto">
						</div>
						<span>Paramount Farms <br> pistachios & Almonds</span>
					</a>
				</div>
				<div class="col-xl-3 col-md-4 col-sm-6 mb-5">
					<a class="hoverBox" href="http://www.appliedmaterials.com/" target="_blank">
						<div class="imgbox d-flex">
							<img src="{{URL::to('/')}}/public/assets/theme/images/client-img-4.jpg" alt="Applied materials" class="img-fluid m-auto">
						</div>
						<span>Applied <br> materials</span>
					</a>
				</div>
				<div class="col-xl-3 col-md-4 col-sm-6 mb-5">
					<a class="hoverBox" href="http://www.pharmavite.com/" target="_blank">
						<div class="imgbox d-flex">
							<img src="{{URL::to('/')}}/public/assets/theme/images/client-img-5.jpg" alt="Pharmavite" class="img-fluid m-auto">
						</div>
						<span class="single">Pharmavite </span>
					</a>
				</div>
				<div class="col-xl-3 col-md-4 col-sm-6 mb-5">
					<a class="hoverBox" href="https://www.bankofamerica.com/" target="_blank">
						<div class="imgbox d-flex">
							<img src="{{URL::to('/')}}/public/assets/theme/images/client-img-6.jpg" alt="Bank of America" class="img-fluid m-auto">
						</div>
						<span>Bank of <br> America</span>
					</a>
				</div>
				<div class="col-xl-3 col-md-4 col-sm-6 mb-5">
					<a class="hoverBox" href="https://www.teleflora.com/" target="_blank">
						<div class="imgbox d-flex">
							<img src="{{URL::to('/')}}/public/assets/theme/images/client-img-7.png" alt="teleflora" class="img-fluid m-auto">
						</div>
						<span>Teleflora</span>
					</a>
				</div>
				<div class="col-xl-3 col-md-4 col-sm-6 mb-5">
					<a class="hoverBox" href="https://www.wellsfargo.com/" target="_blank">
						<div class="imgbox d-flex">
							<img src="{{URL::to('/')}}/public/assets/theme/images/client-img-8.jpg" alt="Wells Fargo" class="img-fluid m-auto">
						</div>
						<span class="single">Wells Fargo</span>
					</a>
				</div>
				<div class="w-100"><a href="{{route('theme-clients')}}" class="BtnBlue">View All Clients</a></div>
			</div>
		</div>
	</section>
	@include("theme.section.courses", ["can_register" => 0])
	@if($data["blogs"])
	<section id="LatestBlog">
		<div class="container">
			<div class="text-center">
				<h2>latest blog</h2>
				<p class="DarkBlue">​The Academy For Leadership And Training (TAFLAT)</p>
			</div>
			<div class="row">
				@foreach($data["blogs"] as $row)
				<article class="col-xl-4 col-lg-4 col-md-4">
					<div class="card">
						<span class="DateBox text-center  align-items-center">{{$carbon::parse($row->created_at)->format('j')}}<small>{{$carbon::parse($row->created_at)->format('M')}}</small></span>
						@if($row->image_top && file_exists("public/assets/admin/images/blog/".$row->image_top))
						{{HTML::image("public/assets/admin/images/blog/".$row->image_top, $row->title, array("class" => "card-img-top"))}}
						@endif
						<div class="card-body">
							<h4 class="card-title">{{$row->title}}</h4>
							<p class="card-text">{!!Str::limit($row->description_top, 150, ' (...)')!!}
							</p>
							<a href="{{route('theme-blog-detail', [$row->id, str_replace(' ', '-', $row->title)])}}" class="readMore">Read More</a>
						</div>
					</div>
				</article>
				@endforeach
			</div>
		</div>
	</section>
	@endif
</main>
@include('theme.section.testimonials')
@include('alerts.success')
@include('alerts.error')
@endsection
@push('css')
{{HTML::style('public/assets/theme/css/alert.css')}}
@endpush
@push('js')
{{HTML::script('public/assets/assets/js/altair_admin_common.js')}}
{{HTML::script('public/assets/assets/js/pages/components_notifications.min.js')}}
{{HTML::script('public/assets/assets/js/uikit_custom.min.js')}}
@endpush
@push('metainfo')
<title>Leadership Training & Coaching: CA to Miami Excellence - TAFLAT</title>
<meta name="description" content="Unlock potential with top Leadership Training & Employee Development initiatives. Elevate team dynamics, enhance skills, and drive organizational growth." />
@endpush