@extends('auth.layouts.master')
@section('content')
	<div class="login_page_wrapper">
		<div class="md-card" id="login_card">
			<div class="md-card-content large-padding" id="register_form">
				<button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
				<h2 class="heading_a uk-margin-medium-bottom">Create an account</h2>
				{!! Form::open(array('route' => 'auth.register-post')) !!}
					<div class="uk-form-row">
						<label for="first_name">FIRST NAME *</label>
						{!! Form::text('first_name', old('first_name'), array('class' => 'md-input', 'id' => 'first_name')) !!}
						@if($errors->has('first_name'))
							{!! errorMsg($errors->first('first_name')) !!}
						@endif
					</div>
					<div class="uk-form-row">
						<label for="last_name">Last NAME *</label>
						{!! Form::text('last_name', old('last_name'), array('class' => 'md-input', 'id' => 'last_name')) !!}
						@if($errors->has('last_name'))
							{!! errorMsg($errors->first('last_name')) !!}
						@endif
					</div>
					<div class="uk-form-row">
						<label for="email">E-mail</label>
						{!! Form::email('email', old('email'), array('class' => 'md-input', 'minlength' => '10', 'maxlength' => '100', 'ng-pattern' => '/^.+@.+\..+$/', 'id' => 'email')) !!}
						@if($errors->has('email'))
							{!! errorMsg($errors->first('email')) !!}
						@endif
					</div>
					<div class="uk-form-row">
						<label for="email_confirmation">E-mail Confirm</label>
						{!! Form::email('email_confirmation', old('email_confirmation'), array('class' => 'md-input', 'minlength' => '10', 'maxlength' => '100', 'ng-pattern' => '/^.+@.+\..+$', 'id' => 'email_confirmation')) !!}
						@if($errors->has('email_confirmation'))
							{!! errorMsg($errors->first('email_confirmation')) !!}
						@endif
					</div>
					<div class="uk-form-row">
						<label for="password">PASSWORD *</label>
						{!! Form::password('password', array('class' => 'md-input', 'id' => 'password')) !!}
						@if($errors->has('password'))
							{!! errorMsg($errors->first('password')) !!}
						@endif
					</div>
					<div class="uk-form-row">
						<label for="password_confirmation">Repeat Password *</label>
						{!! Form::password('password_confirmation', array('class' => 'md-input', 'id' => 'password_confirmation')) !!}
						@if($errors->has('password_confirmation'))
							{!! errorMsg($errors->first('password_confirmation')) !!}
						@endif
					</div>
					<div class="uk-form-row">
						<label for="business_name">BUSINESS NAME *</label>
						{!! Form::text('business_name', old('business_name'), array('class' => 'md-input', 'id' => 'business_name')) !!}
						@if($errors->has('business_name'))
							{!! errorMsg($errors->first('business_name')) !!}
						@endif
					</div>
					<div class="uk-margin-top">
						<span class="icheck-inline">
							<input type="checkbox" name="agree" id="agree" data-md-icheck {{(old('agree') ? 'checked' : '')}}/>
							<label>by joining, you agree to our <a href="javascript:void(0)"> terms & conditions</a></label>
						</span>
					</div>
					@if($errors->has('agree'))
						{!! errorMsg($errors->first('agree')) !!}
					@endif
					<div class="uk-margin-medium-top">
						<button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Submit</button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
		<div class="uk-margin-top uk-text-center">
			<a href="#" id="signup_form_show">Create an account</a>
		</div>
	</div>
	@include('alerts.error')
	@include('alerts.success')
@endsection
@push('css')
@endpush
@push('js')
@endpush
@push('metaInfo')
<title>Register | {{ config('app.name') }}</title>
@endpush