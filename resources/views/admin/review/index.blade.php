@extends('admin.layouts.template')
@section('content')
	<!-- main sidebar end -->
	<div id="page_content">
		<div id="page_content_inner">
			<h3 class="heading_b uk-margin-bottom">Manage Comments</h3>
			<div class="uk-grid" data-uk-grid-margin="">
				<div class="uk-width-medium-3-5 uk-row-first">
					<div class="md-card">
						<div class="md-card-content">
							<div class="uk-grid" data-uk-grid-margin="">
								<div class="uk-width-medium-5-6 uk-row-first">
									<div class="md-input-wrapper md-input-filled">
										<div class="md-input-wrapper">
											<input type="text" name="name" class="md-input" autocomplete="off" data-uk-tooltip="{pos:'top'}" title="Enter Name / Email"><span class="md-input-bar "></span>
										</div>
									</div>
									<span class="uk-form-help-block">Name / Email</span>
								</div>
								<div class="uk-width-medium-1-6">
									<div class="uk-width-medium-1-5 uk-margin-medium-top">
										<button type="submit" id="search" class="md-btn md-btn-primary">Search</button>                                            
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="md-card">
				<div class="md-card-content">
					<div id="records"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="md-fab-wrapper">
		<a class="md-fab md-fab-accent" href="#" id="recordAdd">
		<i class="material-icons">&#xE145;</i>
		</a>
	</div>
	@include('alerts.error')
	@include('alerts.success')
@endsection
@push('css')
@endpush
@push('js')	
	<script>
		var _listing = "{{route('admin-review-listing')}}";
		var _delete = "{{route('admin-review-delete')}}";
	</script>	
	{{HTML::script('public/assets/bower_components/jtable/lib/jquery.jtable.min.js')}}
	{{HTML::script('public/assets/admin/js/pages/review/index.js') }}
@endpush
@push('metainfo');
	<title>Manage Comments | {{ config('app.name') }}</title>
@endpush