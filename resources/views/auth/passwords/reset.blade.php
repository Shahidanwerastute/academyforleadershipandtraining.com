@extends('auth.layouts.master')
@section('content')
	<div class="login_page_wrapper">
		<div class="md-card" id="login_card">
			<div class="md-card-content large-padding" id="register_form">
				<button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
				<h2 class="heading_a uk-margin-medium-bottom">Set New Password</h2>
				{!! Form::open(array('route' => 'reset.password')) !!}
					<div class="uk-form-row">
						<label for="email">E-Mail Address</label>
						{!! Form::email('email',$email or old('email'), array('class' => 'md-input', 'id' => 'email')) !!}
						@if($errors->has('email'))
							{!! errorMsg($errors->first('email')) !!}
						@endif
					</div>
					<div class="uk-form-row">
						<label for="password">Password</label>
						{!! Form::password('password', array('class' => 'md-input', 'id' => 'password')) !!}
						@if($errors->has('password'))
							{!! errorMsg($errors->first('password')) !!}
						@endif
					</div>
					<div class="uk-form-row">
						<label for="password_confirmation">Confirm Password</label>
						{!! Form::password('password_confirmation', array('class' => 'md-input', 'id' => 'password_confirmation')) !!}
						@if($errors->has('password_confirmation'))
							{!! errorMsg($errors->first('password_confirmation')) !!}
						@endif
					</div>
					{!! Form::hidden('token', $token) !!}
					<div class="uk-margin-medium-top">
						<input type="submit" name="submit" class="md-btn md-btn-primary md-btn-block md-btn-large" value="Change">
					</div>
				{!! Form::close() !!}
			</div>
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
<title>Reset Password | {{ config('app.name') }}</title>
@endpush