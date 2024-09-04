@extends('theme.layouts.template')
@section('content')

    <div id="BannerInner">
        <img src="{{URL::to('/')}}/public/assets/theme/images/banner-consulting.jpg" alt="Banner Video Gallery"
             class="img-fluid w-100">
        <div class="caption small">
            Video Gallery
        </div>
    </div>

    <main id="main">
        <section class="video-gallery-wrap">
            <div class="container">
                <div class="row">

                    <?php
                    $videos = [
                        0 => [
                            'title' => 'Social Loafing',
                            'cover' => 'videos/Video_1_Social_Loafing/Social_Loafing_Thumbnail.jpg',
                            'video' => 'videos/Video_1_Social_Loafing/TAFLAT_QnA_Video_Series_V1Social_Loafing_02132023--v1.mp4',
                        ],
                        1 => [
                            'title' => 'What is Leadership Training',
                            'cover' => 'videos/Video_2_What_is_Leadership_Training/What_is_Leadership_Training_Thumbnail.jpg',
                            'video' => 'videos/Video_2_What_is_Leadership_Training/TAFLAT_QnA_Video_Series_V2What_is_Leadership_Training_Mar07--v1.mp4',
                        ],
                        2 => [
                            'title' => 'What is Executive Coaching',
                            'cover' => 'videos/Video_3_What_is_Executive_Coaching/What_is_Executive_Coaching_Thumbnail.png',
                            'video' => 'videos/Video_3_What_is_Executive_Coaching/TAFLAT_QnA_Video_Series_V3What_is_Executive_Coaching_May02--v1.mp4',
                        ],
                        3 => [
                            'title' => 'Why TAFLAT',
                            'cover' => 'videos/Video_4_Why_TAFLAT/Why_TAFLAT_Thumbnail.jpg',
                            'video' => 'videos/Video_4_Why_TAFLAT/TAFLAT_QnA_Video_Series_V4Why_TAFLAT_May03-v1.mp4',
                        ],
                        4 => [
                            'title' => 'How Can Leadership Training Help You',
                            'cover' => 'videos/Video_5_How_Can_Leadership_Training_Help_You/How_Can_Leadership_Training_Help_You_Thumbnail.jpg',
                            'video' => 'videos/Video_5_How_Can_Leadership_Training_Help_You/TAFLAT_QnA_Video_Series_V5_How_Can_Leadership_Training_Help_You_May03-v1.mp4',
                        ]
                    ];
                    ?>

                    @foreach($videos as $key => $video)
                        <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                            <div class="video-gallery-main-box">
                                <div class="video-gallery-image-box">
                                    <img src="{{URL::to('/')}}/public/{{$video['cover']}}"
                                         class="img-fluid" alt="">
                                </div>
                                <div class="video-gallery-desc-box cls_{{str_replace(' ', '-', strtolower($video['title']))}}">
                                    <h2>
                                        {{$video['title']}}
                                    </h2>
                                    <div class="video-icon-box">
                                        <a class="has-video" data-fancybox="gallery"
                                           href="{{URL::to('/')}}/public/{{$video['video']}}">
                                            <i class="fas fa-play"></i>
                                        </a>

                                    </div>
                                    <i class="fas fa-link copy_url" title="Click here to copy URL" onclick="copy_url('{{str_replace(' ', '-', strtolower($video['title']))}}');"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </main>

@endsection
@push('css')
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css"/>
    <style>
        .video-gallery-wrap {
            padding: 100px 0;
        }

        .video-gallery-main-box {
            box-shadow: 0 4px 10px #858383;
            text-align: center;
        }

        .video-gallery-desc-box {
            padding: 20px;
            position: relative;
            min-height: 158px;
        }

        .video-gallery-desc-box a {
            border: 2px solid #005598;
            padding: 5px 30px;
            display: inline-block;
            border-radius: 20px;
            color: #005598;
        }

        .video-gallery-desc-box h2 {
            font-size: 25px;
            padding-top: 4px;
        }
        .copy_url {
            color: #005598;
            cursor: pointer;
            font-size: 10px;
            position: absolute;
            top: 8px;
            right: 16px;
            border: 2px solid #005598;
            border-radius: 50%;
            padding: 2px;
        }
    </style>
@endpush
@push('js')
    {{--    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        document.querySelectorAll('[data-fancybox="gallery"]');

        function copy_url(slug) {
            var url = '{{route('theme-video-gallery') . '?v='}}' + slug;
            navigator.clipboard.writeText(url);
        }

        <?php if (isset($_REQUEST['v']) && $_REQUEST['v']) { ?>
            setTimeout(function () {
                $('.cls_{{$_REQUEST['v']}}').find('a.has-video').trigger('click');
            }, 500);
        <?php } ?>
    </script>
@endpush
@push('metainfo')
    <title>Video Gallery</title>
    <meta name="description" content="Video Gallery"/>
@endpush