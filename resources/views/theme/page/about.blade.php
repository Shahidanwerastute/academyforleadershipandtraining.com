@extends('theme.layouts.template')
@section('content')
	<div id="BannerInner">
		<img src="{{URL::to('/')}}/public/assets/theme/images/banner-about.jpg" alt="Banner About" class="img-fluid w-100">
		<div class="caption">
			About TAFLAT
		</div>
	</div>

	<main id="main">
		<section id="AboutJim" style="background: transparent;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="text-center">
							<h2>Meet Our Company’s Founders</h2>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="pt-4 pb-4">
				<div class="container">
					<div class="media d-block d-md-flex mb-4">
						<img class="col-12 col-lg-3 col-md-4 align-self-center mb-4 ml-0 ml-md-4 mb-md-0 order-2 BoxShadow p-0" src="{{URL::to('/')}}/public/assets/theme/images/img-jim-glantz.jpg" alt="Jim Glants">
						<div class="media-body align-self-center order-1">
							<p><b>Dr. Jim Glantz (Executive Coach, Curriculum and Educational Consultant)</b> founded <b>The Academy for Leadership and Training (TAFLAT)</b> after years of hiring world-class leadership firms to assist with new leadership programs. As a Vice President for a large company, Jim began to realize “There is a way to do this better, for less money, and with more customization for companies!”</p>
							<p>Jim partnered with several other senior leadership consultants to launch The Academy, and soon one or two clients became dozens. The senior team delivered leadership training and executive coaching with a passion for excellence, and a willingness to make each client’s unique needs drive their engagements.</p>
							<p>Since that start, TAFLAT has secured clients from Fortune 100 companies to small start-ups. See what a few of our clients have to say about our dedication to them (below).</p>
							<p>To purchase Jim’s book on developing and delivering all types of training programs, click here.  Jim wrote this book “Worst Practices in Corporate Training” as a practical set of guidelines that all trainers should read.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="Grey pt-5 pb-4">
				<div class="container">
					<div class="media Grey d-block d-md-flex mb-4">
						<img class="col-12 col-lg-3 col-md-4 align-self-center mb-4 mr-0 mr-md-4 mb-md-0 order-1 BoxShadow p-0" src="{{URL::to('/')}}/public/assets/theme/images/kevin-walsh.jpg" alt="Kevin Walsh">
						<div class="media-body align-self-center order-2">
							<p><b>Kevin Walsh</b>, PsyD, is an accomplished leadership trainer and Executive Coach. Kevin
							has over 20 years of leadership facilitation experience, and his consulting practice
							includes a wide range of training and development solutions.</p>
							<p>Kevin has trained over 12,000 employees from the Front Line to the C-suite, across
							the globe. Kevin’s training and coaching clientele include Fortune 100 corporations,
							International NGOs, Universities, and Government Agencies. This client base comes
							from all industries: Healthcare, Finance, Agriculture, Engineering, Utilities,
							Manufacturing, Higher Education, and Entertainment.</p>

							<p>Kevin is well-known for his energetic and engaging style and ensures that class participants combine deep
							learning with laughter, thereby fostering an environment of trust and respect for each other. Kevin has
							researched the most effective research methodologies to define and deliver world-class leadership
							curricula, while carefully customizing each engagement with unique empathy and inspiration.</p>

							<p>
							Beyond this expertise, Kevin holds additional accomplishments:
							<ul>
								<li>Professional Certified Coach (PCC) with the International Coach Federation (ICF)</li>
								<li>Certified in DISC, Connective Leadership, Situational Leadership II, Achieve Global</li>
								<li>Faculty member at Phillips Graduate University, Loyola Marymount University, College of the Canyons,
								and Rollins College</li>
								<li>Doctorate of Psychology; Organizational Management and Consulting</li>
							</ul>
							</p>

							<p>Please contact Kevin directly at <a href="Kevin@TAFLAT.com">Kevin@TAFLAT.com</a>, to start up a discussion about how Kevin, and TAFLAT,
							can create innovative, interactive, and impactful leadership programs for your company.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<br><br>
		<section id="JimAvailability">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-12">
						<h3 class="mb-5">
							<ul>
								<li>Jim and/or Kevin are available as dynamic, interactive speakers for your company events or off-sites on topics such as:</li><br>
								<li>Emotional Intelligence For Business, Managing Across Multiple Generations, The Keys To Implementing Change, Generating A Culture Of Problem-Solving, and more."</li>
							</ul>
						</h3>
						<div class="row AvailabilityList text-center text-sm-left">
							<div class="col-md-12 mb-5">
								<img class="mr-sm-3 d-block d-sm-inline-block m-auto" src="{{URL::to('/')}}/public/assets/theme/images/emaotional-intelligence.png" alt="Emotional Intelligence">
								Emotional Intelligence For Business
							</div>
							<div class="col-md-12 mb-5">
								<img class="mr-sm-3 d-block d-sm-inline-block m-auto" src="{{URL::to('/')}}/public/assets/theme/images/multiple-generations.png" alt="Multiple Generations">
								Managing Across Multiple Generations
							</div>
							<div class="col-md-12 mb-5">
								<img class="mr-sm-3 d-block d-sm-inline-block m-auto" src="{{URL::to('/')}}/public/assets/theme/images/keys-to-implementing-change.png" alt="Keys To Implementing Change">
								The Keys To Implementing Change
							</div>
							<div class="col-md-12 mb-5">
								<img class="mr-sm-3 d-block d-sm-inline-block m-auto" src="{{URL::to('/')}}/public/assets/theme/images/culture-of-problem-solving.png" alt="Culture Of Problem-Solving">
								Generating A Culture Of Problem-Solving, and more
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 text-center">
						<a href="https://www.amazon.com/WORST-Practices-Corporate-Training-Spectacular-ebook/dp/B078MF49Q4/ref=sr_1_1?s=books&ie=UTF8&qid=1516216404&sr=1-1"
						   target="_blank"><img src="{{URL::to('/')}}/public/assets/theme/images/bnr-book.jpg" class="BorderImg rounded img-fluid" alt="WORST Practices Corporate Training Spectacular ebook"></a>
					</div>
				</div>
			</div>
		</section>
	</main>
	@include('theme.section.testimonials')
@endsection
@push('css')

@endpush
@push('js')	

@endpush
@push('metainfo')
	<title>About TAFLAT: Dr. Jim Glantz's Vision of Excellence in Leadership Training</title>
	<meta name="description" content="Discover Dr. Jim Glantz's TAFLAT: Pioneering leadership training excellence. Tailored solutions blending experience and innovation for transformative growth"/>
@endpush