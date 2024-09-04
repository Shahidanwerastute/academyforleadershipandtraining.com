@extends('theme.layouts.template')
@section('content')
<div id="BannerInner">
    <img src="{{URL::to('/')}}/public/assets/theme/images/banner-executive.jpg" alt="Executive Coaching" class="img-fluid w-100">
    <div class="caption">
        Courses
    </div>
</div>
<main id="main">
    <section id="MainServices">
        <div class="container text-center">
            <h2>EXPLORE TAFLAT'S SERVICES</h2>
            <p class="DarkBlue">Our focus is helping you achieve business goals, through the development of your employees.</p>
            <div class="row MarginBottom">
                <article class="col-xl-4 col-lg-4 mb-4 mb-lg-0">
                    <div class="BorderBox">
                        <span class="Leadrship_Training"></span>
                        <h5>CUSTOMIZED LEADERSHIP TRAINING</h5>
                        <p>Each company is unique, so your training programs should be unique, as well!</p>
                        <a href="{{route('theme-leadership-training')}}" class="readMore">Read More</a>
                    </div>
                </article>
                <article class="col-xl-4 col-lg-4 mb-4 mb-lg-0">
                    <div class="BorderBox">
                        <span class="Executive_Coaching"></span>
                        <h5>EXECUTIVE <br> COACHING</h5>
                        <p>Each company is unique, so your training programs should be unique, as well!</p>
                        <a href="{{route('theme-executive-coaching')}}" class="readMore">Read More</a>
                    </div>
                </article>
                <article class="col-xl-4 col-lg-4 mb-4 mb-lg-0">
                    <div class="BorderBox">
                        <span class="Organization_Consultant"></span>
                        <h5>ORGANIZATIONAL CONSULTING</h5>
                        <p>Each company is unique, so your training programs should be unique, as well!</p>
                        <a href="{{route('theme-consulting')}}" class="readMore">Read More</a>
                    </div>
                </article>
            </div>
        </div>
    </section>
</main>
@include('alerts.success')
@include('alerts.error')
@endsection
@push('css')

@endpush
@push('js')

@endpush
@push('metainfo')
<title>Courses</title>
<meta name="description" content="Courses" />
@endpush