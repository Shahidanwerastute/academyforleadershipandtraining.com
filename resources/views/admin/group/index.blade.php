@extends('admin.layouts.template')
@section('content')
	<!-- main sidebar end -->
	<div id="page_content">
		<div id="page_content_inner">
			<h3 class="heading_b uk-margin-bottom">Manage Companies</h3>
			<div class="md-card">
				<div class="md-card-content">
					<div class="uk-grid" data-uk-grid-margin="">
						<div class="uk-width-medium-1-5 uk-row-first">
							<div class="md-input-wrapper md-input-filled">
								<div class="md-input-wrapper">
									<label>Name</label>
									<input type="text" name="name" class="md-input" autocomplete="off" data-uk-tooltip="{pos:'top'}" title="Enter user"><span class="md-input-bar "></span>
								</div>
								<span class="md-input-bar "></span>
							</div>
						</div>
						<div class="uk-width-medium-1-5">
							<div class="uk-width-medium-1-5 uk-margin-medium-top">
								<button type="submit" id="search" class="md-btn md-btn-primary">Search</button>                                            
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
@endsection
@push('css')

@endpush
@push('js')	
	<script>
		var groups = "{{route('admin-group-listing')}}";
		var group_create = "{{route('admin-group-create')}}";
		var group_update = "{{route('admin-group-update')}}";
		var group_delete = "{{route('admin-group-delete')}}";
		var roles = "{{route('admin-roles')}}";
	</script>	
	{{HTML::script('public/assets/bower_components/jtable/lib/jquery.jtable.min.js')}}
	{{HTML::script('public/assets/admin/js/pages/group/index.js?v=2')}}
@endpush
@push('metainfo');
	<title>Manage Companies | {{ config('app.name') }}</title>
@endpush