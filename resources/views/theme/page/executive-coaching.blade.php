@extends('theme.layouts.template') 
@section('content')
<div id="BannerInner">
	<img src="{{URL::to('/')}}/public/assets/theme/images/banner-executive.jpg" alt="Executive Coaching" class="img-fluid w-100">
	<div class="caption">
		Executive Coaching
	</div>
</div>

<main id="main">
	<section class="pt-5">
		<div class="text-center">
			<h2>The Leadership Coaching Process</h2>
			<p class="DarkBlue">We approach every client as a completely unique project. As such, this process may be modified for your needs.</p>

			
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 col-md-8 col-sm-12">
						<iframe width="100%" height="400" src="https://www.youtube.com/embed/LGD4-AOrLNw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			
			
		</div>
		<div class="container pt-4 pb-4">
			<div class="media d-block d-md-flex mb-4">
				<img class="col-12 col-lg-3 col-md-4 align-self-center mb-4 mr-0 mr-md-4 mb-md-0 order-1 BoxShadow p-0" src="{{URL::to('/')}}/public/assets/theme/images/img-understanding.jpg"
				 alt="Leadership Coaching Process Understating">
				<div class="media-body align-self-center order-2">
					<h5>Understanding</h5>
					<p> The Coaching relationship begins with the Coach and the Client. Occasionally, the relationship also starts with the
						Client’s Manager.</p>
					<p>The first step to any engagement is to try to understand the areas of opportunity. A discussion takes places during
						which the parties talk openly about both positive and less-helpful behaviors. We also try to understand key structural
						components, such as overlapping responsibilities with other departments/individuals, and metrics for assessing the
						success of the leader.</p>
					<p>In many cases, our Assessment will include multiple interviews with the leader's peers, direct reports, and her/his
						manager. During that Assessment, we develop for the leader a fair and accurate composite picture. The results of that
						Assessment are included in the improvement areas that the leader already has identified. </p>
				</div>
			</div>
			<div class="Grey pt-5 pb-4">
				<div class="container">
					<div class="media Grey d-block d-md-flex mb-4">
						<img class="col-12 col-lg-3 col-md-4 align-self-center mb-4 ml-0 ml-md-4 mb-md-0 order-2 BoxShadow p-0" src="{{URL::to('/')}}/public/assets/theme/images/img-coachingplan.jpg"
						 alt="Coaching Plan">
						<div class="media-body align-self-center order-1">
							<h5>Create a Coaching Plan</h5>
							<p>Once our Assessment phase is complete, the Coach and the Client sit down to collaboratively draft the Client's Coaching
								Plan.
							</p>
							<p>The Coaching Plan includes feedback from the Assessment Phase. The Coach and the Client spend one-two meetings, with
								the goal of drilling down to understand the root cause of the behavior(s) that the Client decides s/he wishes to
								improve.
							</p>
							<p>In many cases, the Client then shares her/his Coaching Plan with the Client’s Manager. Through that process, both
								the Client and the Coach are clear that their work is aligned with the Client's manager, and the Client is sure s/he
								is working on areas for improvement that best help the business. At this point, we work to establish metrics for
								the engagement.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="container pt-5 pb-4">
				<div class="media d-block d-md-flex mb-4">
					<img class="col-12 col-lg-3 col-md-4 align-self-center mb-4 mr-0 mr-md-4 mb-md-0 order-1 BoxShadow p-0" src="{{URL::to('/')}}/public/assets/theme/images/img-implementplan.jpg"
					 alt="Coaching Plan Implementation">
					<div class="media-body align-self-center order-2">
						<h5>Implement the Plan</h5>
						<p>The Client implements her/his Coaching Plan, with regular meetings with the Coach.</p>
						<p>During this phase, the Coach and the Client’s manager may meet occasionally; however, the Coach will not divulge confidential
							information to the Client's manager.</p>
						<p>Key metrics captured during this phase help the Client to point to measurable progress.
						</p>
						<p>Also, the Coach and the Client discuss the how and when to phase out their time together. The Coach is there to make
							sure the Client is set up for success and prepared for the Coach's exit.</p>
					</div>
				</div>
			</div>
			<div class="Grey pt-5 pb-4">
				<div class="container">
					<div class="media Grey d-block d-md-flex mb-4">
						<img class="col-12 col-lg-3 col-md-4 align-self-center mb-4 ml-0 ml-md-4 mb-md-0 order-2 BoxShadow p-0" src="{{URL::to('/')}}/public/assets/theme/images/img-measure.jpg"
						 alt="Coaching Plan">
						<div class="media-body align-self-center order-1">
							<h5>Create a Coaching Plan</h5>
							<h5>Measure and Feedback</h5>
							<p>The Coach and the Client may continue to meet periodically for some time.
							</p>
							<p>In many cases, the Client will ask the Coach to implement a second 360 survey/interviews, in order to capture metrics
								on progress the Client has made.</p>
						</div>
					</div>
				</div>
			</div>
	</section>
</main>

<div class="w-100 mb-5 mt-5 text-center">
	<a href="mailto:Paul@TAFLAT.com?Subject=Business%20Inquiry!" target="_top" class="BtnBlue">To ask us about Leadership Coaching, Please Click Here!</a>
</div>


<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-12"> 
			<h5>Frequently Asked Questions About Coaching and Training</h5>
			
			
			<p class="mb-1 pt-3">
			  <button class="btn btn-primary" style="white-space: inherit; text-align: left; background: transparent; border: 0; color: black; font-style: italic;" data-toggle="collapse" data-target="#faq1" role="button" aria-expanded="false" aria-controls="faq1">
				<i class="fa fa-arrow-down" aria-hidden="true"></i> What is Executive Coaching? 
			  </button>	  
			</p>
			
			
			<div class="collapse pb-3" id="faq1"> 
			  <div class="card p-3">
				Executive Coaching is the process of a leader hiring a coach to take her/him to the next level of their performance. Depending on what the leader needs to develop, the coaching conversations and tools are customized for that engagement. 
			  </div>
			</div>	
			
			
			<p class="mb-1 pt-3">
			  <button class="btn btn-primary" style="white-space: inherit; text-align: left; background: transparent; border: 0; color: black; font-style: italic;" data-toggle="collapse" data-target="#faq2" role="button" aria-expanded="false" aria-controls="faq2">
				<i class="fa fa-arrow-down" aria-hidden="true"></i> How can coaching help me improve my executive functioning?
			  </button>	  
			</p>
			
			<div class="collapse pb-3" id="faq2"> 
			  <div class="card p-3">
				Our clients tell us coaching has helped them in various ways: developing their strategies for their work, leading others with more patience and empathy, and generally improving how the leader "shows up" in a variety of settings. 
			  </div>
			</div>		
			
			<p class="mb-1 pt-3">
			  <button class="btn btn-primary" style="white-space: inherit; text-align: left; background: transparent; border: 0; color: black; font-style: italic;" data-toggle="collapse" data-target="#faq3" role="button" aria-expanded="false" aria-controls="faq3">
				<i class="fa fa-arrow-down" aria-hidden="true"></i> How can you determine if coaching is right for you?
			  </button>	  
			</p>
			
			
			<div class="collapse pb-3" id="faq3"> 
			  <div class="card p-3">
				In the bigger picture, everyone needs a coach...even coaches. To determine if coaching is right for you, you need to take a patient look at yourself and determine, "What could I work on to make me more successful than I am?" When you understand what that might be, and the value it will bring to your career, it's time to call a coach. 
			  </div>
			</div>	
			
			
			<p class="mb-1 pt-3">
			  <button class="btn btn-primary" style="white-space: inherit; text-align: left; background: transparent; border: 0; color: black; font-style: italic;" data-toggle="collapse" data-target="#faq4" role="button" aria-expanded="false" aria-controls="faq4">
				<i class="fa fa-arrow-down" aria-hidden="true"></i> How long does the coaching process take?
			  </button>	  
			</p>
			
			<div class="collapse pb-3" id="faq4"> 
			  <div class="card p-3">
				We provide the guideline that our coaching engagement should include a 6-month minimum sign up. The reason is we want to have enough time to have our clients see that coaching has propelled their careers to next levels. While most executive coaches ask for a 1-year sign up, we like to let our clients decide if they want to keep it going...and to pay for it. Our contract allows us to put our money where our mouth is, and that agreement takes the risk away from the client.
			  </div>
			</div>

			<p class="mb-1 pt-3">
			  <button class="btn btn-primary" style="white-space: inherit; text-align: left; background: transparent; border: 0; color: black; font-style: italic;" data-toggle="collapse" data-target="#faq5" role="button" aria-expanded="false" aria-controls="faq5">
				<i class="fa fa-arrow-down" aria-hidden="true"></i> How is coaching different to therapy and counselling?
			  </button>	  
			</p>
			
			<div class="collapse pb-3" id="faq5"> 
			  <div class="card p-3">
				Great question! Executive Coaching is about improving your business performance. Now, occasionally, conversations do get personal. For example, becoming a better leader may mean sleeping more, taking a vacation periodically, or working out. In this case, the coach is encouraging those behaviors to enhance the client's leadership capabilities. 
				Therapy has a different goal. The goal of therapy is to become happier, in general, for that purpose alone. Therapy usually includes discussion about an individual's past, including family relationships, to provide the space for that healing. 
				Occasionally, a good business coach may recommend a great therapist for a client. Some of our clients talk to clinical psychologists, as well as their business coach, and that's great -- and for different objectives. 
			  </div>
			</div>

			<p class="mb-1 pt-3">
			  <button class="btn btn-primary" style="white-space: inherit; text-align: left; background: transparent; border: 0; color: black; font-style: italic;" data-toggle="collapse" data-target="#faq6" role="button" aria-expanded="false" aria-controls="faq6">
				<i class="fa fa-arrow-down" aria-hidden="true"></i> What are benefits of coaching to individuals and organizations?
			  </button>	  
			</p>
			
			<div class="collapse pb-3" id="faq6"> 
			  <div class="card p-3">
				The main benefit of having a coach is that every conversation is tailored to your success, and your particular needs. As a leader in an organization, these conversations can move individuals to levels they can only achieve with a coach. 
				The advantage to an organization is you will have stronger, more confident, more patient leaders who extract the most joy and efficiency from their teams. 
			  </div>
			</div>	

			<p class="mb-1 pt-3">
			  <button class="btn btn-primary" style="white-space: inherit; text-align: left; background: transparent; border: 0; color: black; font-style: italic;" data-toggle="collapse" data-target="#faq9" role="button" aria-expanded="false" aria-controls="faq9">
				<i class="fa fa-arrow-down" aria-hidden="true"></i> How do I sign up for a coaching session?
			  </button>	  
			</p>
			
			<div class="collapse pb-3" id="faq9"> 
			  <div class="card p-3">
				Hit the Contact Us button, or email us at admin@taflat.com. We are happy to provide dozens of references of current and past clients!  
			  </div>
			</div>			
			
			<p class="pt-3">
			</p>		
		</div>
	</div>	
</div>


@endsection
 @push('css') 
@endpush @push('js') 
@endpush @push('metainfo')
<title>Executive & Leadership Coaching: Elevate Leadership from California to Miami</title>
<meta name="description" content="Discover transformative Executive and Leadership Coaching spanning California to Miami. Harness top-tier strategies, drive performance, and achieve visionary outcomes."
/> 
@endpush