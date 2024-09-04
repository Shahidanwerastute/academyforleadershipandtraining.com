@extends('theme.layouts.template') 
@section('content')
<div id="BannerInner">
	<img src="{{URL::to('/')}}/public/assets/theme/images/banner-contact.jpg" alt="Banner About" class="img-fluid w-100">
	<div class="caption">
		Contact Us Today!
	</div>
</div>

<main id="main">
	<section id="Contact" class="pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center">Let us help you take your organizational leadership to the next level!</h2>
					<!--<p><strong>Fill out the form below to join our mailing list!</strong></p>-->
					<p><span>*</span> Indicates Required Field</p>

					{!! Form::open(array('url' => url()->current(), 'files'=>true, 'class' => 'ajax_form')) !!}
					<div class="row">
						<div class="col-12 col-sm-6 mb-4 mb-sm-0">
							<div class="form-group">
								<label>First Name <span>*</span></label>
								<input type="text" name="first_name" class="form-control">
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Last Name <span>*</span></label>
								<input type="text" name="last_name" class="form-control">
							</div>
						</div>
						<div class="col-12 col-sm-6 mb-4 mb-sm-0">
						<div class="form-group">
							<label>Email <span>*</span></label>
							<input type="email" name="email" class="form-control">
						</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Phone Number</label>
								<input type="tel" name="phone_number" class="form-control">
							</div>
						</div>
						<div class="col-12 col-sm-6 mb-4 mb-sm-0">
							<div class="form-group">
								<label>Organization (if applicable)</label>
								<input type="text" name="organization" class="form-control">
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Leadership &amp; Training Courses</label>
								<select name="training_course" class="form-control">
									<option value=""></option>
									<option value="Change Management">Change Management</option>
									<option value="eMails That Work">eMails That Work</option>
									<option value="Leading Others &amp; Delegating Tasks">Leading Others &amp; Delegating Tasks</option>
									<option value="Understanding &amp; Managing Conflict">Understanding &amp; Managing Conflict</option>
									<option value="Train-The-Trainer Workshop">Train-The-Trainer Workshop</option>
									<option value="Diversity &amp; Inclusion in Business">Diversity &amp; Inclusion in Business</option>
									<option value="Behvorial Interview Programs">Behvorial Interview Programs</option>
									<option value="Change Through Effective Project Management">Change Through Effective Project Management</option>
									<option value="Adjusting Your Communication Styles">Adjusting Your Communication Styles</option>
									<option value="Process Improvement Workshop">Process Improvement Workshop</option>
									<option value="Multiple Programs (Explain in Comment Section)">Multiple Programs (Explain in Comment Section)</option>
								</select>
							</div>
						</div>
						<div class="col-12 col-sm-6 mb-4 mb-sm-0">
							<div class="form-group">
								<label>Customized leadership Program </label>
								<select name="leadership_program" class="form-control">
									<option value=""></option>
									<option value="Senior Leader Program">Senior Leader Program</option>
									<option value="Emerging Leader Program">Emerging Leader Program</option>
									<option value="Frontline Leader Program">Frontline Leader Program</option>
									<option value="Multiple Programs (Explain in Comment Section)">Multiple Programs (Explain in Comment Section)</option>
								</select>
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
							<label>Organizational Consulting</label>
							<select name="organizational_consulting" class="form-control">
										<option value=""></option>
										<option value="Organization Readiness Assessment">Organization Readiness Assessment</option>
										<option value="Team Coaching">Team Coaching</option>
										<option value="Department 360's">Department 360's</option>
										<option value="Consultant  Assessments">Consultant  Assessments</option>
										<option value="Multiple Programs (Explain in Comment Section)">Multiple Programs (Explain in Comment Section)</option>
									</select>
							</div>
						</div>
						<div class="col-12 col-sm-6 mb-4 mb-sm-0">
							<div class="form-group">
								<label>How Did You Hear About Us?</label>
								<select name="hear_you_from" class="form-control">
									<option value="LinkedIn">LinkedIn</option>
									<option value="Facebook">Facebook</option>
									<option value="Twitter">Twitter</option>
									<option value="Referred From Colleague">Referred From Colleague</option>
								</select>
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Referred From Colleague</label>
								<input type="text" name="colleague_name" class="form-control">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Comment</label>
								<textarea name="comment" class="form-control" rows="8"></textarea>
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<div class="g-recaptcha" data-sitekey="6LfccMMUAAAAAO5sS2DwQoWbRxEgWFNHMRUintAq"></div>
							</div>
						</div>
						<div class="col-12">
							<input name="submit" type="submit" class="btn btn-primary BtnBlue" value="Submit">
						</div>
					</div>
					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</section>
</main>
	@include('alerts.success')
	@include('alerts.error')
	@include('theme.section.testimonials')
@endsection
@push('css')
	{{HTML::style('public/assets/theme/css/alert.css')}}
@endpush
@push('js')
	{{HTML::script('public/assets/assets/js/altair_admin_common.js')}}
	{{HTML::script('public/assets/assets/js/pages/components_notifications.min.js')}}
	{{HTML::script('public/assets/assets/js/uikit_custom.min.js')}} 
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
@push('metainfo')
<title>Contact TAFLAT: Leadership & Training Excellence from California to Miami</title>
<meta name="description" content="Connect with The Academy for Leadership and Training (TAFLAT) spanning California to Miami. Embark on a journey of leadership growth and skill enhancement."
/> 
@endpush