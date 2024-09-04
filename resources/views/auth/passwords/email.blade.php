@extends('auth.layouts.master')
@section('content')
	<div class="login_page_wrapper">
		<div class="md-card" id="login_card">
			<div class="md-card-content large-padding" id="register_form">
				<button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
				<h2 class="heading_a uk-margin-medium-bottom">Reset Password</h2>
				{!! Form::open(array('route' => 'password.email')) !!}
					<div class="uk-form-row">
						<label for="login_username">Email</label>
						{!! Form::email('email', old('email'), array('autofocus', 'class' => 'md-input')) !!}
						@if($errors->has('email'))
							{!! errorMsg($errors->first('email')) !!}
						@endif
					</div>
					<div class="uk-margin-medium-top">
						<input type="submit" name="submit" class="md-btn md-btn-primary md-btn-block md-btn-large" value="Send Password Reset Link">
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