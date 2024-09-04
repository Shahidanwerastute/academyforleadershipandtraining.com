@extends('catalog.layouts.template')
@section('content')
<div class="container form-container thank-you">
	<div class="row">
		<div class="col-xs-12">
			<div class="_f-page">
				<!--SCORING-->
				<section>
					<div class="_f-page-inner">
						@if($data['submission']->session_id)
							<div>
								<div class="_logo" style="float: left;">


									<a href="#">
										{{HTML::image('public/assets/admin/images/omnicell_logo.png', null, array('class' => 'img-responisve'))}}
									</a>

								</div>
								<div class="_logo" style="float: right;">


									<a href="#">
										{{HTML::image('public/assets/admin/images/'.$data['general_setting']->logo, null, array('class' => 'img-responisve'))}}
									</a>

								</div>
								<div style="clear: both;"></div>
							</div>
						@else
							<div class="_logo">
								<a target="_blank" href="{{$data['general_setting']->logo_url}}">
									{{HTML::image('public/assets/admin/images/'.$data['general_setting']->logo, null, array('class' => 'img-responisve'))}}
								</a>
							</div>
						@endif
						<div class="form-des">
							@if(session()->has('friend_assessment_id'))
								<div class="dear-text">
									Dear {{$data['friend_info']->name}},<br>
									Thank you for completing the assessment. Your survey will be incorporated into the overall report for {{$data['submission']->first_name.' '.$data['submission']->last_name}}.<br>
									If you would like a summary of the results, please contact {{$data['submission']->first_name.' '.$data['submission']->last_name}}' for the results. Thank you again.
								</div>
								<h4><b style="text-decoration: underline;">{{$data['submission']->first_name.' '.$data['submission']->last_name}}' complete report will be emailed directly.</b></h4>
							@elseif($data['submission']->session_id)
								<div class="dear-text">
									Dear {{$data['submission']->first_name.' '.$data['submission']->last_name}},<br>
									Thank you for completing your self-assessment!<br>
									Once your raters have completed their assessment of you, you will receive your final Assessment document. This document will include your self-assessment and the raters' assessment of your Communication Style.
								</div>
							@else
								<div class="dear-text">
									Dear {{$data['submission']->first_name.' '.$data['submission']->last_name}},<br>
									Thank you for completing the assessment form. The following is a description of your Primary and Secondary Styles.
								</div>
								<h4><b style="text-decoration: underline;">Your complete report has been sent to your email on file.</b></h4>
							@endif

								<br><br>

							@if(!$data['submission']->session_id)
								<p>
									Your Communication Style is the predictable way in which you tend to interact with those people around you, and with your environment. While those behaviors are visible, what is unknown is your reason or rationale behind the behaviors. The Communication Styles framework explores how behaviors are exhibited, and does not explore the values and thoughts that generate those behaviors.
								</p>
								<h3 class="sub-heading">
									Primary Communication Style
								</h3>
							@endif
						</div>

						@if(!$data['submission']->session_id)
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
														<li>Through</li>
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
							<div class="form-des">
								<h3 class="sub-heading">
									Your Secondary Style
								</h3>
								<p>While your primary Communication Style best summarizes your approach to interacting with others, your secondary Style also represents a less prominent, but important, way in which you like to communicate.</p>
							</div>
							<div class="_scoring _sub-quad">
								<div class="sec-m-heading">&nbsp;</div>
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
						@endif

						<div class="footer">
							<div class="row">
								<div class="col-sm-3 col-sm-push-9 col-xs-12">
									<a href="" class="f-logo">
										{{HTML::image('public/assets/admin/images/logo.png', null, array('class' => 'img-responisve') )}}
									</a>
								</div>
								<div class="col-sm-9 col-sm-pull-3 col-xs-12">
									<p>© {{$carbon::now()->year.' '.$data['general_setting']->title}} - <a href="">www.TAFLAT.com</a></p>
								</div>
							</div>
						</div>
					</div>
					<!--/._f-page-inner-->
				</section>
			</div>
			<!--/._f-page-->
		</div>
	</div>
</div>
@endsection
@push('css')
@endpush
@push('js')	
@endpush
@push('metainfo')
<title>{{ 'Thank You | '.config('app.name') }}</title>
@endpush