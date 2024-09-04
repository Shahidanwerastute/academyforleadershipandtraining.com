@extends('catalog.layouts.template')
@section('content')
	<div class="form-container">
		<div class="_f-page">
		
			<!-- 1 - WELCOME-->
			<section>
				<div class="_f-page-inner">
					<div class="_logo">
						<a href="" style="width:300px;">
							{{HTML::image('public/assets/admin/images/'.$data['general_setting']->logo, null, array('class' => 'img-responisve'))}}
						</a>
					</div>
					
					<div class="welcome-img">
						<a href="">
							{{HTML::image('public/assets/admin/images/msn-img.png', null, array('class' => 'img-responisve') )}}
						</a>
					</div>
					
					<div class="form-des text-center">
						<h4>Individual Communication Assessment</h4>
						<div class="dear-text">
							Individual Communication Assessment
						</div>
					</div>
					<div class="footer">
						<div class="page-number">1</div>
						<div class="row">
							<div class="col-sm-9 col-sm-pull-3 col-xs-12">
								<p>© {{date('Y')}} The Academy for Leadership and Training - <a href="">www.TAFLAT.com</a></p>
							</div>
						</div>
					</div>
				</div><!--/._f-page-inner-->
			</section>
			
			<!-- 2 -->
			<section>
				<div class="_f-page-inner">
					<div class="sec-m-heading">Understanding Communication Styles</div>
					
					<div class="form-des">
						<p>Your Communication Style is the predictable way in which you tend to interact with those people around you, and with your environment. While those behaviors are visible, what is unknown is your reason or rationale behind the behaviors. The Communication Styles framework explores how behaviors are exhibited, and does not explore the values and thoughts that generate those behaviors. </p>

						<p>It is worth noting that multiple experiences, and even your genetics, contribute to the formation of your Communication Style. For example, maybe your parents have said things like, “My son/daughter has always acted, or talked, that way.” Your Style is formed early. As you learn about Communication Styles, it’s helpful to remember that no Style is better or worse than another. Too often, we seem to value qualities like speaking abilities, without acknowledging the other incredible skill of listening abilities. For that reason, we sometimes have a bias as we learn our results. For example, we might wish our results showed us to be more of a Driver. However, we challenge you to consider the following… envision the person who has been the most memorable leader in your life. </p>

						<p>Was s/he a great listener? </p>
						<p>Did s/he take time to focus on people? </p>

						<p>If your answer is “yes” to these questions, we urge you to ponder the enormous value of the skill of listening. Excellence in listening is a core leadership trait, and one that requires patience and conscientious nurturing. </p>

						<p>In the Communication Styles framework, “Style” refers to how you prefer (tend) to communicate or interact with others. Your Style will be understood based on two dimensions: </p>

						<ul class="list-des list-dec">
							<li>Your tendency to talk, or your tendency to listen</li>
							<li>Your tendency to focus on tasks, or to focus on people</li>
						</ul>

						<p>As you review your Communication Style results, try to remain open to learning about yourself, and perhaps consider how to use self-awareness to become a more effective communicator. The adjustments you make for others’ Styles may be the best development for you as a leader. </p>

						<p>And, of course, enjoy the process of appreciating your Communication Style! </p>
					</div>
					<div class="footer">
						<div class="page-number">2</div>
						<div class="row">
							<div class="col-sm-9 col-sm-pull-3 col-xs-12">
								<p>© {{date('Y')}} The Academy for Leadership and Training - <a href="">www.TAFLAT.com</a></p>
							</div>
						</div>
					</div>
				</div><!--/._f-page-inner-->
			</section>
			
			<!-- 3 -->
			<section>
				<div class="_f-page-inner">
					<div class="sec-m-heading">Communication Style Dimensions</div>
					
					<div class="form-des">
						<p>There are two dimensions to a person’s Communication Style:</p>
						<p>
							<span class="sub-heading">ASSERTIVENESS: </span> The degree to which an individual is perceived as direct and forthcoming in the way s/he communicates and interacts with others. Assertiveness is characterized by a tendency to ASK or a tendency to TELL.
						</p>
						
						<div class="small-single-box ssb-1 _a-bg">
							<div class="h-line"></div>
							<div class="row">
								<div class="col-xs-3">
									<div class="sm-text-box _b-bg">
										Ask
									</div>
								</div>
								<div class="col-xs-3">
									<ul>
										<li>Quiet</li>
										<li>Mild Opinions</li>
										</br>
										<li>Low Risk</li>
										<li>Thoughtful Decisions</li>
										<li>Supportive</li>
										<li>Patient</li>
										<li>Listens</li>
										<li>Slow Paced</li>
									</ul>
								</div>
								<div class="col-xs-3">
									<ul>
										<li>Outspoken</li>
										<li>Strong Opinions</li>
										</br>
										<li>High Risk</li>
										<li>Quick Decisions</li>
										<li>Direct</li>
										<li>Eager</li>
										<li>Talks</li>
										<li>Fast Paced</li>
									</ul>
								</div>
								<div class="col-xs-3">
									<div class="sm-text-box _b-bg">
										Tell
									</div>
								</div>
							</div>
						</div>
						
						<p>
							<span class="sub-heading">FOCUS: </span> The degree to which an individual is perceived as interacting with others in terms of TASKS or PEOPLE.
						</p>
						
						<div class="small-single-box ssb-2 _b-bg">
							<div class="v-line"></div>
							<div class="row">
								<div class="col-xs-3">
									<div class="sm-text-box _a-bg">
										Task
									</div>
								</div>
								<div class="col-xs-3">
									<ul class="text-right">
										<li>Guarded, Controlled</li>
										<li>Task Oriented</li>
										<li>Factual</li>
										<li>Formal and Proper</li>
										<li>Cautious with Feelings</li>
									</ul>
								</div>
								<div class="col-xs-6"></div>
							</div>
							<div class="row">
								<div class="col-xs-6"></div>
								<div class="col-xs-3">
									<ul class="text-left">
										<li>Personable</li>
										<li>Warm and Casual</li>
										<li>Open, Dramatic</li>
										<li>People Oriented</li>
										<li>Shares Feelings</li>
									</ul>
								</div>
								<div class="col-xs-3">
									<div class="sm-text-box _a-bg">
										People
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="footer">
						<div class="page-number">3</div>
						<div class="row">
							<div class="col-sm-9 col-sm-pull-3 col-xs-12">
								<p>© {{date('Y')}} The Academy for Leadership and Training - <a href="">www.TAFLAT.com</a></p>
							</div>
						</div>
					</div>
				</div><!--/._f-page-inner-->
			</section>
			
			<!--4-->
			<section>
				<div class="_f-page-inner">
					<div class="_scoring sco-1">
						<div class="sec-m-heading">&nbsp;</div>
						<div class="counting v-counting">
							<ul>
								<li>9</li>
								<li>8</li>
								<li>7</li>
								<li>6</li>
								<li>5</li>
								<li>4</li>
								<li>3</li>
								<li>2</li>
								<li>1</li>
								<li>0</li>
								<li>1</li>
								<li>2</li>
								<li>3</li>
								<li>4</li>
								<li>5</li>
								<li>6</li>
								<li>7</li>
								<li>8</li>
								<li>9</li>
							</ul>
						</div>
						<div class="counting h-counting">
							<ul>
								<li>9</li>
								<li>8</li>
								<li>7</li>
								<li>6</li>
								<li>5</li>
								<li>4</li>
								<li>3</li>
								<li>2</li>
								<li>1</li>
								<li>0</li>
								<li>1</li>
								<li>2</li>
								<li>3</li>
								<li>4</li>
								<li>5</li>
								<li>6</li>
								<li>7</li>
								<li>8</li>
								<li>9</li>
							</ul>
						</div>
						<div class="_outer-sec">
							<div class="_sl sl-left">
								<div class="_sideLetters">
									<span>Ask</span> Slow Pace
								</div>
							</div>
							<div class="_sl sl-right">
								<div class="_sideLetters">
									<span>Tell</span> Fast Pace
								</div>
							</div>
							<div class="_sideLetters">
								<span>Task Directed</span>
							</div>
							<div class="_inner-sec">
								<div class="row">
									<div class="col-xs-6">
										<div class="box _b-bg">
											@if($data['record']->behavior == "Analytical")
											<div class="box-active">
												<div class="img-title">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
												<figure>
													{{HTML::image('public/assets/catalog/images/check.png')}}
												</figure>
											</div>
											@endif
											<h2>Analytical</h2>
											<ul>
												<li>Objective</li>
												<li>Precise</li>
												<li>Thorough</li>
												<li>Detailed</li>
												<li>Rational</li>
												<li>Controlled</li>
											</ul>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="box _a-bg">
											@if($data['record']->behavior == "Driver")
											<div class="box-active">
												<div class="img-title">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
												<figure>
													{{HTML::image('public/assets/catalog/images/check.png')}}
												</figure>
											</div>
											@endif
											<h2>Driver</h2>
											<ul>
												<li>Decision</li>
												<li>Tough</li>
												<li>Candid</li>
												<li>Efficient</li>
												<li>Result Oriented</li>
												<li>Pragmatic</li>
											</ul>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="box _r-bg">
											@if($data['record']->behavior == "Amiable")
											<div class="box-active">
												<div class="img-title">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
												<figure>
													{{HTML::image('public/assets/catalog/images/check.png')}}
												</figure>
											</div>
											@endif
											<h2>Amiable</h2>
											<ul>
												<li>Supportive</li>
												<li>Empathetic</li>
												<li>Loyal</li>
												<li>Group Oriented</li>
												<li>Focused</li>
												<li>Sharing</li>
											</ul>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="box _l-bg">
											@if($data['record']->behavior == "Expressive")
											<div class="box-active">
												<div class="img-title">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
												<figure>
													{{HTML::image('public/assets/catalog/images/check.png')}}
												</figure>
											</div>
											@endif
											<h2>Expressive</h2>
											<ul>
												<li>Creative</li>
												<li>Enthusiastic</li>
												<li>Spontaneous</li>
												<li>Energetic</li>
												<li>Vision Focused</li>
												<li>Sense of Humor</li>
											</ul>
										</div>
									</div>
								</div>
								<!--/.row-->
							</div>
							<!--/._inner-sec-->
							<div class="_sideLetters">
								<span>People Directed</span>
							</div>
						</div>
						<!--/._outer-sec-->	
					</div>
					
					<!--<ul class="_scoring-info">
						<li class="_b-bg">B</li>
						<li class="_a-bg">A</li>
						<li class="_l-bg">L</li>
						<li class="_r-bg">R</li>
					</ul>-->
					<div class="footer">
						<div class="page-number">4</div>
						<div class="row">
							<div class="col-sm-9 col-sm-pull-3 col-xs-12">
								<p>© {{date('Y')}} The Academy for Leadership and Training - <a href="">www.TAFLAT.com</a></p>
							</div>
						</div>
					</div>
				</div><!--/._f-page-inner-->
			</section>
			
			<!-- 5 -->
			@if(trim($data['sub_quadrant']->p_content) != "")
				<section>
					<div class="_f-page-inner">
						{!! $data['sub_quadrant']->p_content !!}
						<div class="footer">
							<div class="page-number">5</div>
							<div class="row">
								<div class="col-sm-9 col-sm-pull-3 col-xs-12">
									<p>© {{date('Y')}} The Academy for Leadership and Training - <a href="">www.TAFLAT.com</a></p>
								</div>
							</div>
						</div>
					</div><!--/._f-page-inner-->
				</section>
			@endif
			
			<!--6-->
			<section>
				<div class="_f-page-inner">
					<div class="_scoring _sub-quad">
						<div class="sec-m-heading">Your Self-Assessment and Peer Assessment</div>
						<div class="_outer-sec">
							<div class="_sl sl-left">
								<div class="_sideLetters">
									<span>Ask</span>
								</div>
							</div>
							<div class="_sl sl-right">
								<div class="_sideLetters">
									<span>Tell</span>
								</div>
							</div>
							<div class="_sideLetters">
								<span>Task Directed</span>
							</div>
							<div class="_inner-sec">
								<div class="row">
									<div class="col-xs-6">
										<div class="_subtitle">Analytical</div>
										<div class="row">
											<div class="col-xs-6">
												<div class="box _b-bg">
													@if($data['record']->behavior == "Analytical" && $data['sub_quadrant']->behavior == "AN")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">AN</div>
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<div class="box _b-bg">
													@if($data['record']->behavior == "Analytical" && $data['sub_quadrant']->behavior == "DR")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">DR</div>
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<div class="box _b-bg">
													@if($data['record']->behavior == "Analytical" && $data['sub_quadrant']->behavior == "AM")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">AM</div>
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<div class="box _b-bg">
													@if($data['record']->behavior == "Analytical" && $data['sub_quadrant']->behavior == "EX")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">EX</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="_subtitle">Driver</div>
										<div class="row">
											<div class="col-xs-6">
												<div class="box _a-bg">
													@if($data['record']->behavior == "Driver" && $data['sub_quadrant']->behavior == "AN")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">AN</div>
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<div class="box _a-bg">
													@if($data['record']->behavior == "Driver" && $data['sub_quadrant']->behavior == "DR")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">DR</div>
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<div class="box _a-bg">
													@if($data['record']->behavior == "Driver" && $data['sub_quadrant']->behavior == "AM")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">AM</div>
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<div class="box _a-bg">
													@if($data['record']->behavior == "Driver" && $data['sub_quadrant']->behavior == "EX")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">EX</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="_subtitle">Amiable</div>
										<div class="row">
											<div class="col-xs-6">
												<div class="box _r-bg">
													@if($data['record']->behavior == "Amiable" && $data['sub_quadrant']->behavior == "AN")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">AN</div>
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<div class="box _r-bg">
													@if($data['record']->behavior == "Amiable" && $data['sub_quadrant']->behavior == "DR")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">DR</div>
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<div class="box _r-bg">
													@if($data['record']->behavior == "Amiable" && $data['sub_quadrant']->behavior == "AM")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">AM</div>
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<div class="box _r-bg">
													@if($data['record']->behavior == "Amiable" && $data['sub_quadrant']->behavior == "EX")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">EX</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="_subtitle">Expressive</div>
										<div class="row">
											<div class="col-xs-6">
												<div class="box _l-bg">
													@if($data['record']->behavior == "Expressive" && $data['sub_quadrant']->behavior == "AN")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">AN</div>
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<div class="box _l-bg">
													@if($data['record']->behavior == "Expressive" && $data['sub_quadrant']->behavior == "DR")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">DR</div>
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<div class="box _l-bg">
													@if($data['record']->behavior == "Expressive" && $data['sub_quadrant']->behavior == "AM")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">AM</div>
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<div class="box _l-bg">
													@if($data['record']->behavior == "Expressive" && $data['sub_quadrant']->behavior == "EX")
														<div class="box-active-1">
															<div class="img-title-1">{{$data['submission']->first_name.' '.$data['submission']->last_name}}</div>
															<figure>
																{{HTML::image('public/assets/catalog/images/check.png')}}
															</figure>
														</div>
													@endif
													<div class="box-active">
														<div class="img-title">EX</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--/.row-->
							</div>
							<!--/._inner-sec-->
							<div class="_sideLetters">
								<span>People Directed</span>
							</div>
						</div>
						<!--/._outer-sec-->
					</div>
					<div class="footer">
						<div class="page-number">6</div>
						<div class="row">
							<div class="col-sm-9 col-sm-pull-3 col-xs-12">
								<p>© {{date('Y')}} The Academy for Leadership and Training - <a href="">www.TAFLAT.com</a></p>
							</div>
						</div>
					</div>
				</div><!--/._f-page-inner-->
			</section>
			
			<!-- 7 -->
			@if(trim($data['sub_quadrant']->s_content) != "")
				<section>
					<div class="_f-page-inner">
						{!! $data['sub_quadrant']->s_content !!}
						<div class="footer">
							<div class="page-number">7</div>
							<div class="row">
								<div class="col-sm-9 col-sm-pull-3 col-xs-12">
									<p>© {{date('Y')}} The Academy for Leadership and Training - <a href="">www.TAFLAT.com</a></p>
								</div>
							</div>
						</div>
					</div><!--/._f-page-inner-->
				</section>
			@endif
			
			<!-- 8 -->
			<section>
				<div class="_f-page-inner">
					<div class="sec-m-heading">Description of All Styles</div>
					
					<div class="form-des">
						<ul class="list-des list-disc">
							<h4>ANALYTICALS</h4>
							<li>Like to work with existing circumstances to accomplish high quality products and services</li>
							<li>Are usually self-contained and somewhat direct, slow, steady, and methodical</li>
							<li>Their priority is the TASK at hand, and they focus on the detail and process</li>
							<li>Are irritated by surprises and unpredictability</li>
							<li>Like to provide facts and the documentation that support those facts</li>
							<li>Like process and systems and depend on their accuracy</li>
						</ul>

						<ul class="list-des list-disc">
							<h4>DRIVERS</h4>
							<li>Like to shape the environment by overcoming opposition to accomplish results</li>
							<li>Are direct and self-contained</li>
							<li>Their priority is the TASK at hand, and they focus on achieving results</li>
							<li>Wasting time and “touchy-feely” behavior that blocks action and results irritates them</li>
							<li>Prefer to be in control at all times</li>
							<li>Depend on their leadership skills and strive to be a “winner”</li>
						</ul>

						<ul class="list-des list-disc">
							<h4>AMIABLES</h4>
							<li>Like to cooperate with others and to carry out the team’s goals</li>
							<li>Tend to be slower paced, easy-going, and relaxed</li>
							<li>Their priority is PEOPLE and relationships</li>
							<li>Focus on building trust and getting acquainted with others</li>
							<li>Are irritated by pushy and aggressive behavior</li>
							<li>Enjoy supportive behavior, and rely on close and secure relationships </li>
							<li>Acceptance is based on conformity, loyalty, and helpfulness</li>
						</ul>

						<ul class="list-des list-disc">
							<h4>EXPRESSIVES</h4>
							<li>Like to shape the environment by forming alliances with others in order to accomplish results</li>
							<li>Are open, stimulating, talkative, and quick paced</li>
							<li>Focus on PEOPLE and the interaction and dynamics of the relationship</li>
							<li>Are irritated by routine tasks and being alone</li>
							<li>Enjoy socializing and rely on flexibility</li>
							<li>Acceptance depends on being heard along with generating and selling ideas</li>
						</ul>
					</div>
					<div class="footer">
						<div class="page-number">8</div>
						<div class="row">
							<div class="col-sm-9 col-sm-pull-3 col-xs-12">
								<p>© {{date('Y')}} The Academy for Leadership and Training - <a href="">www.TAFLAT.com</a></p>
							</div>
						</div>
					</div>
				</div><!--/._f-page-inner-->
			</section>
			
			<!-- 9 -->
			<section>
				<div class="_f-page-inner">
					<div class="_scoring sco-2">
						<div class="sec-m-heading">Natural Communication Style</div>
						
						<div class="_outer-sec">
							<div class="_sl sl-left">
								<div class="_sideLetters">
									<span>Ask</span> Slow Pace
								</div>	
							</div>
							
							<div class="_sl sl-right">
								<div class="_sideLetters">
									<span>Tell</span> Fast Pace
								</div>
							</div>
							
							<div class="_sideLetters">
								<span>Task Directed</span>
							</div>
							
							<div class="_inner-sec">
								<div class="row">
									<div class="col-xs-6">
										<div class="box _b-bg">
											<h2>Analytical</h2>
											<ul>
												<li>Somewhat expressionless</li>
												<li>Controlled & limited body movement</li>
												<li>Pushes for facts & details</li>
												<li>Little sharing of personal feelings</li>
												<li>Few gestures to support conversation</li>
												<li>Low voice volume</li>
												<li>Slow voice speed</li>
												<li>Little variation in vocal intonation</li>
												<li>Communicates hesitantly</li>
												<li>Soft handshake</li>
												<li>Intermittent eye contact</li>
												<li>Litte verbal communication</li>
											</ul>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="box _a-bg">
											<h2>Driver</h2>
											<ul>
												<li>Conversation focuses on issues & task at hand</li>
												<li>Little sharing of personal feelings</li>
												<li>Makes empathetic statements</li>
												<li>Some gestures to support conversation</li>
												<li>High voice volume</li>
												<li>Fast voice speed</li>
												<li>Firm handshake</li>
												<li>Steady eye contact</li>
												<li>Questions tend to challenge information</li>
												<li>Fast moving</li>
											</ul>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="box _r-bg">
											<h2>Amiable</h2>
											<ul>
												<li>Mild facial expressions</li>
												<li>Limited hand & body movement</li>
												<li>Flexible time perspective</li>
												<li>Tells stories and anecdotes</li>
												<li>Little emphasis on facts and details</li>
												<li>Shares personal feelings</li>
												<li>Seeks contact</li>
												<li>Average nonverbal feedback</li>
												<li>Makes tentative statements</li>
												<li>Soft handshake</li>
												<li>Low voice volume</li>
												<li>Slow voice speed</li>
											</ul>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="box _l-bg">
											<h2>Expressive</h2>
											<ul>
												<li>Animated facial expressions</li>
												<li>Much head and body movement</li>
												<li>Tells stories and anecdotes</li>
												<li>Some emphasis on facts and details</li>
												<li>Shares personal feelings</li>
												<li>Seeks contact</li>
												<li>Gestures to emphasize points</li>
												<li>High voice volume</li>
												<li>Changes voice intonation</li>
												<li>Communicates readily</li>
												<li>Fast moving</li>
											</ul>
										</div>
									</div>
								</div><!--/.row-->
							</div><!--/._inner-sec-->
							
							<div class="_sideLetters">
								<span>People Directed</span>
							</div>
						</div><!--/._outer-sec-->
						
					</div><!--/.sco-2-->
					<div class="footer">
						<div class="page-number">9</div>
						<div class="row">
							<div class="col-sm-9 col-sm-pull-3 col-xs-12">
								<p>© {{date('Y')}} The Academy for Leadership and Training - <a href="">www.TAFLAT.com</a></p>
							</div>
						</div>
					</div>
				</div><!--/._f-page-inner-->
			</section>
			
			<!-- 10 -->
			<section>
				<div class="_f-page-inner">
					<div class="_scoring sco-3">
						<div class="sec-m-heading">Communication Under Stress</div>
						
						<div class="_outer-sec">
							<div class="_inner-sec">
								<div class="row">
									<div class="col-xs-6">
										<div class="box _b-bg">
											<h2>Analytical</h2>
											<h5>WILL WITHDRAWAL OR AVOID</h5> 
											<ul>
												<div class="ul-heading">May Appear:</div>
												<li>Over-reliant</li>
												<li>Resistant to change</li>
												<li>Slow to act</li>
												<li>Slow to begin work</li>
												<li>Unable to meet deadlines</li>
												<li>Lacking in imagination</li>
												<li>Withdrawn</li>
												
												<div class="ul-heading">Need:</div>
												<li>Guarantees that they’re right</li>
												<li>Understanding of principle & details</li>
												<li>Slow pace for processing information</li>
												<li>Removal of threat to accuracy</li>
											</ul>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="box _a-bg">
											<h2>Driver</h2>
											<h5>WILL PRESSURE OR DICTATE</h5>
											<ul>
												<div class="ul-heading">May Appear:</div>
												<li>Restless</li>
												<li>Critical</li>
												<li>Blunt</li>
												<li>Intrusive</li>
												<li>Uncooperative</li>
												<li>Irritable</li>
												<li>Aggressive and pushy</li>
												
												<div class="ul-heading">Need:</div>
												<li>Control of the situation and self</li>
												<li>Tangible evidence of progress</li>
												<li>Fast pace for moving toward goals</li>
												<li>Removal of threats to accomplishment</li>
											</ul>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="box _r-bg">
											<h2>Amiable</h2>
											<h5>WILL ACCEPT OR SUBMIT</h5>
											<ul>
												<div class="ul-heading">May Appear:</div>
												<li>Wishy-washy</li>
												<li>Submissive</li>
												<li>Passive</li>
												<li>Dependent</li>
												<li>Hesitant</li>
												<li>Defensive</li>
												<li>Indecisive</li>
												
												<div class="ul-heading">Need:</div>
												<li>Reassurance that they are liked</li>
												<li>Personal Assurances</li>
												<li>Slow pace for comfort and security</li>
												<li>Removal of any threats to relationship</li>
											</ul>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="box _l-bg">
											<h2>Expressive</h2>
											<h5>WILL CHALLENGE OR ATTACK</h5>
											<ul>
												<div class="ul-heading">May Appear:</div>
												<li>Manipulative</li>
												<li>Over-eager</li>
												<li>Impulsive</li>
												<li>Inconsistent</li>
												<li>Superficial</li>
												<li>Unrealistic</li>
												<li>Wasteful of time</li>
												
												<div class="ul-heading">Need:</div>
												<li>To get credit</li>
												<li>Action and interaction</li>
												<li>Quick pace for stimulation</li>
												<li>Removal of any threat to image</li>
											</ul>
										</div>
									</div>
								</div><!--/.row-->
							</div><!--/._inner-sec-->
						</div><!--/._outer-sec-->
						
					</div><!--/.sco-2-->
					<div class="footer">
						<div class="page-number">10</div>
						<div class="row">
							<div class="col-sm-9 col-sm-pull-3 col-xs-12">
								<p>© {{date('Y')}} The Academy for Leadership and Training - <a href="">www.TAFLAT.com</a></p>
							</div>
						</div>
					</div>
				</div><!--/._f-page-inner-->
			</section>
			<!-- 11 -->
			<section>
				<div class="_f-page-inner">
					<div class="sec-m-heading">Communication Styles</div>
					
					<div class="form-des">
						<p>We sincerely hope your Communication Style Assessment offers insight into your preferences for communicating. Further, we hope you understand how your Style is similar, or different, to other Styles.</p>

						<p>Recognizing these differences, and adjusting for others to “give them what they need,” in terms of information and style, is a key to strengthening what some refer to as your Emotional Intelligence.</p>

						<p>We encourage you to start with small behavioral adjustments, using the Coach’s Corner as a beginning, and notice the tremendous improvements that occur in your interactions.</p>
						<p>Please contact us for more information, coaching tips, or with any questions.</p>

						<p>Sincerely,</p>

						<p>Jim Glantz, CEO</p>

						<p>{{$data['general_setting']->title}}</p>

					</div>
					<div class="footer">
						<div class="page-number">11</div>
						<div class="row">
							<div class="col-sm-9 col-sm-pull-3 col-xs-12">
								<p>© {{$carbon::now()->year.' '.$data['general_setting']->title}} - <a href="">www.TAFLAT.com</a></p>
							</div>
						</div>
					</div>
				</div><!--/._f-page-inner-->
			</section>
		</div><!--/._f-page-->
	</div>
@endsection
@push('css')

@endpush
@push('js')	

@endpush
@push('metainfo')
<title>{{ 'Thank You | '.config('app.name') }}</title>
@endpush