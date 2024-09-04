<style>
	.readMore.sold-out {
		border-color: red;
		background-color: red;
		color: #fff;
	}
</style>
@if(!$can_register)
	@php $results = courses(20, $can_register); @endphp
	<section id="TrainingCourses">
		<div class="container">
			<div class="text-center">
				<h2>Training Courses</h2>
			</div>
			<div class="row">
				@foreach($results as $row)
				<article class="col-lg-4 col-md-6 col-sm-12">
					<i class="{{ $row->icon }}"></i>
					<div class="text">
						<h6>{!! $row->title !!}</h6>
						<p>{!!Str::limit($row->description, 150, ' (...)')!!}</p>
						@if($row->can_register)
						<div class="clearfix"></div>
							@if ($row->is_sold_out == 1)
								<a href="javascript:void(0);"
								   class="readMore sold-out">Sold Out</a>
							@else
								<a href="{{route('theme-course-detail', [$row->id, Str::slug($row->title, '-')])}}"
								   class="readMore">Register</a>
							@endif
						@endif
					</div>
				</article>
				@endforeach
				<div class="w-100 text-center"><a href="{{ URL::to('/') }}/public/assets/theme/docs/TAFLAT-Leadership-Courses.pdf" tabindex="-1" target="_blank" class="BtnBlue">click here for Course Training</a></div>
			</div>
		</div>
	</section>

@else
	@php $results = courses(20, $can_register); @endphp
	<section id="Clients">
		<style>
			.card .card-title{height: auto;}
		</style>
		<div class="container text-center">
			<h2>Public Workshops</h2>
			<p class="DarkBlue"></p>
			<div class="row">
				@foreach($results as $row)
					<article class="col-lg-4 col-md-6 mg-row">
						<div class="card">
							<div class="img-holder">
								@if($row->image && file_exists("public/assets/admin/images/course/".$row->image)) 
									{{HTML::image("public/assets/admin/images/course/".$row->image, $row->title, array("class" => "card-img-top"))}} 
								@endif
							</div>
							<div class="card-body">
								<h4 class="card-title">{!! $row->title !!}</h4>
								<p class="card-des">{!!Str::limit($row->description, 150, ' (...)')!!}</p>
								@if ($row->is_sold_out == 1)
									<a href="javascript:void(0);" class="readMore collapsed mg-trigger sold-out">Sold Out</a>
								@else
									<a href="{{route('theme-course-detail', [$row->id, Str::slug($row->title, '-')])}}"
									   class="readMore collapsed mg-trigger">Register</a>
								@endif
							</div>
						</div>
					</article>
				@endforeach
			</div>
		</div>
	</section>
@endif