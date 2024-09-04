@extends('admin.layouts.template')
@section('content')
<!-- main sidebar end -->
<div id="page_content">
	<div id="page_content_inner">
		<div class="md-card">
			<div class="md-card-content">
				<h4 class="heading_a">
					Sorting
					<span class="sub-heading">Sort courses by dragging the below bars.</span>
				</h4>
			</div>
		</div>
		<div class="md-card">
			<div class="md-card-content">
				<div class="uk-grid" data-uk-grid-margin>
					<div class="uk-width-1-1">
						<ul class="uk-nestable" data-uk-nestable="{handleClass:'uk-nestable-handle'}">
							@foreach($data['courses'] as $row)
							<li class="uk-nestable-item sorting" id="arrayorder_{{ $row->id}}">
								<div class="uk-nestable-panel">
									<i class="material-icons">&#xE5D2;</i>
									{{$row->title}}
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="md-fab-wrapper">
	<a class="md-fab md-fab-accent" href="{{route('admin-survey')}}" id="recordAdd">
		<i class="material-icons">keyboard_backspace</i>
	</a>
</div>
@endsection
@push('css')

@endpush
@push('js')
<script>
	var sorting = "{{route('admin-course-sorting')}}";
</script>
{{HTML::script('public/assets/admin/js/pages/course/index.js?v=3')}}
@endpush
@push('metainfo');
<title>Sort Courses | Sorting | {{ config('app.name') }}</title>
@endpush