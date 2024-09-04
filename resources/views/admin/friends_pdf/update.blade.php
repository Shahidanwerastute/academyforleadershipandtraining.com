@extends('admin.layouts.template')
@section('content')
	<!-- main sidebar end -->
	<div id="page_content">
		<div id="page_content_inner">
			<h3 class="heading_b uk-margin-bottom">
				{{$data['content']->p_behavior}}&nbsp;
				<a class="md-btn md-btn-primary md-btn-small md-btn-wave-light md-btn-icon waves-effect waves-button waves-light" href="{{route('admin-new-pdf')}}">
					<i class="uk-icon-map"></i>
					Back
				</a>
			</h3>
			{!! Form::open(array('url' => url()->current())) !!}
				<div class="md-card uk-margin-medium-bottom">
					<div class="md-card-content">
						<h3 class="heading_a">Primary Content</h3>
						<div class="uk-grid" data-uk-grid-margin="">
							<div class="uk-width-medium-1-1 uk-row-first">
								<div class="uk-overflow-container">
									<textarea name="p_content" class="wysiwyg_tinymce" cols="30" rows="30">
										{!! $data['content']->p_content !!}
									</textarea>
								</div>
							</div>
						</div>
						<h3 class="heading_a">Secondary Content</h3>
						<div class="uk-grid" data-uk-grid-margin="">
							<div class="uk-width-medium-1-1 uk-row-first">
								<div class="uk-overflow-container">
									<textarea name="s_content" class="wysiwyg_tinymce" cols="30" rows="30">
										{!! $data['content']->s_content !!}
									</textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="md-fab-wrapper">
					<button class="md-fab md-fab-accent" type="submit">
						<i class="material-icons">mode_edit</i>
					</button>
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
	{{HTML::script('public/assets/bower_components/tinymce/tinymce.min.js')}}
	{{HTML::script('public/assets/admin/js/pages/pdf/index.js?v=0')}}
@endpush
@push('metainfo');
	<title>Update Pdf | {{ config('app.name') }}</title>
@endpush