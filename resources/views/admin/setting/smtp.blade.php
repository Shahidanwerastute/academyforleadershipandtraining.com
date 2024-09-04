@extends('admin.layouts.template')
@section('content')
	<!-- main sidebar end -->
	<div id="page_content">
		<div id="page_content_inner">	
			{!! Form::open(array('route' => 'admin-setting-smtp', 'files'=>true,)) !!}
				<div class="md-card">
					<div class="md-card-content">
						<h3 class="heading_b uk-margin-bottom">Admin Noitification Email</h3>
						<div class="uk-width-medium-1-2">
							{!! Form::text('email', (old('email') ? old('email') : $data['setting']->email), array('class' => 'input-count md-input')) !!}
							@if($errors->has('email'))
								{!! errorMsg($errors->first('email')) !!}
							@endif
							<span class="uk-form-help-block">Admin Email</span>
						</div>
					</div>
				</div>
				<div class="md-card">
					<div class="md-card-content">
						<h3 class="heading_b uk-margin-bottom">SMTP Settings</h3>
						<div class="uk-grid" data-uk-grid-margin>
							<div class="uk-width-medium-1-2">
								{!! Form::text('host', (old('host') ? old('host') : $data['setting']->host), array('class' => 'input-count md-input')) !!}
								@if($errors->has('host'))
									{!! errorMsg($errors->first('host')) !!}
								@endif
								<span class="uk-form-help-block">Host</span>
							</div>
							<div class="uk-width-medium-1-2">
								<select name="type" data-md-selectize>
									<option value="tls" {{($data['setting']->type == 'tls' ? 'selected' : '')}}>TLS</option>
									<option value="ssl" {{($data['setting']->type == 'ssl' ? 'selected' : '')}}>SSL</option>
								</select>
								@if($errors->has('type'))
									{!! errorMsg($errors->first('type')) !!}
								@endif
								<span class="uk-form-help-block">Encryption Type</span>
							</div>
							<div class="uk-width-medium-1-2">
								{!! Form::text('port', (old('port') ? old('port') : $data['setting']->port), array('class' => 'input-count md-input')) !!}
								@if($errors->has('port'))
									{!! errorMsg($errors->first('port')) !!}
								@endif
								<span class="uk-form-help-block">Port</span>
							</div>
							<div class="uk-width-medium-1-2">
								{!! Form::text('username', (old('username') ? old('username') : $data['setting']->username), array('class' => 'input-count md-input')) !!}
								@if($errors->has('username'))
									{!! errorMsg($errors->first('username')) !!}
								@endif
								<span class="uk-form-help-block">Username</span>
							</div>
							<div class="uk-width-medium-1-2">
								{!! Form::text('from_address', (old('from_address') ? old('from_address') : $data['setting']->from_address), array('class' => 'input-count md-input')) !!}
								@if($errors->has('from_address'))
									{!! errorMsg($errors->first('from_address')) !!}
								@endif
								<span class="uk-form-help-block">From Address</span>
							</div>
							<div class="uk-width-medium-1-2">
								{!! Form::text('from_name', (old('from_name') ? old('from_name') : $data['setting']->from_name), array('class' => 'input-count md-input')) !!}
								@if($errors->has('from_name'))
									{!! errorMsg($errors->first('from_name')) !!}
								@endif
								<span class="uk-form-help-block">From Name</span>
							</div>
							<div class="uk-width-medium-1-2">
								{!! Form::text('password', null, array('class' => 'input-count md-input')) !!}
								@if($errors->has('password'))
									{!! errorMsg($errors->first('password')) !!}
								@endif
								<span class="uk-form-help-block">Password</span>
							</div>
						</div>
						<div class="md-fab-wrapper">
							<button class="md-fab md-fab-accent" type="submit">
								<i class="material-icons">mode_edit</i>
							</button>
						</div>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
	@include('alerts.error')
	@include('alerts.success')
@endsection
@push('css')

@endpush
@push('js')	
@endpush
@push('metainfo');
	<title>Smtp Setting | {{ config('app.name') }}</title>
@endpush