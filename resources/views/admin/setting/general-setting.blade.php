@extends('admin.layouts.template')
@section('content')
<div id="page_content">
	<div id="page_content_inner">
		<div class="uk-form-stacked">
			<div class="uk-grid" data-uk-grid-margin>
				{!! Form::open(array('route' => 'admin-general-setting', 'files'=>true, 'class' => 'uk-width-large-7-10 ajax_form')) !!}
				<div class="md-card">
					<div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
						<div class="user_heading_content">
							<h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname">General Setting</span></h2>
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
						<div class="uk-margin-top">
							<div class="uk-grid" data-uk-grid-margin>
								<div class="uk-width-medium-1-1">
									<label for="title">Title *</label>
									{!! Form::text('title', $data['setting']->title, array('class' => 'md-input', 'id' => 'title')) !!}
									@if($errors->has('title'))
									{!! errorMsg($errors->first('title')) !!}
									@endif
								</div>
								{{--<div class="uk-width-medium-1-1">
									<label for="description">Description</label>
									{!! Form::text('description', $data['setting']->description, array('class' => 'md-input', 'id' => 'description')) !!}
									@if($errors->has('description'))
									{!! errorMsg($errors->first('description')) !!}
									@endif
								</div>
								<div class="uk-width-medium-1-1">
									<label for="keywords">Keywords</label>
									{!! Form::text('keywords', $data['setting']->keywords, array('class' => 'md-input', 'id' => 'keywords')) !!}
									@if($errors->has('keywords'))
									{!! errorMsg($errors->first('keywords')) !!}
									@endif
									<span class="uk-form-help-block "><span class="uk-badge">Keywords should be comma seperated.</span></span>
								</div>--}}
								<div class="uk-width-medium-1-1">
									<label for="description">Survey Price</label>
									{!! Form::text('survey_price', $data['setting']->survey_price, array('class' => 'md-input', 'id' => 'survey_price')) !!}
									@if($errors->has('survey_price'))
									{!! errorMsg($errors->first('survey_price')) !!}
									@endif
								</div>
								<div class="uk-width-medium-1-1">
									<label for="description">Friend Assessment Price</label>
									{!! Form::text('friend_assessment_price', $data['setting']->friend_assessment_price, array('class' => 'md-input', 'id' => 'friend_assessment_price')) !!}
									@if($errors->has('friend_assessment_price'))
									{!! errorMsg($errors->first('friend_assessment_price')) !!}
									@endif
								</div>
								<div class="uk-width-medium-1-1">
									<label for="address">Logo</label>
								</div>
								<div class="uk-width-medium-1-1">
									<div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail">
											@if($data['setting']->logo && File::exists('public/assets/admin/images/'.$data['setting']->logo)) 
												{{HTML::image('public/assets/admin/images/'.$data['setting']->logo, $data['setting']->title)}}
											@else
												{{HTML::image('public/assets/admin/images/default/default-logo.png', $data['setting']->title)}}
											@endif
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail"></div>
										<div class="user_avatar_controls">
											<span class="btn-file">
											<span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
											<span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
											<input type="file" name="logo">
											</span>
											<a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
										</div>
									</div>
								</div>
								<div class="uk-width-medium-1-1">
									<label for="logo_url">Logo External Link</label>
									{!! Form::text('logo_url', $data['setting']->logo_url, array('class' => 'md-input', 'id' => 'logo_url')) !!}
									@if($errors->has('logo_url'))
									{!! errorMsg($errors->first('logo_url')) !!}
									@endif
								</div>
								{{--<div class="uk-width-medium-1-1">
									<label for="address">Favicon</label>
								</div>
								<div class="uk-width-medium-1-1">
									<div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail">
											@if($data['setting']->favicon && File::exists('public/assets/admin/images/'.$data['setting']->favicon)) 
												{{HTML::image('public/assets/admin/images/'.$data['setting']->favicon, $data['setting']->title)}}
											@else
												{{HTML::image('public/assets/admin/images/default/default-logo.png', $data['setting']->title)}}
											@endif
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail"></div>
										<div class="user_avatar_controls">
											<span class="btn-file">
											<span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
											<span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
											<input type="file" name="favicon">
											</span>
											<a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
										</div>
									</div>
								</div>
								<div class="uk-width-medium-1-1">
									<label>Questions Color</label>
								</div>
								<div class="uk-width-medium-1-1">
									{!! Form::text('question_color', $data['setting']->question_color, array('class' => 'md-input color-picker', 'id' => 'question_color')) !!}
									@if($errors->has('question_color'))
									{!! errorMsg($errors->first('question_color')) !!}
									@endif
								</div>
								<div class="uk-width-medium-1-1">
									<label>Answers Color</label>
								</div>
								<div class="uk-width-medium-1-1">
									{!! Form::text('answer_color', $data['setting']->answer_color, array('class' => 'md-input color-picker', 'id' => 'answer_color')) !!}
									@if($errors->has('answer_color'))
									{!! errorMsg($errors->first('answer_color')) !!}
									@endif
								</div>--}}
							</div>
						</div>
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@include('alerts.error')
@include('alerts.success')
@endsection
@push('css')
{{HTML::style('public/assets/plugins/colorpicker/css/spectrum.css')}}
@endpush
@push('js')
{{ Html::script('public/assets/assets/js/custom/uikit_fileinput.min.js') }}
{{HTML::script('public/assets/plugins/colorpicker/js/spectrum.js')}}
@endpush
@push('metainfo');
<title>General Setting | {{ config('app.name') }}</title>
@endpush