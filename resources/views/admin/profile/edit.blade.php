@extends('admin.layouts.template')
	@section('content')
	<div id="page_content">
		<div id="page_content_inner">
			<div class="uk-form-stacked">
				<div class="uk-grid" data-uk-grid-margin>
					{!! Form::open(array('route' => 'admin-edit-profile', 'files'=>true, 'class' => 'uk-width-large-7-10 ajax_form')) !!}
						<div class="md-card">
							<div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
								<div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail">
										@if($data['user_info']->image && File::exists('public/assets/admin/images/profile/'.$data['user_info']->image)) 
											{{HTML::image('public/assets/admin/images/profile/'.$data['user_info']->image, $data['user_info']->first_name.' '.$data['user_info']->last_name)}}
										@else
											{{HTML::image('public/assets/admin/images/profile/default/male-default-profile-picture.png', $data['user_info']->first_name.' '.$data['user_info']->last_name)}}
										@endif
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail"></div>
									<div class="user_avatar_controls">
										<span class="btn-file">
											<span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
											<span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
											<input type="file" name="image">
										</span>
										<a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
									</div>
								</div>
								<div class="user_heading_content">
									<h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname">{{$data['user_info']->first_name.' '.$data['user_info']->last_name}}</span><span class="sub-heading" id="user_edit_position">{{ $data['user_info']->address or 'Need Address Here' }}</span></h2>
								</div>
								<div class="md-fab-wrapper">
									<div class="md-fab md-fab-toolbar md-fab-small md-fab-accent">
										<i class="material-icons">&#xE8BE;</i>
										<div class="md-fab-toolbar-actions">
											<button type="submit" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Save"><i class="material-icons md-color-white">&#xE161;</i></button>
										</div>
									</div>
								</div>
							</div>
							<div class="user_content">
								<ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#user_edit_tabs_content'}">
									<li class="uk-active"><a href="#">Basic</a></li>
								</ul>
								<ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
									<li>
										<div class="uk-margin-top">
											<h3 class="full_width_in_card heading_c">
												General info
											</h3>
											<div class="uk-grid" data-uk-grid-margin>
												<div class="uk-width-medium-1-1">
													<label for="first_name">FIRST NAME *</label>
													{!! Form::text('first_name', $data['user_info']->first_name, array('class' => 'md-input', 'id' => 'first_name')) !!}
													@if($errors->has('first_name'))
														{!! errorMsg($errors->first('first_name')) !!}
													@endif
												</div>
												<div class="uk-width-medium-1-1">
													<label for="last_name">Last NAME *</label>
													{!! Form::text('last_name', $data['user_info']->last_name, array('class' => 'md-input', 'id' => 'last_name')) !!}
													@if($errors->has('last_name'))
														{!! errorMsg($errors->first('last_name')) !!}
													@endif
												</div>
												<div class="uk-width-medium-1-1">
													<label for="email">E-mail *</label>
													{!! Form::email('email', $data['user_info']->email, array('class' => 'md-input', 'minlength' => '10', 'maxlength' => '100', 'ng-pattern' => '/^.+@.+\..+$/', 'id' => 'email')) !!}
													@if($errors->has('email'))
														{!! errorMsg($errors->first('email')) !!}
													@endif
												</div>
												<div class="uk-width-medium-1-1">
													<label for="address">Address</label>
													{!! Form::text('address', $data['user_info']->address, array('class' => 'md-input', 'id' => 'address')) !!}
													@if($errors->has('address'))
														{!! errorMsg($errors->first('address')) !!}
													@endif
												</div>
												<div class="uk-width-medium-1-1">
													<label>Mobile</label>
													{!! Form::text('mobile', $data['user_info']->mobile, array('class' => 'md-input', 'id' => 'mobile')) !!}
													@if($errors->has('mobile'))
														{!! errorMsg($errors->first('mobile')) !!}
													@endif
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					{!! Form::close() !!}
					<div class="uk-width-large-3-10">
						<div class="md-card">
							<div class="md-card-content">
								{!! Form::open(array('route' => 'admin-credentials', 'class' => 'ajax_form')) !!}
									<h3 class="heading_c uk-margin-medium-bottom">Password Settings</h3>
									<div class="uk-form-row">
										<label class="uk-form-label" for="old_password">Old Password *</label>
										{!! Form::password('old_password', array('class' => 'md-input')) !!}
										@if($errors->has('old_password'))
											{!! errorMsg($errors->first('old_password')) !!}
										@endif
									</div>
									<div class="uk-form-row">
										<label class="uk-form-label" for="password">New Password *</label>
										{!! Form::password('password', array('class' => 'md-input')) !!}
										@if($errors->has('password'))
											{!! errorMsg($errors->first('password')) !!}
										@endif
									</div>
									<div class="uk-form-row">
										<label class="uk-form-label" for="password_confirmation">Confirm Password *</label>
										{!! Form::password('password_confirmation', array('class' => 'md-input')) !!}
										@if($errors->has('password_confirmation'))
											{!! errorMsg($errors->first('password_confirmation')) !!}
										@endif
									</div>
									<div class="uk-form-row">
										<span class="uk-input-group-addon">
											<button class="md-btn" type="submit"><span class="ladda-label">Update</button>
										</span>
									</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('alerts.error')
	@include('alerts.success')
@endsection
@push('css')
@endpush
@push('js')
	{{ Html::script('public/assets/assets/js/custom/uikit_fileinput.min.js') }}
@endpush
@push('metainfo');
	<title>Edit Profile | {{ config('app.name') }}</title>
@endpush