@extends('theme.layouts.template')
@section('content')
	<div id="BannerInner">
		<img src="{{URL::to('/')}}/public/assets/theme/images/banner-customize_leadership.jpg" alt="Banner About" class="img-fluid w-100">
		<div class="caption small">
			CUSTOMIZED LEADERSHIP AND <br> TRAINING COURSES
		</div>
	</div>

	<main id="courses-collapse" class="_courses Grey pt-5 pb-5 mg-space-init">
		<div class="container">
			<div class="row mg-rows">
				<article class="col-xl-3 col-lg-4 col-md-6">
					<div class="card">
						<div class="img-holder">
							<img class="card-img-top" src="{{URL::to('/')}}/public/assets/theme/images/img-black-and-white-city-man-people.jpg" alt="Task Based Leadership and Delegating Tasks">
						</div>
						<div class="card-body">
							<h4 class="card-title">Task-Based Leadership and Delegating Tasks</h4>
							<a href="" class="readMore collapsed mg-trigger" data-toggle="collapse" data-target="#demo1">Read More</a>
						</div>
					</div>
				</article>
				<article class="col-xl-3 col-lg-4 col-md-6">
					<div class="card">
						<div class="img-holder">
							<img class="card-img-top" src="{{URL::to('/')}}/public/assets/theme/images/img-goats-competition-dispute.jpg" alt="Understanding and Managing Conflict">
						</div>
						<div class="card-body">
							<h4 class="card-title">Understanding & Managing Conflict</h4>
							<a href="" class="readMore collapsed mg-trigger" data-toggle="collapse" data-target="#demo2">Read More</a>
						</div>
					</div>
				</article>
				<article class="col-xl-3 col-lg-4 col-md-6">
					<div class="card">
						<div class="img-holder">
							<img class="card-img-top" src="{{URL::to('/')}}/public/assets/theme/images/img-project-manager.jpg" alt="Effective Project Management">
						</div>
						<div class="card-body">
							<h4 class="card-title">Change Through Effective Project Management</h4>
							<a href="" class="readMore collapsed mg-trigger" data-toggle="collapse" data-target="#demo3">Read More</a>
						</div>
					</div>
				</article>
				<article class="col-xl-3 col-lg-4 col-md-6">
					<div class="card">
						<div class="img-holder">
							<img class="card-img-top" src="{{URL::to('/')}}/public/assets/theme/images/img-process.jpg" alt="Process Improvement Workshop">
						</div>
						<div class="card-body">
							<h4 class="card-title">Process Improvement Workshop</h4>
							<a href="" class="readMore collapsed mg-trigger" data-toggle="collapse" data-target="#demo4">Read More</a>
						</div>
					</div>
				</article>
				<article class="col-xl-3 col-lg-4 col-md-6">
					<div class="card">
						<div class="img-holder">
							<img class="card-img-top" src="{{URL::to('/')}}/public/assets/theme/images/img-communication.jpg" alt="Communication Styles">
						</div>
						<div class="card-body">
							<h4 class="card-title">Adjusting Your Communication Styles</h4>
							<a href="" class="readMore collapsed mg-trigger" data-toggle="collapse" data-target="#demo5">Read More</a>
						</div>
					</div>
				</article>
				<article class="col-xl-3 col-lg-4 col-md-6">
					<div class="card">
						<div class="img-holder">
							<img class="card-img-top" src="{{URL::to('/')}}/public/assets/theme/images/img-women-leadership_orig.jpg" alt="Professionalism in the Workplace">
						</div>
						<div class="card-body">
							<h4 class="card-title">Professionalism in the Workplace - ​A Workshop Series For Women</h4>
							<a href="" class="readMore collapsed mg-trigger" data-toggle="collapse" data-target="#demo6">Read More</a>
						</div>
					</div>
				</article>
				<article class="col-xl-3 col-lg-4 col-md-6">
					<div class="card">
						<div class="img-holder">
							<img class="card-img-top" src="{{URL::to('/')}}/public/assets/theme/images/img-change-management.png" alt="Change Management">
						</div>
						<div class="card-body">
							<h4 class="card-title">Change Management</h4>
							<a href="" class="readMore collapsed mg-trigger" data-toggle="collapse" data-target="#demo7">Read More</a>
						</div>
					</div>
				</article>
				<article class="col-xl-3 col-lg-4 col-md-6">
					<div class="card">
						<div class="img-holder">
							<img class="card-img-top" src="{{URL::to('/')}}/public/assets/theme/images/img-people-woman-coffee-meeting.jpg" alt="Leading Effective Meetings">
						</div>
						<div class="card-body">
							<h4 class="card-title">Leading Effective Meetings</h4>
							<a href="" class="readMore collapsed mg-trigger" data-toggle="collapse" data-target="#demo8">Read More</a>
						</div>
					</div>
				</article>
				<article class="col-xl-3 col-lg-4 col-md-6">
					<div class="card">
						<div class="img-holder">
							<img class="card-img-top" src="{{URL::to('/')}}/public/assets/theme/images/img-training-workshop.jpg" alt="Train-The-Trainer Workshop">
						</div>
						<div class="card-body">
							<h4 class="card-title">Train-The-Trainer Workshop</h4>
							<a href="" class="readMore collapsed mg-trigger" data-toggle="collapse" data-target="#demo9">Read More</a>
						</div>
					</div>
				</article>
				<article class="col-xl-3 col-lg-4 col-md-6">
					<div class="card">
						<div class="img-holder">
							<img class="card-img-top" src="{{URL::to('/')}}/public/assets/theme/images/img-interview.jpg" alt="Behavorial Interviewing Programs">
						</div>
						<div class="card-body">
							<h4 class="card-title">Behavorial Interviewing Programs</h4>
							<a href="" class="readMore collapsed mg-trigger" data-toggle="collapse" data-target="#demo10">Read More</a>
						</div>
					</div>
				</article>
				<article class="col-xl-3 col-lg-4 col-md-6">
					<div class="card">
						<div class="img-holder">
							<img class="card-img-top" src="{{URL::to('/')}}/public/assets/theme/images/img-email-works.jpg" alt="Emails That Work">
						</div>
						<div class="card-body">
							<h4 class="card-title">Emails That Work</h4>
							<a href="" class="readMore collapsed mg-trigger" data-toggle="collapse" data-target="#demo11">Read More</a>
						</div>
					</div>
				</article>
				<article class="col-xl-3 col-lg-4 col-md-6">
					<div class="card">
						<div class="img-holder">
							<img class="card-img-top" src="{{URL::to('/')}}/public/assets/theme/images/img-senior-program.jpg" alt="Senior Leader Program">
						</div>
						<div class="card-body">
							<h4 class="card-title">Senior Leader Program <small><i>(Customized Leadship Programs)</i></small></h4>
							<a href="" class="readMore collapsed mg-trigger" data-toggle="collapse" data-target="#demo12">Read More</a>
						</div>
					</div>
				</article>
				<article class="col-xl-3 col-lg-4 col-md-6">
					<div class="card">
						<div class="img-holder">
							<img class="card-img-top" src="{{URL::to('/')}}/public/assets/theme/images/img-frontline-program.jpg" alt="Frontline Leader Program">
						</div>
						<div class="card-body">
							<h4 class="card-title">Frontline Leader Program <small><i>(Customized Leadship Programs)</i></small></h4>
							<a href="" class="readMore collapsed mg-trigger" data-toggle="collapse" data-target="#demo13">Read More</a>
						</div>
					</div>
				</article>
				<article class="col-xl-3 col-lg-4 col-md-6">
					<div class="card">
						<div class="img-holder">
							<img class="card-img-top" src="{{URL::to('/')}}/public/assets/theme/images/img-emerging-program.jpg" alt="Emerging Leader Program">
						</div>
						<div class="card-body">
							<h4 class="card-title">Emerging Leader Program <small><i>(Customized Leadship Programs)</i></small></h4>
							<a href="" class="readMore collapsed mg-trigger" data-toggle="collapse" data-target="#demo14">Read More</a>
						</div>
					</div>
				</article>
				<article class="col-xl-3 col-lg-4 col-md-6">
					<div class="card">
						<div class="img-holder">
							<img class="card-img-top" src="{{URL::to('/')}}/public/assets/theme/images/emotional-intelligence-for-business.jpg" alt="Emotional Intelligence">
						</div>
						<div class="card-body">
							<h4 class="card-title">Emotional Intelligence for Business</h4>
							<a href="" class="readMore collapsed mg-trigger" data-toggle="collapse" data-target="#demo15">Read More</a>
						</div>
					</div>
				</article>
			</div>
			
			<div class="mg-targets">
				<div id="demo1">
					<div class="course-detail">
						<h4>Task-Based Leadership and Delegating Tasks</h4>
						<p>
							As leaders advance in their careers, their success relies less on what they can do on their own, and more on how they coach and develop others.
						</p>
						<p>
							In this interactive course, you will learn practical, usable techniques to provide the right coaching style for each of your employee's tasks.
						</p>
					</div>
				</div>
				<div id="demo2">
					<div class="course-detail">
						<h4>Understanding & Managing Conflict</h4>
						<p>
							It's inevitable. You will have conflict in the workplace. In this course, you will learn to drill down through surface observations, and into the root causes of the conflict.
						</p>
						<p>
							You will learn simple techniques to lead your team through structured problem solving, to turn a tough situation into a breakthrough business opportunity!
						</p>
					</div>
				</div>
				<div id="demo3">
					<div class="course-detail">
						<h4>Change Through Effective Project Management</h4>
						<p>
							Leaders must be able to structure a clear plan to the success, and then be able to communicate that plan to their team.
						</p>
						<p>
							In this interactive and fun course, you will learn to use your entire team to create a project plan from scratch, and to communicate the goals, risks, and requirements that will keep the plan on track: resources, scope, and time.
						</p>
					</div>
				</div>
				<div id="demo4">
					<div class="course-detail">
						<h4>Process Improvement Workshop</h4>
						<p>
							Your team or department will collaboratively identify opportunities for more effective processes, which will generate significant cost-savings.
						</p>
						<p>
							Our facilitators will teach simple, powerful tools that your team can use, later on their own, to generate more powerful ideas...all while adding to the team's sense of esprit de corps.
						</p>
					</div>
				</div>
				<div id="demo5">
					<div class="course-detail">
						<h4>Adjusting Your Communication Styles</h4>
						<p>
							Whether you're in Sales, or interacting with direct reports, or trying to communicate in a meeting, you know that communicating to others is the key to success! You've also noticed that other people communicate slightly differently than you. We will show you, and your team, a simple model to adjust your Style to their Style!
						</p>
					</div>
				</div>
				<div id="demo6">
					<div class="course-detail">
						<h4>Professionalism in the Workplace - ​A Workshop Series For Women</h4>
						<p>
							Despite advances in the workplace, women experience unique challenges, particularly in industries that have been traditionally considered male-oriented, such as manufacturing, engineering, and software development.
						</p>
						<p>
							In these interactive, scenario-based workshops, women from all levels explore and share challenges, and learn to strengthen their professional presentation, manage conflicts, and communicate with men who specialize in technical roles.
						</p>
						<p>
							Women also learn specific techniques to handle verbal or physical harassment.
						</p>
					</div>
				</div>
				<div id="demo7">
					<div class="course-detail">
						<h4>Change Management</h4>
						<p>
							Learn how to effectively unlock the goals of your projects through understanding those affected by your project, and learn specific strategies to help others through the phases of the Change Curve.
						</p>
					</div>
				</div>
				<div id="demo8">
					<div class="course-detail">
						<h4>Leading Effective Meetings</h4>
						<p>
							Sometimes the simplest techniques have the most powerful results. Learn how to lead an effective meeting. There may be no training course that can unleash more benefits to your company's culture and productivity.
						</p>
					</div>
				</div>
				<div id="demo9">
					<div class="course-detail">
						<h4>Train-The-Trainer Workshop</h4>
						<p>
							The Train-The-Trainer Workshop is a 2-part series that provides trainers with philosophies of training, practical tips, and fantastic facilitation techniques so that you discover your "battle rhythm" for any training.
						</p>
					</div>
				</div>
				<div id="demo10">
					<div class="course-detail">
						<h4>Behavorial Interviewing Programs</h4>
						<p>
							Getting the right talent into your organization is the key to your future. Discover and practice the simple, powerful tools that make you into an insightful, thorough interviewer, and significantly iraise your chances for bringing in the best people - both technical and cultural fits.
						</p>
					</div>
				</div>
				<div id="demo11">
					<div class="course-detail">
						<h4>Emails That Work</h4>
						<p>
							We're sure you write and receive hundreds of emails a week, or a day! Learn simple, powerful email writing techniques that get your emails read, and learn the power of effective emails.
						</p>
					</div>
				</div>
				<div id="demo12">
					<div class="course-detail">
						<h4>Senior Leader Program <small><i>(Customized Leadship Programs)</i></small></h4>
						<p>
							Our Senior Leader Program serves Directors and Vice Presidents who want to enhance their ability to lead a department or an organization. These Senior Leaders experience a fast-paced, highly interactive, and self-reflective program that will help them to create a leadership vision, and learn the skills to lead their departments to success.
						</p>
						<p>
							We have trained over 600 Senior Leaders using this program, emphasizing Interpersonal Communications, Leading Others and Delegating, Business Acumen, Team Problem Solving, and more.
						</p>
						<p>
							To have this program customized for your company, call or email!
						</p>
					</div>
				</div>
				<div id="demo13">
					<div class="course-detail">
						<h4>Frontline Leader Program  <small><i>(Customized Leadship Programs)</i></small></h4>
						<p>
							Our Front Line Leader Program trains your Supervisors and Managers on some of the basics of leadership and communication skills. We work with you to develop interactive and relevant scenarios and simulations, to keep everyone's attention. In the process, we've found our participants able to grasp the tools they need to transition from a more tactical to a leadership role.
						</p>
						<p>
							We develop skills such as Interpersonal Communications, Leading Concise & Informative Meetings, Writing Effective Emails, Coaching, Using Effective Interviewing Techniques, and more...
						</p>
						<p>
							To collaborate with us to have this powerful program customized for your leaders, call or email us!
						</p>
					</div>
				</div>
				<div id="demo14">
					<div class="course-detail">
						<h4>Emerging Leader Program <small><i>(Customized Leadship Programs)</i></small></h4>
						<p>
							Perhaps there is no greater benefit than training your company's Manager/Senior Managers. So often, we promote Individual Contributors into these leadership roles, but we neglect to train them on how to lead teams within their functional area. When we express frustration that they are struggling, maybe we need to reflect on how we set them up for success.
						</p>
						<p>
							The Emerging Leader Program is a specialty of the Academy for Leadership and Training, and we have trained over 800 leaders to improve their communications, team leadership, and ability to drive projects through an organization.
						</p>
						<p>
							All of our training is highly interactive, using simulations, relevant scenarios, and engaging, experienced instructors. Our participants learn to use valuable, simple tools that allow them to successfully manage work and influence results across an organization.
						</p>
						<p>
							To sign up for the Emerging Leader Program, call or email us!
						</p>
					</div>
				</div>
				<div id="demo15">
					<div class="course-detail">
						<h4>Emotional Intelligence for Business</h4>
						<p>
							People often say, "I don't know what it is about them. They have a presence."
						</p>
						<p>
							In this course, we will teach you practical skills to understand your own presence, and how to adjust your communication to make the best impact on those around you.
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="clearfix"></div><br>
		<div class="w-100 text-center"><a href="{{URL::to('/')}}/public/assets/theme/docs/TAFLAT-Leadership-Courses.pdf" tabindex="-1" target="_blank" class="BtnBlue">click here for Course Training</a></div>
	</main>
	@include('theme.section.testimonials')
	
	
	<div class="container">
		<div class="row">
		<div class="col-lg-6 col-md-12"> 
			<h5>Frequently Asked Questions About Leadership Training</h5>
			
			
			<p class="mb-1 pt-3">
			  <button class="btn btn-primary" style="white-space: inherit; text-align: left; background: transparent; border: 0; color: black; font-style: italic;" data-toggle="collapse" data-target="#faq1" role="button" aria-expanded="false" aria-controls="faq1">
				<i class="fa fa-arrow-down" aria-hidden="true"></i> What is a leadership development program?
			  </button>	  
			</p>
			
			
			<div class="collapse pb-3" id="faq1"> 
			  <div class="card p-3">
				Great question. According to studies, 85% of "leaders of people" are promoted into their positions with no training or coaching on how to effectively lead a team. We all know that managing others is the hardest part, and most inspirational part, of one's career. So, our clients have found that the investment in the leadership skills of their staff builds their employees' engagement levels, and maximizes the power of teams to problem solve and plan projects together! 
			  </div>
			</div>	
			
			
			<p class="mb-1 pt-3">
			  <button class="btn btn-primary" style="white-space: inherit; text-align: left; background: transparent; border: 0; color: black; font-style: italic;" data-toggle="collapse" data-target="#faq2" role="button" aria-expanded="false" aria-controls="faq2">
				<i class="fa fa-arrow-down" aria-hidden="true"></i> What skills are developed a typical Leadership Program?
			  </button>	  
			</p>
			
			<div class="collapse pb-3" id="faq2"> 
			  <div class="card p-3">
				We customize all of our leadership programs for each client. At the same time, there are several themes that almost all our clients request.<br> 
				1) Leadership Attitude: When a person is promoted from an individual-contributor to a leader-of-others, s/he needs to appreciate that their behavior influences others more than it used to. As such, one element of our leadership programs is Emotional Intelligence, and how to self-manage so that you show up as your best self. <br> 
				2) Strategic Thinking: Leading a team means communicating the strategic impact of everyone's work on the bigger picture. A great leader goes beyond assigning tasks, and explains why the task is relevant to the department's success, and/or the company's success. <br> 
				3) Team Problem Solving: A leader-of-others will own many more problems. At the same time, s/he cannot do all of the work. So, a great leader will use team problem solving techniques to gain everyone's opinions on the root cause of issues, and will use the strength of the team to develop resolutions. <br> 
				4) Feedback: Giving and getting feedback may be the core of great leadership. It sounds easy. We help leaders gain their voice in terms of providing business-feedback, and we hope to inspire leaders to ask for feedback on a regular basis. 
			  </div>
			</div>		
			
			<p class="mb-1 pt-3">
			  <button class="btn btn-primary" style="white-space: inherit; text-align: left; background: transparent; border: 0; color: black; font-style: italic;" data-toggle="collapse" data-target="#faq3" role="button" aria-expanded="false" aria-controls="faq3">
				<i class="fa fa-arrow-down" aria-hidden="true"></i> How can I find the best leadership training program for our company?
			  </button>	  
			</p>
			
			
			<div class="collapse pb-3" id="faq3"> 
			  <div class="card p-3">
				The first step to finding the best program is thinking through your objectives for developing your leaders. Our clients tell us that they originally felt our prices were a bit high, but they found that our programs created the behavior changes in their leaders. In that way, TAFLAT's leadership programs have deep positive impacts. 
			  </div>
			</div>	
			
			
			<p class="mb-1 pt-3">
			  <button class="btn btn-primary" style="white-space: inherit; text-align: left; background: transparent; border: 0; color: black; font-style: italic;" data-toggle="collapse" data-target="#faq4" role="button" aria-expanded="false" aria-controls="faq4">
				<i class="fa fa-arrow-down" aria-hidden="true"></i> Why is TAFLAT's program unique?
			  </button>	  
			</p>
			
			<div class="collapse pb-3" id="faq4"> 
			  <div class="card p-3">
				Our programs have to differentiators: <br>
				1) We customize our curriculum for our clients. Built into our cost are up-front meetings with company leaders to hear from them what they are trying to accomplish...and the business case for why. <br>
				2) Unlike large companies who use sub-contractors, TAFLAT has three senior facilitators, so you always know/meet who you are hiring. Our facilitation is more than fun and interactive, it leads to deep connections with each other and with our senior facilitators.
			  </div>
			</div>

			<p class="mb-1 pt-3">
			  <button class="btn btn-primary" style="white-space: inherit; text-align: left; background: transparent; border: 0; color: black; font-style: italic;" data-toggle="collapse" data-target="#faq5" role="button" aria-expanded="false" aria-controls="faq5">
				<i class="fa fa-arrow-down" aria-hidden="true"></i> What impact does this leadership training have on the participants?
			  </button>	  
			</p>
			
			<div class="collapse pb-3" id="faq5"> 
			  <div class="card p-3">
				Our participants tell us that our leadership workshops are the best they've ever experienced, and that is what makes us most proud. We know that a great workshop includes great content, sure, but also a fantastic learning atmosphere. That atmosphere includes a chance to self-reflect, discuss in small groups, and a masterfully-led large group discussion on leadership topics. 

			  </div>
			</div>	

			<p class="mb-1 pt-3">
			  <button class="btn btn-primary" style="white-space: inherit; text-align: left; background: transparent; border: 0; color: black; font-style: italic;" data-toggle="collapse" data-target="#faq6" role="button" aria-expanded="false" aria-controls="faq6">
				<i class="fa fa-arrow-down" aria-hidden="true"></i> What impact does this leadership training have on the participants?
			  </button>	  
			</p>
			
			<div class="collapse pb-3" id="faq6"> 
			  <div class="card p-3">
				There's an old joke. A CEO and a CFO are debating about whether to purchase a leadership program. The CFO says, "Well, what if we invest all this money, and some of them leave the company anyway?" To which, the CEO replies, "What if we DON'T invest in them, and they all STAY?" Studies show that a great leader is the greatest determinant for employee engagement and retaining your top talent. Companies must constantly develop their talent to reach their business objectives. 

			  </div>
			</div>					
			
			<p class="pt-3">
			</p>		
		</div>
	</div>	
</div>

	
	
	
@endsection
@push('css')

@endpush
@push('js')	

@endpush
@push('metainfo')
	<title>Custom Leadership Training: Tailored Excellence from California to Miami</title>
	<meta name="description" content="Dive into tailored Leadership Training initiatives. Designed to empower, elevate, and transform, our programs unlock the true potential of every team member."/>
@endpush