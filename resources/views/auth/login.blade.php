@extends('auth.layouts.master')
@section('content')
	<div class="login_page_wrapper">
		<div class="md-card" id="login_card">
			<div class="md-card-content large-padding" id="register_form">
				<button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
				<h2 class="heading_a uk-margin-medium-bottom">Login to your account</h2>
				{!! Form::open(array('route' => 'login')) !!}
					<div class="uk-form-row">
						<label for="login_username">Email</label>
						{!! Form::email('email', old('email'), array('class' => 'md-input')) !!}
						@if($errors->has('email'))
							{!! errorMsg($errors->first('email')) !!}
						@endif
					</div>
					<div class="uk-form-row">
						<label for="login_password">Password</label>
						{!! Form::password('password', array('class' => 'md-input')) !!}
						@if($errors->has('password'))
							{!! errorMsg($errors->first('password')) !!}
						@endif
					</div>
					<div class="uk-margin-medium-top">
						<input type="submit" name="submit" class="md-btn md-btn-primary md-btn-block md-btn-large" value="Sign In">
					</div>
					<div class="uk-margin-top">
						<a href="{{ route('password.request') }}" id="login_help_show" class="uk-float-right">Forgot your password?</a>
						<span class="icheck-inline">
							<input type="checkbox" name="remember" id="remember" data-md-icheck />
							<label for="remember" class="inline-label">Stay signed in</label>
						</span>
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
<title>Login | {{ config('app.name') }}</title>
@endpush