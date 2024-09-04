@extends('theme.layouts.template')
@section('content')
	<main id="main">
		<section id="AboutJim">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<figure class="BlogPost mb-4 border-bottom pb-4">

							<a href="{{route('theme-blog')}}" class="back-to-blogs">
								<i class="far fa-arrow-alt-circle-left"></i> Back
							</a>
							<h3>{{$data['blog']->title}}</h3>
							<p><span class="Date"><strong>{{$carbon::parse($data['blog']->created_at)->format('m/d/Y')}}</strong></span>
								<a href="javascript:void(0)" class="Comments float-right goto"><strong>{{$data['blog']->comments_count}} </strong>Comment</a>
							</p>
							@if($data['blog']->image_top && file_exists("public/assets/admin/images/blog/".$data['blog']->image_top))
								{{HTML::image("public/assets/admin/images/blog/".$data['blog']->image_top, $data['blog']->title, array("class" => "img-fluid d-block mb-3 ml-auto mr-auto"))}}
							@endif
							<figcaption class="figure-caption">
								{!!$data['blog']->description_top!!}
							</figcaption>
							@if($data['blog']->image_bottom && file_exists("public/assets/admin/images/blog/".$data['blog']->image_bottom))
								{{HTML::image("public/assets/admin/images/blog/".$data['blog']->image_bottom, $data['blog']->title, array("class" => "img-fluid d-block mb-3 ml-auto mr-auto"))}}
							@endif
							<figcaption class="figure-caption">
								{!!$data['blog']->description_bottom!!}
							</figcaption>
						</figure>
						<div id="goto">
							@if($data["comments"])
								<div class="comments-sec">
									<h3>Comments</h3>
									@foreach($data["comments"] as $row)
										<div class="box">
											<small>{{$carbon::parse($row->created_at)->format('m/d/Y')}}</small>
											<h1>{{$row->name}}</h1>
											<p>{{$row->comment}}</p>
										</div>
									@endforeach
								</div>
							@endif
						</div>
						<form class="CommentsForm ajax_form" action="{{route('blog-review-write')}}" method="post">
							<h3>Leave a Reply.</h3>
							<div class="row">
								<div class="col-6">
									<label>Name <span>*</span></label>
									<input type="text" class="form-control" name="name">
								</div>
								<div class="w-100 mb-3"></div>
								<div class="col-6">
									<label>Email (not published) <span>*</span></label>
									<input type="text" class="form-control" name="email">
								</div>
								<div class="w-100 mb-3"></div>
								<div class="col-6">
									<label>Website</label>
									<input type="text" class="form-control" name="website">
								</div>
								<div class="w-100 mb-3"></div>
								<div class="col-6">
									<label>Comments <span>*</span></label>
									<textarea class="form-control" rows="6" name="comment"></textarea>
								</div>
								<div class="w-100 mb-3"></div>
								<div class="col-6 hide">
									<div class="form-check">
										<input type="checkbox" class="form-check-input" id="exampleCheck1" name="notify">
										<label class="form-check-label" for="exampleCheck1">Notify me of new comments to this post by email.</label>
									</div>
								</div>
								<div class="w-100 mb-3"></div>
								<input type="hidden" name="blog_id" value="{{$data['blog']->id}}" />
								<div class="col-6">
									<button type="submit" class="btn btn-primary BtnBlue">Submit</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-4 border-left">
						<h3>Author</h3>
						<p>Jim Glantz is the Managing Partner of The Academy For Leadership And Training (TAFLAT). A 20+
							year Executive of Organizational Development & Training, Jim holds a doctoral degree in
							Organizational Development and a Masters in Education from UCLA. Jim is an Associate Professor &
							the author of numerous articles.</p>

						<h3>Archives</h3>
						<ul>
							<li><a href="{{route('theme-blog', ['all'])}}">All Blogs</a></li>
							<!--<li><a href="#">July 2018 </a></li>
							<li><a href="#">April 2018 </a></li>
							<li><a href="#">December 2017 </a></li>
							<li><a href="#">November 2017 </a></li>-->
						</ul>

						<!--<h3>Categories</h3>
						<ul>
							<li><a href="#">All</a></li>
							<li><a href="#">Entrepreneurs </a></li>
							<li><a href="#">Executive </a></li>
							<li><a href="#">Coaching </a></li>
							<li><a href="#">Leaders </a></li>
							<li><a href="#">Leadership </a></li>
							<li><a href="#">Development </a></li>
							<li><a href="#">Organizational </a></li>
							<li><a href="#">Whiteboards </a></li>
						</ul>-->

					</div>
				</div>
			</div>
		</section>
	</main>
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
	<script>
		$(".goto").click(function() {
			$('html, body').animate({
				scrollTop: $((location.hash ? location.hash : "#goto")).offset().top - ($(".BottomHeader").height() + 100)
			}, 1000);
		});
		if(location.hash) $(".goto").click();
	</script>
@endpush
@push('metainfo')
	@if ($data['blog']->meta_title && $data['blog']->meta_description)

		<title>{{$data['blog']->meta_title}}</title>
		<meta name="description" content="{{$data['blog']->meta_description}}">

	@elseif( $data['blog']->title == 'Feedback 101: How to Provide Positive Critique for Personal Growth')

		<title>Feedback 101: How to Provide Positive Critique for Personal Growth</title>
		<meta name="description" content="Learn the art of constructive feedback and boost personal growth. Discover practical tips for giving positive critiques effectively.">

	@elseif( $data['blog']->title =='Setting the Standard: How Effective Leadership Helps Teams Thrive')

		<title>Effective Leadership: Making Teams Thrive</title>
		<meta name="description" content="Explore the power of effective leadership in fostering thriving teams. Learn how exceptional leadership sets the standard for success">
	@elseif($data['blog']->title =='Finding Harmony in the Workplace: Integrating Leadership and Management Techniques')

		<title>Harmonizing Leadership and Management</title>
		<meta name="description" content="Discover the art of integrating leadership and management techniques in the workplace. Achieve harmony for a more successful team">

	@elseif($data['blog']->title =='The Winning Formula: Executing on Your Goals with Strategic Coaching Techniques')

		<title>The Winning Formula: Achieving Your Goals with Strategic Coaching Techniques</title>
		<meta name="description" content="Unlock success with strategic coaching techniques. Learn how to execute your goals and realize your dreams with expert guidance.">
	@elseif($data['blog']->title =='Goals versus objectives: Learn to lead your teams to success')

		<title>Goals versus objectives: Learn to lead your teams to success</title>
		<meta name="description" content="Learn the difference between goals and objectives, and how to use them effectively to lead your teams to success.">



	@elseif($data['blog']->title =='The Connection between Trust and Excellence: Lessons from Winning Teams')

		<title>Trust and Excellence: Lessons from Winning Teams</title>
		<meta name="description" content="Explore the powerful link between trust and excellence through the experiences of successful teams. Discover key insights for your own journey to success.">


	@elseif($data['blog']->title =='10 Communication Skills You Need to Succeed at Work')

		<title>Mastering Success: 10 Essential Communication Skills for the Workplace</title>
		<meta name="description" content="Elevate your career with these 10 key communication skills. Discover how effective communication is the foundation of workplace success.">

	@elseif($data['blog']->title =='Team Up for Success: The Essentials of Building a Productive Team')

		<title>Unlock Success: Building a Productive Team – Essential Tips</title>
		<meta name="description" content="Learn the essentials of team building for success. Discover strategies and tips to create a productive, high-performing team.">


	@elseif($data['blog']->title =='Navigating Leadership Challenges with Professional Coaching Support in Miami')

		<title>Professional Coaching for Leadership Challenges in Miami</title>
		<meta name="description" content="Overcome Leadership Challenges with Expert Coaching in Miami. Elevate your leadership skills and enhance your career. Contact us today.">

	@elseif($data['blog']->title =="How to Expand Your Team’s Unique Ability")

		<title>Strategies for Expanding Your Team’s Unique Abilities</title>
		<meta name="description" content="Learn effective strategies to expand your team's unique abilities. Elevate collaboration and productivity for sustainable success. Explore now!">
	@elseif($data['blog']->title =="How Not To Scare Your Team with Your New Ideas")

		<title>Guiding Your Team Through New Ideas Without Causing Fear</title>
		<meta name="description" content="Navigate the introduction of new ideas to your team smoothly. Learn effective strategies to inspire, not scare, your team with innovative concepts. Boost collaboration and innovation.">

	@elseif($data['blog']->title =="How to Stop Team Issues from Affecting Your Bottom Line")
		<title>Mitigate Team Issues for Better Bottom-Line Results: A Guide</title>
		<meta name="description" content="Prevent team issues from affecting your bottom line with our comprehensive guide. Strategies to foster harmony and boost productivity for lasting success">

	@elseif($data['blog']->title =="How to Stop Team Issues from Affecting Your Bottom Line")
		<title>Finding Ideal Employees: Teamwork for Dream Work Success</title>
		<meta name="description" content="Unlock success by finding your ideal employees. Explore effective teamwork strategies for a harmonious and productive workplace. Build your dream team today.">

	@elseif($data['blog']->title =="Turning Challenges into Opportunities: Entrepreneurial Strategies")
		<title>Mastering Entrepreneurial Challenges: Strategies for Success</title>
		<meta name="description" content="Meta Description: Unlock success with entrepreneurial strategies. Navigate challenges, seize opportunities. Your guide to thriving in the business landscape">

	@elseif($data['blog']->title =="Achieve More by Doing Less: The Art of Simplification in Business")
		<title>Simplify for Success: Mastering the Art of Business Streamlining</title>
		<meta name="description" content="Unlock productivity with strategic simplification in business. Learn how to streamline processes, boost efficiency, and achieve more with less effort.">

	@elseif($data['blog']->title =="Find Your Balance: How Business Coaching Can Help You Manage Workload and Success")
		<title>Workload Balance: Transform Your Business with Expert Coaching Strategies</title>
		<meta name="description" content="Discover the power of business coaching to optimize your workload. Learn strategies for effective time management and success in your professional journey">

	@elseif($data['blog']->title =="Join TAFLAT's Emerging Leader Program for a Revolutionary Career")
		<title>TAFLAT's Emerging Leader Program: Revolutionize Your Career</title>
		<meta name="description" content="Unlock your potential with TAFLAT's Emerging Leader Program. Transform your career trajectory with our innovative approach to leadership development">

	@elseif($data['blog']->title =="Experience Personal Growth with Taflat's Customized Leadership Training")
		<title>Taflat Leadership Training: Experience Personal Growth</title>
		<meta name="description" content="Unlock your leadership potential with Taflat's customized training programs. Experience personal growth and elevate your leadership skills to new heights">

	@elseif($data['blog']->title =="Achieve Success with Dr. Jim Glantz's Customized Leadership Training in Miami")
		<title>Customized Leadership Training in Miami with Dr. Jim Glantz</title>
		<meta name="description" content="Unlock your leadership potential with customized training in Miami by Dr. Jim Glantz. Achieve success and enhance your leadership skills. Contact us today.">

	@elseif($data['blog']->title =="Personal Values and Ethics: The Leadership Difference in Organizations")
		<title>Leadership: Leveraging Personal Values and Ethics for Organizational Success</title>
		<meta name="description" content="Unlock the power of personal values and ethics to elevate leadership effectiveness within organizations. Learn how to make a difference as a leader.">

	@elseif($data['blog']->title =="The Role of Emotional Intelligence in Successful Business")
		<title>Emotional Intelligence: Key to Business Success</title>
		<meta name="description" content="Explore the significance of emotional intelligence in business. Discover how EQ impacts leadership, teamwork, and overall business success">

	@elseif($data['blog']->title =="Effective Presentation Tips: Delivering Your Best")
		<title>Effective Presentation Tips: Delivering Your Best</title>
		<meta name="description" content="Elevate your presentations with our top tips for effectiveness. Deliver your best performance and captivate your audience with confidence and impact">
		<!--  ***************************************************** -->
	@else
		<title>Leadership Training and Employee Development Academy</title>
		<meta name="description" content="Our professional development training programs are designed to improve the participantâ€™s ability to lead teams by kicking off projects with clear roles and responsibilities">
	@endif
@endpush