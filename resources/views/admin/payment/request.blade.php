@extends('admin.layouts.template')
@section('content')
	<!-- main sidebar end -->
	<div id="page_content">
		<div id="page_content_inner">
			<h3 class="heading_b uk-margin-bottom">Courses Requests</h3>
			<div class="md-card">
				<div class="md-card-content">
					<div id="records"></div>
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
	<script>
		var _listing = "{{route('admin-payment-listing')}}";
		var _delete = "{{route('admin-payment-delete')}}";
		var _status = "{{ $data['route-paramters']['status'] }}";
	</script>	
	{{ HTML::script('public/assets/bower_components/jtable/lib/jquery.jtable.min.js')}}
	{{ HTML::script('public/assets/admin/js/pages/payment/index.js?v=2')}}
@endpush
@push('metainfo');
	<title>Courses Requests | {{ config('app.name') }}</title>
@endpush