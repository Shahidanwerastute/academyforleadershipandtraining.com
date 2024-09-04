@extends('theme.layouts.template')
@section('content')

	<style>
		.box-shadow {
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			padding: 20px;
			margin: 10px 0;
			display: flex;
			flex-direction: column;
			justify-content: space-between;
			height: 100%;
		}
		.btn-read-more {
			align-self: center;
			margin-top: auto;
		}
		.row-eq-height {
			display: flex;
			flex-wrap: wrap;
		}
	</style>

	<div id="BannerInner">
		<img src="{{URL::to('/')}}/public/assets/theme/images/banner-blog.jpg" alt="Taflat Blog" class="img-fluid w-100">
		<div class="caption">
			Taflat Blog
		</div>
	</div>

	<main id="main">
		<section id="AboutJim">
			<div class="container">
				<div class="row">
					@if($data["blogs"])
						<div class="col-md-8">
							<div class="row row-eq-height">
								@foreach($data["blogs"] as $row)
									<div class="col-md-6 d-flex">
										<div class="box-shadow flex-fill">
											<h3>{{$row->title}}</h3>
											<p>
												<span class="Date"><strong>{{$carbon::parse($row->created_at)->format('m/d/Y')}}</strong></span>
												<a href="{{route('theme-blog-detail', [$row->id, str_replace(' ', '-', $row->title)]).'#goto'}}"
												   class="Comments float-right">
													<strong>{{$row->comments_count}} </strong>
													Comment
												</a>
											</p>
											@if($row->image_top && file_exists("public/assets/admin/images/blog/".$row->image_top))
												{{HTML::image("public/assets/admin/images/blog/".$row->image_top, $row->title, array("class" => "img-fluid d-block mb-3 ml-auto mr-auto"))}}
											@endif
											{!!$row->description_top!!}
											<a href="{{route('theme-blog-detail', [$row->id, str_replace(' ', '-', $row->title)])}}" class="btn btn-primary btn-read-more">Read More</a>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					@endif
					<div class="col-md-4 border-left">
						<h3>Author</h3>
						<p>Jim Glantz is the Managing Partner of The Academy For Leadership And Training (TAFLAT). A 20+
							year Executive of Organizational Development & Training, Jim holds a doctoral degree in
							Organizational Development and a Masters in Education from UCLA. Jim is an Associate Professor &
							the author of numerous articles.</p>

						<h3>Archives</h3>
						<ul>
							<li><a href="{{route('theme-blog', ['all'])}}">All Blogs</a></li>
							<!--<li><a href="#">July 2018 </a></li>
							<li><a href="#">April 2018 </a></li>
							<li><a href="#">December 2017 </a></li>
							<li><a href="#">November 2017 </a></li>-->
						</ul>

						<!--<h3>Categories</h3>
						<ul>
							<li><a href="#">All</a></li>
							<li><a href="#">Entrepreneurs </a></li>
							<li><a href="#">Executive </a></li>
							<li><a href="#">Coaching </a></li>
							<li><a href="#">Leaders </a></li>
							<li><a href="#">Leadership </a></li>
							<li><a href="#">Development </a></li>
							<li><a href="#">Organizational </a></li>
							<li><a href="#">Whiteboards </a></li>
						</ul>-->

					</div>
				</div>
			</div>
		</section>
	</main>
@endsection
@push('css')

@endpush
@push('js')	

@endpush
@push('metainfo')
	<title>TAFLAT Blog: Essential Workplace Communication Skills for Success</title>
	<meta name="description" content="Master these 10 crucial communication skills to excel in your career. Improve collaboration, leadership, and productivity at work."/>
@endpush