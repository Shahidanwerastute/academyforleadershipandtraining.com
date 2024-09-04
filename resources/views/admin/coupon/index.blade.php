@extends('admin.layouts.template')
@section('content')
	<!-- main sidebar end -->
	<div id="page_content">
		<div id="page_content_inner">
			<h3 class="heading_b uk-margin-bottom">Manage Coupons</h3>
			<div class="md-card">
				<div class="md-card-content">
					<div class="uk-grid" data-uk-grid-margin="">
						<div class="uk-width-medium-1-1 uk-row-first">
							<div class="uk-input-group">
								<div class="md-input-wrapper">
									<label>Name</label>
									<input type="text" name="name" class="md-input" autocomplete="off" data-uk-tooltip="{pos:'top'}" title="Enter employee"><span class="md-input-bar "></span>
									<span class="md-input-bar "></span>
								</div>
								<span class="uk-input-group-addon excel_upload">
									<button type="submit" id="search" class="md-btn md-btn-primary">Search</button>
								</span> 
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
		var coupons = "{{route('admin-coupon')}}";
		var coupon_create = "{{route('admin-coupon-create')}}";
		var coupon_update = "{{route('admin-coupon-update')}}";
		var coupon_delete = "{{route('admin-coupon-delete')}}";
		var autocomplete_courses = "{{route('admin-autocomplete-course')}}";
	</script>	
	{{HTML::script('public/assets/bower_components/jtable/lib/jquery.jtable.min.js')}}
	{{HTML::script('public/assets/admin/js/pages/coupon/index.js?v=2')}}
@endpush
@push('metainfo');
	<title>Manage Coupons | {{ config('app.name') }}</title>
@endpush