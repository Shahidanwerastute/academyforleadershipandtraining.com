@extends('theme.layouts.template')
@section('content')
	<div id="BannerInner">
		<img src="{{URL::to('/')}}/public/assets/theme/images/banner-resources.jpg" alt="Banner About" class="img-fluid w-100">
		<div class="caption">
			Resources &amp; Writing
		</div>
	</div>

	<main id="main">
		<section id="Resources">
			<div class="container">
				<h2 class="text-capitalize text-center">
					<small>For monthly tips and updates, check out the <a href="{{route('theme-blog')}}"><span class="LightBlue">TAFLAT Blog!</span></a></small>
				</h2>
				<div class="row">
					<div class="col-lg-3 col-md-4">
						<a href="{{route('theme-worst_practices_in_corporate_training')}}">
							<img src="{{URL::to('/')}}/public/assets/theme/images/img-jim-glant-new.jpg" class="figure-img BorderImg rounded img-fluid" alt="Book">
						</a>
					</div>
					<div class="col-xl-5 col-lg-7 col-md-8 align-self-center">
						<figure class="figure">
							<figcaption class="figure-caption">
								<h4 class="border-bottom pb-3 mb-3">GET THE BOOK THAT JUST MAY CHANGE YOUR
									VIEW CORPORATE TRAINING</h4>
									<small class="d-block">Worst Practices In Corporate <br> Training <br> $15.00<br>
										Spectacular disasters... What we learned. Discover how most worst
									</small>
									<a href="{{route('theme-worst_practices_in_corporate_training')}}" class="btn btn-primary text-uppercase mt-4">shop</a>
							</figcaption>
						</figure>
					</div>
				</div>
			</div>
		</section>
		<section id="CorporateTraining" class="pt-0">
			<div class="container">
				<h2 class="text-center mb-5">
					<small><span class="font-weight-light"><span class="LineThru">best</span> practices </span> . . . in
						Corporate training
					</small>
				</h2>
				<div class="row">
					<div class="col-md-3 text-center">
						<figure class="figure">
							<a href="{{route('theme-worst_practices_in_corporate_training')}}" target="_blank"><img src="{{URL::to('/')}}/public/assets/theme/images/bnr-book.jpg" class="figure-img BorderImg rounded img-fluid"
													alt="Book">
							<figcaption class="figure-caption FigText text-uppercase">
								<strong>Worst Practices in Corporate Training
								<br> - Jim Glantz PhD</strong>
							</figcaption></a>
						</figure>
					</div>
					<div class="col-md-9 mb-4 mb-md-0 pt-5">
						<p>It is time to reinvent how we train and coach our employees and our leaders. The business
							environment has shifted over the years, but the way we lead people has not. This new book and
							Consulting firm were developed to incorporate fun with valuable content. Worst Practices will
							provide invaluable lessons in what NOT to do, and templates for what TO do, for corporate
							training
							or project management leaders.</p>
						<p>To develop this book, we interviewed dozens of trainers, captured the most valuable and
							painful“disaster stories,” and then included simple templates and checklists that will help any
							training program manager to avoid these same pitfalls.</p>
						<p>Research indicates that we learn far more from failures than from successes. And we thought we
							would apply that logic, in a fun, valuable, and sometimes cringe worthy manner!</p>
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
	<title>Resources & Writing: Monthly Insights and Updates</title>
	<meta name="description" content="Stay updated with the latest in resources and writing. Dive into our monthly tips, expert insights, and trending topics to enhance your knowledge and skills."/>
@endpush