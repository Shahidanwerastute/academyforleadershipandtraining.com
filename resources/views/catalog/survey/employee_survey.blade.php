@extends('catalog.layouts.template')
@section('content')
	<style>
		.upload_file_form {
			align-items: center;
			display: flex;
			justify-content: center;
			text-align: center;
		}
		.upload_file_form2 {
			align-items: center;
			justify-content: center;
			text-align: center;
		}
		.custom_uploadfile_class {
			margin-top: 10px;
			text-align: center;
			padding: 10px !important;
			height: auto;
			border-radius: 10px;
			background: #f8f8f8;
		}
		.mylabel label{
			color: #ffffff !important;
		}
		.mylabel label a{
			color: #c9e2f7 !important;
		}
	</style>



	<div class="section start-point focus" style="margin-bottom: 0">
				@if(File::exists('public/assets/admin/images/'.$data['general_setting']->logo))
					

					<!--<div class="_logo">
						<a target="_blank" href="{{$data['general_setting']->logo_url}}">
							{{HTML::image('public/assets/admin/images/'.$data['general_setting']->logo, null, array('class' => 'img-responisve'))}}
						</a>
					</div>
				-->

				<div class="row">
                    <div class="col-md-1 "></div>
                    <div class="col-md-3 "> <a href="" >
                            <img style="width:300px;" src="https://www.academyforleadershipandtraining.com/dev/public/assets/admin/images/omnicell_logo.png" class="img-responisve">
                        </a></div>
                         <div class="col-md-2"></div>
                          <div class="col-md-2"></div>
                    <div class="col-md-3 "> <a href="" >
                            <img style="width:220px;" src="https://www.academyforleadershipandtraining.com/dev/public/assets/admin/images/logo.png" class="img-responisve">
                        </a></div>
                </div>







				@endif
			</div>

	@if ($data['survey_already_submitted'])
		<div class="questionnaireEd" >
			
			<div class="container welcome-box" style="margin-top: 10px;">
				<header class="header">
					<h4>This survey already has been submitted.</h4>
				</header>
			</div>
		</div>
	@else
		{!! Form::open(array('url' => url()->current(), 'files'=>true, 'class' => 'quesEdFormFull ajax_form')) !!}
			<div id="fullpage" class="questionnaireEd">
				<div class="section start-point focus">
				<!--	@if(File::exists('public/assets/admin/images/'.$data['general_setting']->logo))
						<div class="_logo">
							<a target="_blank" href="{{$data['general_setting']->logo_url}}">
								{{HTML::image('public/assets/admin/images/'.$data['general_setting']->logo, null, array('class' => 'img-responisve'))}}
							</a>
						</div>
					

					<div class="row">
                    <div class="col-md-1 "></div>
                    <div class="col-md-3 "> <a href="" >
                            <img style="width:300px;" src="https://www.academyforleadershipandtraining.com/dev/public/assets/admin/images/omnicell_logo.jpg" class="img-responisve">
                        </a></div>
                         <div class="col-md-2"></div>
                          <div class="col-md-2"></div>
                    <div class="col-md-3 "> <a href="" >
                            <img style="width:220px;" src="https://www.academyforleadershipandtraining.com/dev/public/assets/admin/images/logo.png" class="img-responisve">
                        </a></div>
                </div>
					@endif -->
					@if($data['company']->limit == Null || $data['survey']->count < $data['company']->limit)
						<div class="container welcome-box">
							<header class="header">
								<h1>Welcome  {{$data['employee']->first_name.' '.$data['employee']->last_name}} to the Communication Styles Assessment</h1>
								<h4>Here is a tip to consider while you take this assessment:</h4>

								<div class="row">
									<ul>
										@if(!Route::is('catalog-survey-friend-assessment-form') && !Route::is('catalog-survey-employee-assessment-form'))
											<li>Think of yourself at work</li>
											<li>Think about how others would describe you</li>
										@elseif(Route::is('catalog-survey-employee-assessment-form'))
											<li>Please answer the questions considering yourself at work.</li>
										@else
											<li>Please answer the questions, as you think {{$data['employee']->first_name.' '.$data['employee']->last_name}} would answer them, or from what you know about {{$data['employee']->first_name.' '.$data['employee']->last_name}}</li>
										@endif
									</ul>
								</div>

								<div class="row">
									<div class="row language rbox">
										<div class="col-md-12 btn-continue">
											<a href="#" class="arrowDown btn continue">Continue <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
							</header>
						</div>
					@else
						<div class="container welcome-box">
							<header class="header">
								<h1><i class="fa fa-exclamation-circle fa-lg fa-fw"></i> Note</h1>
								<h4>You can't submit this survey. Maximum limit of submissions of this survey exceeded.</h4>
							</header>
						</div>
					@endif
				</div>
				@if(!Route::is('catalog-survey-friend-assessment-form') && !Route::is('catalog-survey-employee-assessment-form'))
					<div class="section start-point required">
						<div class="container welcome-box">
							<div class="col-xs-6">
								<header class="header">
									<h1>Single Rater (Self-Assessment):</h1>
									<div class="row">
										<ul>
											<li>Your self-assessment is free with the coupon code TAFLAT!</li>
										</ul>
									</div>
								</header>
								<div class="container">
									<div class="row language rbox">
										<div class="col-md-12 btn-continue">
											<a href="#" class="arrowDown btn continue">Continue <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-6">
								<header class="header">
									<h1>Multiple Raters (Invite Friends/Colleagues To Rate You):</h1>
									<div class="row">
										<ul>
											<li>For Multiple Raters, you will first complete your own Self-Assessment.</li>
											<li>To invite friends or colleagues to assess your Communication Style, please pay ${{$data['general_setting']->friend_assessment_price}} / friend via Paypal or credit card. Your additional raters will receive their invitation, asking them to complete the assessment on your Communication Style.</li>
											<li>CLICK "ADD EMAILS" to add your friend or colleague's emails.</li>
										</ul>
									</div>
								</header>
								<div class="container">
									<div class="row language rbox">
										<div class="col-md-12 btn-continue">
											<!--									<a href="#" class="btn continue" data-toggle="modal" data-target="#invitation_modal">Add Emails</a>&nbsp;&nbsp;-->
											<a href="#" class="btn continue" data-toggle="modal" data-target="#upload_excel_modal">Upload an Excel</a>&nbsp;&nbsp;
											<a href="#" class="arrowDown btn continue">Continue <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				@endif
				@if(Route::is('catalog-rootpath'))
					<div class="section start-point required">
						<div class="container welcome-box">
							<div class="row">
								<div class="col-xs-12">
									<header class="header">
										<h1>Price</h1>
									</header>
								</div>
								<div class="col-xs-6">
									<header class="header">
										<h4>
											<div class="payment_info">
												<span>Self Assessment Price: ${{$data['general_setting']->survey_price}}</span>
											</div>
										</h4>
										<h5>Your self-assessment is <strong>FREE</strong> with the coupon code <strong>TAFLAT!</strong></h5>
										{{--<h5>Please hit <strong>APPLY</strong>, to use a coupon!</h5>--}}
										<div class="row">
											<div class="col-md-6 col-sm-8">
												<div class="input-group">
													{{ Form::text('coupon', 'TAFLAT', array('placeholder' => 'Coupon Code', 'class' => 'form-control')) }}
													{{ Form::hidden('coupon_status', 0) }}
													<span class="input-group-btn">
														<button class="btn btn-default coupon" type="button">Apply</button>
													</span>
												</div><!-- /input-group -->
												<span class="_error"></span>
												<span class="_success"></span>
											</div>
										</div>
									</header>
									<div class="row language rbox">
										<div class="col-md-12 btn-continue">
											<a href="#" class="coupon btn continue">Continue <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
											<span>Press ENTER</span>
										</div>
									</div>
								</div>
								<div class="col-xs-6">
									<header class="header">
										<h4>
											<div class="friend-assessment-info hide">
												<span>Assessment by Friends Price:<i></i></span>
												{{ Form::hidden('friend_assessment_price', $data['general_setting']->friend_assessment_price) }}
											</div>
										</h4>
									</header>
								</div>
							</div>
						</div>
					</div>
				@endif
				<div class="section employeeForm start-point required">
					<!--HEADER-->
					<header class="header over-scroll">
						<div class="container">
							<h1>Personal Details</h1>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<h2>First Name*</h2>
										{{ Form::text('first_name', (Route::is('catalog-survey-form') || Route::is('catalog-survey-friend-assessment-form') || Route::is('catalog-survey-employee-assessment-form') ? $data['employee']->first_name : ''), array('placeholder' => 'First Name', 'autocomplete' => 'off' ,'class' => 'form-control require allowTab', (Route::is('catalog-survey-form') || Route::is('catalog-survey-friend-assessment-form') ? 'readonly' : ''))) }}
										<span class="error first_name"></span>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<h2>Last Name*</h2>
										{{ Form::text('last_name', (Route::is('catalog-survey-form') || Route::is('catalog-survey-friend-assessment-form') || Route::is('catalog-survey-employee-assessment-form') ? $data['employee']->last_name : ''), array('placeholder' => 'Last Name', 'autocomplete' => 'off' , 'class' => 'form-control require allowTab', (Route::is('catalog-survey-form') || Route::is('catalog-survey-friend-assessment-form') ? 'readonly' : ''))) }}
										<span class="error last_name"></span>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="col-sm-6">
									<div class="form-group">
										<h2>Email*</h2>
										{{ Form::text('email', (Route::is('catalog-survey-form') || Route::is('catalog-survey-friend-assessment-form') || Route::is('catalog-survey-employee-assessment-form') ? $data['employee']->email : ''), array('placeholder' => 'Email', 'autocomplete' => 'off', 'class' => 'form-control require allowTab', (Route::is('catalog-survey-form') || Route::is('catalog-survey-friend-assessment-form') ? 'readonly' : ''))) }}
										<span class="error email"></span>
									</div>
								</div>
								{{--<div class="col-sm-6">
									<div class="form-group">
										<h2>Mobile #(Optional)</h2>
										{{ Form::text('mobile', (Route::is('catalog-survey-form') || Route::is('catalog-survey-friend-assessment-form') ? $data['employee']->mobile : ''), array('placeholder' => 'Mobile #', 'autocomplete' => 'off', 'class' => 'form-control mobileTabSpecial', (Route::is('catalog-survey-form') || Route::is('catalog-survey-friend-assessment-form') ? 'readonly' : ''))) }}
										<span class="error mobile"></span>
									</div>
								</div>--}}
								<div style="display:none;" class="emptydiv col-sm-6">
									<div class="form-group">
										<h2>&nbsp;</h2>
										&nbsp;
									</div>
								</div>
								<div style="display:none;" class="emptydiv col-sm-6">
									<div class="form-group">
										<h2>&nbsp;</h2>
										&nbsp;
									</div>
								</div>
							</div>
						</div>
					</header>
					<div class="container">
						<div class="row language rbox">
							<div class="col-md-12 btn-continue">
								<a href="#" class="arrowDown btn continue">Continue <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
								<span>Press ENTER</span>
							</div>
						</div>
					</div>
				</div>
				@foreach($data['survey']->questions() as $ki => $row)
					@php $part = explode('|', $row->label); @endphp
					@if($row->type == 'radio')
						<div class="section radioBoxes start-point inactive {{($row->require == 1 ? 'required' : '').' '.($row->is_extra == 1 ? $row->extra_class : '')}}">
							<header class="header over-scroll">
								<div class="container">
									<h4>Note: - Think of yourself at work - Think about how others would describe you.</h4>
									<div class="row gender">
										<div class="col-md-12">
											@foreach($row->options() as $key => $option)
												<div class="media rbox _{{strtolower($option->value)}}-color">
													<div class="media-left">
														{{ Form::radio('field'.$row->id, $option->value, null, ['class' => 'custombox', 'id' => 'cb-'.$option->id]) }}
														<label class="checker" for="cb-{{$option->id}}">
															<b>{{($key == 0 ? "A" : "B")}}</b>
															{{ Form::hidden(null, title_case($option->value), array("class" => "reader hide")) }}
															<i class="fa fa-check"></i>
														</label>
													</div>
													<div class="media-body media-middle">
														<h2 class="title">{{$part[$key]}}</h2>
													</div>
												</div>
											@endforeach
											<span class="error {{'field'.$row->id}}"></span>
										</div>
										<div class="col-md-12 btn-continue">
											<h4>Press A or B</h4>
										</div>
									</div>
								</div>
							</header>
						</div>
					@endif
				@endforeach
				<div class="section start-point inactive">
					<header class="header">
						<div class="container">
							<h1>Thank You</h1>
							@if(Route::is('catalog-rootpath'))
								<span class="paypal_text">
									<h4>
										You will be redirected to PayPal to complete the payment!

										{{ title_case($data['survey']->description2) }}
									</h4>
									{{HTML::image('public/assets/admin/images/paypal-icons.png', null, array('class' => 'img-responisve paypal-icons'))}}
								</span>
							@endif
						</div>
					</header>
					<div class="container">
						<div class="row warnings">
							<div class="col-md-12">
								<div class="alert alert-danger hide">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>@lang('language.warning')</strong>&nbsp;<span>@lang('language.warning_message')</span>
								</div>
								<div class="alert alert-success hide">
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>@lang('language.success')</strong>&nbsp;@lang('language.success_message')
								</div>
							</div>
						</div>
						<div class="row language rbox">
							<div class="col-md-12 btn-continue">
								<button type="submit" class="btn continue">@lang('language.submit') <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="invitation_modal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content" style="background-color: #dddddd;">
						<div class="modal-header" style="text-align: center">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" style="color: #005598;font-weight: 600;font-size: 30px;margin: 0;text-transform: uppercase;">Invite Friends</h4>
							<p>We recommend you let them know they are receiving an email from The Academy For Leadership And Training, with their instructions. If you have any concerns or wish to complete the process without all raters' inputs, please let us know, by emailing: paul@taflat.com</p>
						</div>
						<div class="modal-body" style="background-color: #005598;">
							<div class="clearfix">
								<div id="czContainer">
									<div id="first">
										<div class="recordset html_for_invites">
											<div class="fieldRow clearfix upload_file_form2">
												<div class="col-md-6">
													<div class="form-group">
														<div class="controls ">
															{{ Form::text('invite[name][]', null, array('placeholder' => 'Name*','class' => 'form-control require')) }}
														</div>
													</div>
												</div>
												<div class="col-md-5">
													<div class="form-group">
														<div class="controls ">
															{{ Form::text('invite[email][]', null, array('placeholder' => 'Email*','class' => 'form-control require')) }}
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary">Save</button>
						</div>
					</div>
				</div>
			</div>
		{!! Form::close() !!}
		<div id="upload_excel_modal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content" style="background-color: #dddddd;">
					<div class="modal-header" style="text-align: center">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="color: #005598;font-weight: 600;font-size: 30px;margin: 0;text-transform: uppercase;">Invite Friends</h4>
						<p>We recommend you let them know they are receiving an email from The Academy For Leadership And Training, with their instructions. If you have any concerns or wish to complete the process without all raters' inputs, please let us know, by emailing: paul@taflat.com</p>
					</div>
					{!! Form::open(array('url' => url()->current(), 'files'=>true, 'class' => 'quesEdFormFull file_upload_form','onsubmit' => 'return false')) !!}
					<div class="modal-body" style="background-color: #005598;">
						<div class="clearfix">
							<div id="Container">
								<div id="first">
									<div class="recordset">
										<div class=" clearfix upload_file_form">
											<div class="col-md-6">
												<div class="form-group">
													<div class="controls mylabel">
														<label>Upload excel / csv file <br> <a target="_blank" href="{{URL::asset('public/assets/excel_file/sample_file.csv')}}">Sample File</a></label>
														{{ Form::file('invite_file', array('placeholder' => 'Excel File*','class' => 'form-control custom_uploadfile_class require excel_file', 'accept' => ".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel")) }}
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary uploadExcel">Save</button>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-xs-8">
						<label>Your Answers</label>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<div class="col-md-9 col-xs-4 text-right">
						<div class="movepage">
							<a class="prev" href="#">
								{{HTML::image('public/assets/catalog/images/back-icon.png')}} Go Up
							</a>
						</div>
					</div>
				</div>
			</div>
		</footer>
	@endif
<script>
        // JavaScript to disable mouse scroll
        function disableScroll() {
            // Prevent the default behavior of the mouse wheel
            window.addEventListener('wheel', preventDefault, { passive: false });
        }

        function enableScroll() {
            // Remove the event listener to re-enable scrolling
            window.removeEventListener('wheel', preventDefault);
        }

        function preventDefault(e) {
            e.preventDefault();
        }

        // Call the functions to enable/disable scrolling as needed
        disableScroll(); // Call this to disable scrolling
        // enableScroll(); // Call this to re-enable scrolling
    </script>
@endsection
@push('css')
	{{HTML::style('public/assets/catalog/css/jquery.fullpage.css') }}
	{{HTML::style('public/assets/plugins/fontpicker/fontello-7275ca86/css/fontello.css')}}
@endpush
@push('js')
	<script> var coupon_route = "{{route('catalog-coupon-code')}}";</script>
	<script> var upload_excel_route = "{{route('catalog-survey-file')}}";</script>
	{{ HTML::script('public/assets/catalog/js/jquery.easings.min.js') }}
	{{ HTML::script('public/assets/catalog/js/scrolloverflow.min.js') }}
	{{ HTML::script('public/assets/catalog/js/jquery.fullPage.js') }}
	{{ HTML::script('public/assets/catalog/js/mousewheel.js') }}
	{{ HTML::script('public/assets/plugins/cz-more/js/jquery.czMore-1.5.3.2.js')}}
	{{ HTML::script('public/assets/catalog/js/pages/survey/index.js?v=2.3') }}
@endpush
@push('metainfo')
	<title>{{ title_case($data['survey']->title).' | '.config('app.name') }}</title>
@endpush