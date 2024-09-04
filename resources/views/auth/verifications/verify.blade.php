@extends('auth.layouts.master')

@section('content')
    <div class="login_page_wrapper">
		<div class="md-card" id="login_card">
			<div class="md-card-content large-padding">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-large-bottom">Registration confirmation</h2>
                {!! Form::open(array('route' => 'confirmation_path')) !!}
                    <div class="uk-form-row">
                        <label for="code">Confirmation Code</label>
						{!! Form::text('code', old('code'), array('class' => 'md-input', 'id' => 'code')) !!}
						@if($errors->has('code'))
							{!! errorMsg($errors->first('code')) !!}
						@endif
                    </div>
					<p>
						Your Registration Code was sent to
						<br />
						{{ Session::get('email') }} <a>Please check your email</a>
					</p>
                    <div class="uk-margin-medium-top">
						<button type="submit" class="md-btn md-btn-primary md-btn-block">Confirm Registration</button>
                    </div>
                {!! Form::close() !!}
            </div>
		</div>
	</div>
	@include('alerts.error')
	@include('alerts.success')
@endsection

@push('metaInfo')
	<title>Confirmation Code | {{ config('app.name') }} </title>
@endpush