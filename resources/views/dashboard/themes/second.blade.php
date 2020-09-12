@extends('site.second.layouts.app')

@section('content')
    <!-- Content -->
    <div class="page-content bg-white">

        <!-- Slider -->
        <div class="main-slider style-two default-banner" id="home">
            <div class="tp-banner-container">
                <div class="tp-banner">
                    <div id="rev_slider_1175_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="duotone192" data-source="gallery" style="background-color:transparent;padding:0px;">
                        <!-- START REVOLUTION SLIDER 5.3.0.2 fullscreen mode -->
                        <div id="rev_slider_1175_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.3.0.2">
                            <ul>
                            @foreach($sliders as $index => $slider)
                                <!-- SLIDE  -->
                                    <li data-index="rs-{{ $index+3239 }}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="images/main-slider/slide20.jpg"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="300" data-fsslotamount="7" data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{ $slider->slider_image }}"  alt=""  data-lazyload="{{ $slider->slider_image }}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="3" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                        <div class="tp-caption tp-shape tp-shapewrapper " id="slide-100-layer"
                                             data-x="['center','center','center','center']"
                                             data-hoffset="['0','0','0','0']"
                                             data-y="['middle','middle','middle','middle']"
                                             data-voffset="['0','0','0','0']"
                                             data-width="full" data-height="full"
                                             data-whitespace="nowrap"
                                             data-type="shape"
                                             data-basealign="slide"
                                             data-responsive_offset="off"
                                             data-responsive="off"
                                             data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}]'
                                             data-textAlign="['left','left','left','left']"
                                             data-paddingtop="[0,0,0,0]"
                                             data-paddingright="[0,0,0,0]"
                                             data-paddingbottom="[0,0,0,0]"
                                             data-paddingleft="[0,0,0,0]"
                                             style="z-index: 2;background-color:rgba(0, 0, 0, 0.1);border-color:rgba(0, 0, 0, 0);border-width:0px; background-image:url({{ asset('site/images/overlay/rrdiagonal-line.png') }})"> </div>
                                        <!-- BACKGROUND VIDEO LAYER -->
                                        <div class="rs-background-video-layer"
                                             data-forcerewind="on"
                                             data-volume="mute"
                                             data-videowidth="100%"
                                             data-videoheight="100%"
                                             data-videomp4="{{ asset('site/images/background/bg-video.png') }}"
                                             data-videopreload="auto"
                                             data-videoloop="loop"
                                             data-aspectratio="16:9"
                                             data-autoplay="true"
                                             data-autoplayonlyfirsttime="false"
                                        ></div>
                                        <!-- LAYER NR. 1 -->
                                        @php
                                            $title = session('lang') . '_title';
                                            $desc = session('lang') . '_description';
                                        @endphp
                                        <div class="tp-caption   rs-parallaxlevel-4"
                                             id="slide-3239-layer-1"
                                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                             data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                             data-fontsize="['60','60','40','20']"
                                             data-lineheight="['75','70','50','30']"
                                             data-width="['720','640','480','300']"
                                             data-height="none"
                                             data-whitespace="normal"

                                             data-type="text"
                                             data-responsive_offset="off"
                                             data-responsive="off"
                                             data-frames='[{"from":"y:20px;sX:0.9;sY:0.9;opacity:0;","speed":1000,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                             data-textAlign="['center','center','center','center']"
                                             data-paddingtop="[0,0,0,0]"
                                             data-paddingright="[0,0,0,0]"
                                             data-paddingbottom="[0,0,0,0]"
                                             data-paddingleft="[0,0,0,0]"

                                             style="z-index: 5; min-width: 720px; max-width: 720px; white-space: normal; font-size: 60px; line-height: 70px;  color: rgba(255, 255, 255, 1.00);font-family:Poppins;border-width:0px; font-weight:600;">{!! $slider->$title !!} <br/> {!! $slider->$desc !!}
                                        </div>
                                    </li>
                                    <!-- SLIDE  -->
                                @endforeach
                            </ul>
                            <div class="tp-bannertimer" style="height: 8px; background-color: rgba(255, 255, 255, 0.25);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider END -->

        <!-- contact area -->
        <div class="content-block">
            <!-- Our Services -->
            <div class="section-full content-inner bg-gray">
                <div class="container">
                    <div class="row">
                        @foreach($services as $index => $service)
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
                            <div class="col-lg-4 col-md-6 col-sm-6 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                                <div class="dlab-box service-box-2">
                                    <div class="dlab-media radius-sm dlab-img-overlay1 dlab-img-effect rotate">
                                        <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}">
                                            <img src="{{ $service->service_image }}" alt="">
                                        </a>
                                    </div>
                                    <div class="dlab-info">
                                        <h4 class="title">
                                            <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}">
                                                {{ $service->$title }}
                                            </a>
                                        </h4>
                                        <p> {{ $service->$desc }} </p>
                                        <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}" class="site-button btnhover14">
                                            {{ __('home.read_more') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Our Services END -->

            <!-- About -->
            <div class="section-full content-inner-2 bg-primary wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s" style="background-image:url({{ asset('site/images/background/map-bg.png') }});">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center service-info">
                            <h2 class="title text-white">Amazing things happen to your business when we connect those dots of utility and value.</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About END -->

            <!-- About -->
            <div class="section-full content-inner bg-white">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
                            <div class="our-story">
                                <span> {{ __('home.about_us') }} </span>
                                <h4 class="title"> {{ __('home.about_us_description') }} </h4>
                                <p>
                                    @php $desc = session('lang') . '_description'; @endphp
                                    {{ $aboutUs->$desc }}
                                </p>
                                <a href="{{ url('about') }}" class="site-button btnhover14">{{ __('home.read_more') }}</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                            <img src="{{ $aboutUs->about_image }}" class="radius-sm" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Us End -->

            <!-- Contacts -->
            <!-- Call To Action -->
            <div class="section-full call-action style1 bg-primary wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 text-white">
                            @php $desc = session('lang'). '_description'; @endphp
                            <h2 class="title">{!! $contactUs->$desc !!} </h2>
                        </div>
                        <div class="col-lg-3 d-flex">
                            <a href="{{ url('contact-us') }}" class="site-button black align-self-center ml-auto btnhover14">{{ __('home.contact_us') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Call To Action End -->
            <!-- Contacts End -->

            <!-- Projects -->
            <div class="section-full content-inner-2 bg-gray wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                <div class="container">
                    <div class="section-head text-black text-center">
                        <h2 class="title">{{ __('home.our_projects') }}</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="img-carousel-dots-nav owl-theme owl-dots-none owl-carousel owl-btn-center-lr owl-btn-3">
                                @foreach($projects as $project)
                                    <div class="item">
                                        @php
                                            $title = session('lang') . '_title';
                                        @endphp
                                        <div class="dlab-box project-bx">
                                            <div class="dlab-media radius-sm dlab-img-overlay1 dlab-img-effect zoom">
                                                <a href="javascript:void(0)">
                                                    <img src="{{ $project->project_image }}" alt="">
                                                </a>
                                            </div>
                                            <div class="dlab-info">
                                                <h5 class="dlab-title"><a href="javascript:void(0)"> {{ $project->$title }} </a></h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Projects End -->

            <!-- Our Team -->
            <div class="section-full bg-white content-inner">
                <div class="container">
                    <div class="section-head text-black text-center">
                        <h2 class="title">{{ __('home.meet_team') }}</h2>
                    </div>
                    <div class="row dlab-team10-area">
                        @foreach($teamMembers as $teamMember)
                            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                                @php
                                    $name = session('lang') . '_name';
                                    $title = session('lang') . '_title';
                                @endphp
                                <div class="dlab-box m-b30 dlab-team10">
                                    <div class="dlab-media">
                                        <a href="javascript:void(0)">
                                            <img alt="" src="{{ $teamMember->member_image }}">
                                        </a>
                                    </div>
                                    <div class="dlab-info">
                                        <h4 class="dlab-title"><a href="javascript:void(0)">{{ $teamMember->$name }}</a></h4>
                                        <span class="dlab-position">{{ $teamMember->$title }}</span>
                                        <ul class="dlab-social-icon">
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
            <!-- Our Team End -->

            <!-- Testimonials blog -->
            <div class="section-full content-inner-2 bg-gray wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
                <div class="container">
                    <div class="section-head text-black text-center">
                        <h2 class="title">{{ trans('home.what_people_say') }}</h2>
                    </div>
                    <div class="testimonial-six owl-loaded owl-theme owl-carousel owl-none dots-style-2">
                        @foreach($testimonials as $testimonial)
                            <div class="item">
                                <div class="testimonial-8">
                                    @php
                                        $desc = session('lang') . '_description';
                                        $name = session('lang') . '_name';
                                        $title = session('lang') . '_title';
                                    @endphp
                                    <div class="testimonial-text">
                                        <p>{{ $testimonial->$desc }}</p>
                                    </div>
                                    <div class="testimonial-detail clearfix">
                                        <div class="testimonial-pic radius shadow"><img src="{{ $testimonial->testimonial_image }}" width="100" height="100" alt=""></div>
                                        <h5 class="testimonial-name m-t0 m-b5">{{ $testimonial->$name }}</h5> <span class="testimonial-position">{{ $testimonial->$title }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Testimonials blog End -->

            <!-- Latest Blogs -->
            <div class="section-full content-inner bg-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
                <div class="container">
                    <div class="section-head text-black text-center">
                        <h2 class="title">{{ __('home.latest_blog') }}</h2>
                    </div>
                    <div class="blog-carousel owl-carousel owl-btn-3 owl-btn-center-lr">
                        @foreach($blogs as $blog)
                            <div class="item">
                                @php
                                    $title = session('lang') . '_title';
                                    $author = session('lang') . '_author';
                                    $content = session('lang') . '_content';
                                @endphp
                                <div class="blog-post blog-grid blog-rounded blog-effect1">
                                    <div class="dlab-post-media dlab-img-effect rotate">
                                        <a href="{{ url('blogs/' . $blog->id .'/'.$blog->$title) }}">
                                            <img src="{{ $blog->blog_image }}" alt="">
                                        </a>
                                    </div>
                                    <div class="dlab-info p-a20 border-1">
                                        <div class="dlab-post-meta">
                                            <ul>
                                                <li class="post-date">
                                                    <strong>{{ $blog->created_at->format('d M') }}</strong>
                                                    <span> {{ $blog->created_at->format('Y') }}</span>
                                                </li>
                                                <li class="post-author"> {{ __('home.by') }} <a href="javascript:void(0);">{{ $blog->$author }}</a> </li>
                                            </ul>
                                        </div>
                                        <div class="dlab-post-title">
                                            <h4 class="post-title"><a href="{{ url('blogs/' . $blog->id .'/'.$blog->$title) }}"> {{ $blog->$title }} </a></h4>
                                        </div>
                                        <div class="dlab-post-text">
                                            {!!  substr($blog->$content, 0, 20) !!}
                                        </div>
                                        <div class="dlab-post-readmore">
                                            <a href="{{ url('blogs/' . $blog->id .'/'.$blog->$title) }}" title="{{ $blog->$title }}" rel="bookmark" class="site-button btnhover14">{{ __('home.read_more') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Latest News End -->

            <!-- Call To Action -->
            <div class="section-full call-action bg-primary wow fadeIn" data-wow-duration="2s" data-wow-delay="0.9s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 text-white">
                            @php $desc = session('lang').'_description';@endphp
                            <h2 class="title">{{ $aboutUs->$desc }} </h2>
                        </div>
                        <div class="col-lg-3 d-flex">
                            <a href="{{ url('contact-us') }}" class="site-button white align-self-center outline ml-auto outline-2 btnhover14">{{ __('home.contact_us') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Call To Action End -->

        </div>
    </div>
    <!-- Content END-->
@endsection

