@push('styles')
    <style>
        .swiper-container {
            width: 100%;
            height: 100%;

        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
        .swiper-wrapper .swiper_img {
            width: 100%;
            height: 700px;
        }
        .swiper_title {
            position: fixed;
            color: white;
            width: 250px;
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 50px;
        }
        .swiper_desc {
            position: fixed;width: 500px;text-align: center;margin-top: 25px;padding-top: 100px;
        }
    </style>
@endpush

@extends('site.first.layouts.app')

@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- Slider main container -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                    <div class="swiper-slide">
                        @php
                            $title = session('lang') . '_title';
                            $desc = session('lang') . '_description';
                        @endphp
                        <img src="{{ $slider->slider_image }}" class="swiper_img">
                        <div class="text-white swiper_title">
                            {!! $slider->$title !!}
                        </div>
                        <div class="text-white swiper_desc">
                            {!! $slider->$desc !!}
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <!-- contact area -->
        <div class="content-block">
            <!-- About Company -->
            <div class="section-full bg-gray content-inner about-carousel-ser">
                <div class="container">
                    <div class="section-head text-center">
                        @php $desc = session('lang') . '_description'; @endphp
                        {!! $aboutUs->$desc !!}
                    </div>

                    <div class="about-ser-carousel owl-carousel owl-theme owl-btn-center-lr owl-dots-primary-full owl-btn-3 m-b30 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                        @foreach($projects as $project)
                            <div class="item">
                                <div class="dlab-box service-media-bx">
                                    <div class="dlab-media">
                                        <a href="javascript:void(0)">
                                            <img src="{{ $project->project_image }}" class="lazy" data-src="{{ $project->project_image }}" alt=""></a>
                                    </div>
                                    <div class="dlab-info text-center">
                                        @php
                                            $title = session('lang') . '_title';
                                            $desc = session('lang') . '_description';
                                        @endphp
                                        <h2 class="dlab-title"><a href="#"> {{ $project->$title }} </a></h2>
                                        <p> {{ substr($project->$desc, 0, 30) }}  </p>
                                        <a href="javascript:void(0)" class="site-button btnhover13">{{ __('home.read_more') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- About Company END -->

            <!-- Contacts  -->
            <div class="section-full bg-img-fix content-inner-2 overlay-black-dark contact-action style2" style="background-image:url({{ asset('site/images/background/bg2.jpg') }});">
                <div class="container">
                    <div class="row relative">
                        <div class="col-md-12 col-lg-8 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="contact-no-area">
                                @php $desc = session('lang').'_description';@endphp
                                <h2 class="title"> {{ $aboutUs->$desc }} </h2>
                                <div class="contact-no">
                                    <div class="contact-left">
                                        <h3 class="no"><i class="sl-call-in"></i>{{ setting('phone') }}</h3>
                                    </div>
                                    <div class="contact-right">
                                        <a href="javascript:void(0)" class="site-button appointment-btn btnhover13"> {{ __('home.contact_us') }} </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 contact-img-bx wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                            <img src="{{ $aboutUs->about_image }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contacts END -->

            <!-- Our Services -->
            <div class="section-full bg-gray content-inner">
                <div class="container">
                    <div class="section-head text-center">
                        <h2 class="title"> {{ trans('home.our_services') }} </h2>
                        <p>{{ trans('home.lorem_ipsum') }}</p>
                    </div>
                    <div class="section-content row">
                        @foreach($services as $index => $service)
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
                            <div class="col-md-6 col-lg-4 col-sm-12 service-box style3 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                                <div class="icon-bx-wraper" data-name="0{{ $index+1 }}">
                                    <div class="icon-lg">
                                        <a href="javascript:void(0)" class="icon-cell"><i class="flaticon-robot-arm"></i></a>
                                    </div>
                                    <div class="icon-content">
                                        <h2 class="dlab-tilte">{{ $service->$title }}</h2>
                                        <p> {{ $service->$desc }} </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Our Services End -->

            <!-- Company staus -->
            <div class="section-full text-white bg-img-fix content-inner overlay-black-dark counter-staus-box" style="background-image:url({{ asset('site/images/background/bg4.jpg') }});">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="section-head text-white">
                                <a href="https://www.youtube.com/watch?v=_FRZVScwggM" class="popup-youtube video play-btn"><span><i class="fa fa-play"></i></span>Play Now</a>
                                <h2 class="title">{{ trans('home.stat_description') }}</h2>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="row sp20">
                                <div class="col-md-4 col-sm-4 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                                    <div class="icon-bx-wraper center counter-style-5">
                                        <div class="icon-xl m-b20">
                                            <span class="icon-cell"><i class="flaticon-worker"></i></span>
                                        </div>
                                        <div class="icon-content">
                                            <div class="dlab-separator bg-primary"></div>
                                            <h2 class="dlab-tilte counter">1226</h2>
                                            <p>{{ trans('home.happy_client') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                                    <div class="icon-bx-wraper center counter-style-5">
                                        <div class="icon-xl m-b20">
                                            <span class="icon-cell"><i class="flaticon-settings"></i></span>
                                        </div>
                                        <div class="icon-content">
                                            <div class="dlab-separator bg-primary"></div>
                                            <h2 class="dlab-tilte counter">1552</h2>
                                            <p>{{ trans('home.workers_hand') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                                    <div class="icon-bx-wraper center counter-style-5">
                                        <div class="icon-xl m-b20">
                                            <span class="icon-cell"><i class="flaticon-conveyor-1"></i></span>
                                        </div>
                                        <div class="icon-content">
                                            <div class="dlab-separator bg-primary"></div>
                                            <h2 class="dlab-tilte counter">1156</h2>
                                            <p>{{ trans('home.active_experts') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Company staus End -->

            <!-- Team member -->
            <div class="section-full bg-gray content-inner">
                <div class="container">
                    <div class="section-head text-center ">
                        <h2 class="title">{{ trans('home.meet_team') }}</h2>
                        <p>{{ trans('home.lorem_ipsum') }}</p>
                    </div>
                    <div class="row">
                        @foreach($teamMembers as $teamMember)
                            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                                <div class="dlab-box m-b30 dlab-team1">
                                    <div class="dlab-media">
                                        <a href="team-1.html">
                                            <img width="358" height="460" alt="" src="{{ $teamMember->member_image }}" class="lazy" data-src="{{ $teamMember->member_image }}">
                                        </a>
                                    </div>
                                    <div class="dlab-info">
                                        @php
                                            $name = session('lang') . '_name';
                                            $title = session('lang') . '_title';
                                        @endphp
                                        <h4 class="dlab-title">{{ $teamMember->$name }}</h4>
                                        <span class="dlab-position">{{ $teamMember->$title }}</span>
                                        <ul class="dlab-social-icon dez-border">
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Team member End -->

            <!-- Testimonials blog -->
            <div class="section-full overlay-black-middle bg-secondry content-inner-2 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s" style="background-image:url({{ asset('site/images/background/map-bg.png') }});">
                <div class="container">
                    <div class="section-head text-white text-center">
                        <h2 class="title">{{ trans('home.what_people_say') }}</h2>
                        <p> {{ trans('home.lorem_ipsum') }} </p>
                    </div>
                    <div class="section-content">
                        <div class="testimonial-two-dots owl-carousel owl-none owl-theme owl-dots-primary-full owl-loaded owl-drag">
                            @foreach($testimonials as $testimonial)
                                <div class="item">
                                    <div class="testimonial-15 text-white">
                                        <div class="testimonial-text quote-left quote-right">
                                            @php
                                                $desc = session('lang') . '_description';
                                                $name = session('lang') . '_name';
                                                $title = session('lang') . '_title';
                                            @endphp
                                            <p>{{ $testimonial->$desc }}</p>
                                        </div>
                                        <div class="testimonial-detail clearfix">
                                            <div class="testimonial-pic radius shadow"><img src="{{ $testimonial->testimonial_image }}" width="100" height="100" alt=""></div>
                                            <strong class="testimonial-name">{{ $testimonial->$name }}</strong> <span class="testimonial-position">{{ $testimonial->$title }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonials blog End -->

            <!-- Latest blog -->
            <div class="section-full content-inner bg-gray wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
                <div class="container">
                    <div class="section-head text-center">
                        <h2 class="title"> {{ trans('home.latest_blog') }} </h2>
                        <p>{{ trans('home.lorem_ipsum') }}</p>
                    </div>
                    <div class="blog-carousel owl-none owl-carousel">
                        @foreach($blogs as $blog)
                            <div class="item">
                                @php
                                    $title = session('lang') . '_title';
                                    $author = session('lang') . '_author';
                                    $content = session('lang') . '_content';
                                @endphp
                                <div class="blog-post post-style-1">
                                    <div class="dlab-post-media dlab-img-effect rotate">
                                        <a href="javascript:void(0)"><img src="{{ $blog->blog_image }}" alt=""></a>
                                    </div>
                                    <div class="dlab-post-info">
                                        <div class="dlab-post-meta">
                                            <ul>
                                                <li class="post-date">
                                                    <strong>{{ $blog->created_at->format('d M') }}</strong>
                                                    <span> {{ $blog->created_at->format('Y') }}</span>
                                                </li>
                                                <li class="post-author"> {{ __('home.by') . $blog->$author }} </li>
                                            </ul>
                                        </div>
                                        <div class="dlab-post-title">
                                            <h3 class="post-title"><a href="{{ url('blogs/' . $blog->id .$blog->$title) }}">{!!  substr($blog->$content, 0, 20) !!}</a></h3>
                                        </div>
                                        <div class="dlab-post-readmore">
                                            <a href="javascript:void(0)" title="READ MORE" rel="bookmark" class="site-button btnhover13">{{ __('home.read_more') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Latest blog END -->
        </div>
    </div>
    <!-- Content END-->
@endsection

@push('scripts')
    <script>
        var swiper = new Swiper('.swiper-container', {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        $(document).ready(function () {
            $('a').on('click', function(e) {
                if (!$(this).hasClass('allowedLink')) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endpush
