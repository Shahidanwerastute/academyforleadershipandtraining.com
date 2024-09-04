@extends('admin.layouts.template')
@section('content')
	<!-- main sidebar end -->
	<div id="page_content">
		<div id="page_content_inner">
			@if(isset($data['survey']))
				@if(isset($data['employee_info']))
					<h3 class="heading_b uk-margin-bottom">Friends of {{$data['employee_info']->first_name.' '.$data['employee_info']->last_name}}</h3>
				@else
					<h3 class="heading_b uk-margin-bottom">Assessment Results</h3>
				@endif
				<div class="md-card">
					<div class="md-card-content">
						@if(!isset($data['route-paramters']['parent_assessment_id']))
							{!! Form::open(array('url' => url()->current(), 'class' => 'ajax_form')) !!}
								<h3 class="heading_a">Primary Communication Style</h3>
								<div class="uk-grid" data-uk-grid-margin>
									<div class="uk-width-medium-1-6">
										<input type="radio" name="behavior" data-md-icheck value="analytical"/>
										<label class="inline-label">Analytical</label>
									</div>
									<div class="uk-width-medium-1-6">
										<input type="radio" name="behavior" data-md-icheck  value="driver"/>
										<label class="inline-label">Driver</label>
									</div>
									<div class="uk-width-medium-1-6">
										<input type="radio" name="behavior" data-md-icheck  value="amiable"/>
										<label class="inline-label">Amiable</label>
									</div>
									<div class="uk-width-medium-1-6">
										<input type="radio" name="behavior" data-md-icheck  value="expressive"/>
										<label class="inline-label">Expressive</label>
									</div>
								</div>
								<h3 class="heading_a">Secondary Communication Style</h3>
								<div class="uk-grid" data-uk-grid-margin>
									<div class="uk-width-medium-1-6">
										<input type="radio" name="sub_behavior" data-md-icheck value="an"/>
										<label class="inline-label">Analytical</label>
									</div>
									<div class="uk-width-medium-1-6">
										<input type="radio" name="sub_behavior" data-md-icheck  value="dr"/>
										<label class="inline-label">Driver</label>
									</div>
									<div class="uk-width-medium-1-6">
										<input type="radio" name="sub_behavior" data-md-icheck  value="am"/>
										<label class="inline-label">Amiable</label>
									</div>
									<div class="uk-width-medium-1-6">
										<input type="radio" name="sub_behavior" data-md-icheck  value="ex"/>
										<label class="inline-label">Expressive</label>
									</div>
								</div>
								<h3 class="heading_a">Date Range</h3>
								<div class="uk-grid" data-uk-grid-margin="">
									<div class="uk-width-medium-1-6 uk-row-first">
										<div class="uk-input-group">
											<span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
											<label for="uk_dp_start">Start Date</label>
											<input class="md-input" name="start" type="text">
										</div>
									</div>
									<div class="uk-width-medium-1-6">
										<div class="uk-input-group">
											<span class="uk-input-group-addon"><i class="uk-input-group-icon uk-icon-calendar"></i></span>
											<label for="uk_dp_start">End Date</label>
											<input class="md-input" name="end" type="text">
										</div>
									</div>
									<div class="uk-width-medium-1-6">
										<div class="uk-input-group">
											<span class="uk-input-group-addon">
												<a class="md-btn md-btn-primary" name="search">Search</a>
											</span>  
										</div>
									</div>
								</div>
							{!! Form::close() !!}
						@endif
					</div>
				</div>
					<div class="md-card">
						<div class="md-card-content">
							<div class="uk-grid" data-uk-grid-margin="">
								<div class="uk-width-medium-1-1 uk-row-first">
									<div class="uk-input-group">
										<a class="md-btn md-btn-primary" href="{{ route('admin-survey-export') }}">Export</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<div class="records">
					@include('admin.survey.ajax.submissions')
				</div>
				@if(isset($data['route-paramters']['parent_assessment_id'])) <a class="md-btn md-btn-danger" href="{{ route('admin-submissions') }}">Back</a> @endif
					@if(isset($data['route-paramters']['parent_assessment_id']))<button class="md-btn md-btn-primary reminder_email_button" data-assessment="{{$data['route-paramters']['parent_assessment_id']}}" data-group="{{$data['group_info']->id}}"  data-url="{{ route('admin-reminder').'/'.$data['route-paramters']['parent_assessment_id'].'/'.$data['group_info']->id }}">Send Reminder Email</button> @endif
			@endif
		</div>
	</div>
	<div class="uk-modal uk-modal-card-fullscreen" id="fetch-result">
		<div class="uk-modal-dialog uk-modal-dialog-blank">
			<div class="md-card uk-height-viewport">
				<div class="md-card-toolbar">
					<span class="md-icon material-icons uk-modal-close">&#xE5C4;</span>
					<h3 class="md-card-toolbar-heading-text">
						Assessment Results
					</h3>
				</div>
				<div class="md-card-content">
					<div class="submission-result"></div> 
				</div>
			</div>
		</div>
	</div>
	<div class="uk-modal uk-modal-card-fullscreen" id="aggregate">
		<div class="uk-modal-dialog uk-modal-dialog-lightbox">
			<div class="md-card uk-height-viewport">
				<div class="md-card-toolbar">
					<span class="md-icon material-icons uk-modal-close">&#xE5C4;</span>
					<h3 class="md-card-toolbar-heading-text">
						Aggregate Results
					</h3>
				</div>
				<div class="md-card-content">
					<div class="uk-text-center">
						<img src="" />
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('css')
	{{HTML::style('public/assets/bower_components/kendo-ui/styles/kendo.common-material.min.css')}}
	{{HTML::style('public/assets/bower_components/kendo-ui/styles/kendo.material.min.css')}}
@endpush
@push('js')	
	<script> 
		var fetch_result = "{{route('admin-survey-result')}}";
		var fetch_aggregate = "{{route('admin-survey-aggregate')}}";
	</script>
	{{HTML::script('public/assets/assets/js/kendoui_custom.min.js')}}
	{{HTML::script('public/assets/assets/js/pages/kendoui.min.js')}}
	{{HTML::script('public/assets/admin/js/pages/survey/index.js?v=2')}}
@endpush
@push('metainfo');
	<title>Survey Results | {{ config('app.name') }}</title>
@endpush