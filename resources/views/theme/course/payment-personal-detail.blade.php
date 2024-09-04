@extends('theme.layouts.template')
@section('content')
<div id="BannerInner">
	<img src="{{URL::to('/')}}/public/assets/theme/images/banner-contact.jpg" alt="Banner About" class="img-fluid w-100">
	<div class="caption">
		@if(Route::is('theme-course-payment-personal-detail'))
		To Pay By Credit Card or Paypal
		@elseif(Route::is('theme-course-registration-bankcheck'))
		To Pay By Check
		@else
		Contact Us Today!
		@endif

	</div>
</div>

<main id="main">
	<section id="Contact" class="pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center">{!! $data['course']->title !!}</h2>
					@if(Route::is('theme-course-registration-bankcheck'))
					<p>
						<strong>
							To pay by check, please complete the registration form, make your check out to "The Academy For Leadership And Training, LLC,"<br>
							and mail your check and form to:
							<br><br>
							The Academy For Leadership And Training, LLC<br>
							1007 N Federal Hwy. #23<br>
							Fort Lauderdale, Florida  33304
							<br><br>
							<i>(Once the form is completed, you will receive a copy via email, for printing purposes.)<i>
						</strong>
					</p>
					@endif
					<!--<p><strong>Fill out the form below to join our mailing list!</strong></p>-->
					<p><span>*</span> Indicates Required Field</p>

					{!! Form::open(array('url' => url()->current(), 'files'=>true, 'class' => 'ajax_form')) !!}
					<div class="row">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Title</label>
								<select name="title" class="form-control">
									<option value="Mr.">Mr.</option>
									<option value="Mrs.">Mrs.</option>
									<option value="Ms.">Ms.</option>
									<option value="Dr.">Dr.</option>
								</select>
							</div>
						</div>
						<div class="col-12 col-sm-6 mb-4 mb-sm-0">
							<div class="form-group">
								<label>Name <span>*</span></label>
								<input type="text" name="name" class="form-control">
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Email <span>*</span></label>
								<input type="email" name="email" class="form-control">
							</div>
						</div>
						<div class="col-12 col-sm-6 mb-4 mb-sm-0">
							<div class="form-group">
								<label>Address <span>*</span></label>
								<input type="text" name="address" class="form-control">
							</div>
						</div>
						<div class="col-12 col-sm-6 mb-4 mb-sm-0">
							<div class="form-group">
								<label>Mobile <span>*</span></label>
								<input type="text" name="mobile" class="form-control">
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Phone Number</label>
								<input type="tel" name="phone" class="form-control">
							</div>
						</div>
						<div class="col-12 col-sm-6 mb-4 mb-sm-0">
							<div class="form-group">
								<label> Message (optional)</label>
								<textarea name="comment" class="form-control" rows="8"></textarea>
							</div>
						</div>
						<div class="col-12 col-sm-6 mb-4 mb-sm-0">
							<div class="form-group">
								<label>Organization (if applicable)</label>
								<input type="text" name="organization" class="form-control">
							</div>
						</div>
						<div class="col-12 col-sm-6 mb-4 mb-sm-0">
							<div class="form-group">
								<div class="g-recaptcha" data-sitekey="6LfccMMUAAAAAO5sS2DwQoWbRxEgWFNHMRUintAq"></div>
							</div>
						</div>
						
						<div class="col-12">
							<input name="submit" type="submit" class="btn btn-primary BtnBlue" value="{{(Route::is('theme-course-payment-personal-detail') ? 'Proceed to Payment' : 'Submit')}}">
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
<title>Payment Form | {{ $data['course']->title }}</title>
<meta name="description" content="{{ $data['course']->short_info }}" />
@endpush