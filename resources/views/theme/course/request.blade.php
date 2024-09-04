@extends('theme.layouts.template') 
@section('content')
<main id="main">
	<section class="pt-5">
		<div class="text-center">
			<h2>{{ $data['course']->title }}</h2>
			<p class="DarkBlue">We approach every client as a completely unique project. As such, this process may be modified for your needs.</p>
		</div>
		<div class="container pt-4 pb-4">
			<div class="media d-block d-md-flex mb-4">
				@if($data['course']->image && file_exists("public/assets/admin/images/course/".$data['course']->image)) {{HTML::image("public/assets/admin/images/course/".$data['course']->image,
				$data['course']->title, array("class" => "col-12 col-lg-3 col-md-4 align-self-center mb-4 mr-0 mr-md-4 mb-md-0 order-1
				BoxShadow p-0"))}} @endif
				<div class="media-body align-self-center order-2">
					<h5>Description</h5>
					{!! $data['course']->description !!}
				</div>
			</div>
			@if ($data['course']->outline)
			<div class="Grey pt-5 pb-4">
				<div class="container">
					<div class="media Grey d-block d-md-flex mb-4">
						<img class="col-12 col-lg-3 col-md-4 align-self-center mb-4 ml-0 ml-md-4 mb-md-0 order-2 BoxShadow p-0" src="{{URL::to('/')}}/public/assets/theme/images/img-coachingplan.jpg"
						 alt="Coaching Plan">
						<div class="media-body align-self-center order-1">
							<h5>Outline</h5>
							{!! $data['course']->outline !!}
						</div>
					</div>
				</div>
			</div>
			@endif
			<?php $instructors = get_course_instructors_info($data['course']->instructor_ids); ?>
			<div class="container pt-5 pb-4">
				@foreach($instructors as $instructor)
					<div class="media d-block d-md-flex mb-4">
						@if($instructor->image && file_exists("public/assets/admin/images/instructor/".$instructor->image))
							{{HTML::image("public/assets/admin/images/instructor/".$instructor->image, $instructor->name, array("class"
                            => "col-12 col-lg-2 col-md-4 align-self-top mb-4 mr-0 mr-md-4 mb-md-0 order-1 BoxShadow p-0"))}} @endif
						<div class="media-body align-self-top order-2">
							<h5>Instructor</h5>
							{!! $instructor->bio !!}
						</div>
					</div>
				@endforeach
			</div>
			@php $duration = $data['course']->durations; 
@endphp @if ($duration)
			<div class="Grey pt-5 pb-4">
				<div class="container">
					<div class="media Grey d-block d-md-flex mb-4">
						<div class="media-body align-self-center order-1">
							<h5>Available Dates</h5>
							@foreach ($duration as $row) {{ $carbon::parse($row->start_date)->format('M d, Y').' - '.$carbon::parse($row->end_date)->format('M
							d, Y')}} <br> @endforeach
						</div>
					</div>
				</div>
			</div>
			@endif

	</section>
</main>
<div class="w-100 mb-5 mt-5 text-center">
	<a href="{{route('theme-course-payment', [$data['course']->id, Str::slug($data['course']->title, '-')])}}" target="_top" class="BtnBlue">Pay/{{ '$'.$data['course']->price }}</a>
	<a href="{{route('theme-course-request', [$data['course']->id, Str::slug($data['course']->title, '-')])}}" target="_top" class="BtnBlue">Request Info</a>
</div>
@endsection
 @push('css') 
@endpush @push('js') 
@endpush @push('metainfo')
<title>{{ $data['course']->title }}</title>
<meta name="description" content="{{ $data['course']->short_info }}" /> 
@endpush