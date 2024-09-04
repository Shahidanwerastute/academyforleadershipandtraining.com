@extends('theme.layouts.template')
@section('content')

<main id="main">
	<section class="pt-5">
		<div class="text-center">
			<h2>{!! $data['course']->title !!}</h2>
		</div>
		<div class="container pt-4 pb-4">
			@php $duration = $data['course']->durations; @endphp
			<div class="av-dates">
				<h5>Available Dates</h5>
				@if ($duration->count() > 0)
					@foreach ($duration as $row)
						@if ($row->start_date != $row->end_date)
							{{ $carbon::parse($row->start_date)->format('M d, Y').' - '.$carbon::parse($row->end_date)->format('M d, Y')}} <br>
						@else
							{{ $carbon::parse($row->start_date)->format('M d, Y') }} <br>
						@endif
					@endforeach
					@if ($data['course']->id == 16)
						
					@elseif ($data['course']->id == 18)
					
					@elseif ($data['course']->id == 20)

					@elseif ($data['course']->id == 21)

					@else
						9am-5pm (each day)
					@endif
				@else
					<p>Dates to be announced soon!</p>
				@endif
			</div>

			@if ($data['course']->day)
			<div class="av-dates">
				<h5>Duration</h5>
				<span>{{$data['course']->day}}</span>
			</div>
			@endif

			@if ($data['course']->location)
			<div class="av-dates">
				<h5>Location</h5>
				<span>{!!$data['course']->location!!}</span>
			</div>
			@endif

			@if(session()->has('course_coupon_percentage' . $data['course']->id))
				<br><p class="text-center">Congratulations! You've received a ${{number_format($data['course']->discount_price)}} discount!</p>
			@else
			{!! Form::open(array('route' => 'theme-coupon', 'class' => 'ajax_form')) !!}
			<div class="input-group coupon-apply">
				<input type="text" name="code" class="form-control" placeholder="Enter Coupon">
				<div class="input-group-btn">
					{{Form::hidden('course_id', $data['course']->id)}}
					<input name="submit" type="submit" class="btn btn-primary BtnBlue" value="Apply">
				</div>
			</div>
			{!! Form::close() !!}
			@endif

			<div class="w-100 mb-5 mt-5 text-center">
				@if($data['course']->price)
				<a href="{{route('theme-course-payment-personal-detail', [$data['course']->id, Str::slug($data['course']->title, '-')])}}" target="_top" class="BtnBlue form-group">To Pay By Credit Card or Paypal {{ '$'.number_format($data['course']->price) }}</a>&nbsp; &nbsp; &nbsp;
				@endif
				<a href="{{route('theme-course-registration-bankcheck', [$data['course']->id, Str::slug($data['course']->title, '-')])}}" target="_top" class="BtnBlue form-group">To Pay By Check {{ '$'.number_format($data['course']->price) }}</a>&nbsp; &nbsp; &nbsp;
				<a href="{{route('theme-course-request', [$data['course']->id, Str::slug($data['course']->title, '-')])}}" target="_top" class="BtnBlue form-group">Contact Us</a>
			</div>
			@php $videos = $data['course']->videos; @endphp
			@if ($videos->count() > 0)
			<div class="row embeded-videos">
				@foreach ($videos as $row)
				<div class="col-6">
					<div class="video-frame">
						<div class="frame-holder video-img-click"  data-iframe='<?php echo $row->embed_url; ?>'>
						<div class="video-icon"><a><i class="fas fa-play"></i></a></div>
							@if($data['course']->image && file_exists("public/assets/admin/images/course/".$data['course']->image)) {{HTML::image("public/assets/admin/images/course/".$data['course']->image,
							$data['course']->title, array("class" => "col-12 col-md-12 align-self-center"))}} @endif
						</div>
					</div>
				</div>
				@endforeach
			</div>
			@endif

			<div class="media d-block d-md-flex mb-4">
				<div class="media-body align-self-center order-1">
					<h5>Description</h5>
					{!! $data['course']->description !!}
				</div>
				@if($data['course']->image && file_exists("public/assets/admin/images/course/".$data['course']->image)) {{HTML::image("public/assets/admin/images/course/".$data['course']->image,
				$data['course']->title, array("class" => "col-12 col-md-4 align-self-center mb-4 ml-0 ml-md-4 mb-md-0 order-1
				BoxShadow p-0"))}} @endif
			</div>
			@if ($data['course']->outline)
			<div class="Grey pt-5 pb-4">
				<div class="container">
					<div class="media Grey d-block d-md-flex mb-4">
						<img class="col-12 col-lg-3 col-md-4 align-self-center mb-4 ml-0 ml-md-4 mb-md-0 order-2 BoxShadow p-0" src="{{URL::to('/')}}/public/assets/theme/images/img-coachingplan.jpg" alt="Coaching Plan">
						<div class="media-body align-self-center order-1">
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

	</section>
</main>


@include('alerts.success')
@include('alerts.error')
@endsection
@push('css')
{{HTML::style('public/assets/theme/css/alert.css')}}
@endpush
@push('js')
{{HTML::script('public/assets/assets/js/altair_admin_common.js')}}
{{HTML::script('public/assets/assets/js/pages/components_notifications.min.js')}}
{{HTML::script('public/assets/assets/js/uikit_custom.min.js')}}
@endpush

@push('metainfo')
<title>{{ $data['course']->title }}</title>
<meta name="description" content="{{ $data['course']->short_info }}" />
@endpush

