@extends('site.fourth.layouts.app')

@section('content')
    <!-- Content -->
    <div class="page-content bg-white">

        <!-- Slider Banner -->
        <div class="main-slider">
            <div class="rev-slider-full" id="home">
                <div id="rev_slider_14_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="gravitydesign1" data-source="gallery" style="background:#fff;padding:0px;">
                    <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
                    <div id="rev_slider_14_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
                        <ul>	<!-- SLIDE  -->
                            @foreach($sliders as $index => $slider)
                                <li data-index="rs-100" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                @php
                                    $title = session('lang') . '_title';
                                    $desc = session('lang') . '_description';
                                @endphp
                                <!-- MAIN IMAGE -->
                                    <img src="{{ $slider->slider_image }}" data-bgcolor="#fff" style="background:#fff;" alt="" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                                    <!-- LAYERS -->
                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption tp-resizeme rs-parallaxlevel-1"
                                         id="slide-100-layer-2"
                                         data-x="['left','left','left','left']" data-hoffset="['-10','-40','-30','30']"
                                         data-y="['top','top','top','top']" data-voffset="['420','420','420','300']"
                                         data-fontsize="['22','22','20','18']"
                                         data-lineheight="['70','70','70','70']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-type="text"
                                         data-responsive_offset="on"
                                         data-frames='[{"delay":850,"speed":2000,"frame":"0","from":"sX:1.1;sY:1.1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                         data-textAlign="['center','center','center','center']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 6; white-space: nowrap; font-size: 22px; line-height: 28px; font-weight: 700; color:#fff;font-family: 'Poppins', sans-serif;">
                                        <div class="rs-looped rs-wave"  data-speed="3" data-angle="0" data-radius="2px" data-origin="50% 50%">Sale Car – Buy Car – Car Service</div>
                                    </div>
                                    <div class="tp-caption tp-resizeme rs-parallaxlevel-1"
                                         id="slide-100-layer-3"
                                         data-x="['left','left','left','left']"
                                         data-hoffset="['-10','-40','-30','30']"
                                         data-y="['top','top','top','top']"
                                         data-voffset="['150','165','165','120']"
                                         data-fontsize="['98','70','70','35']"
                                         data-lineheight="['240','240','240','240']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-type="text"
                                         data-responsive_offset="on"
                                         data-frames='[{"delay":1300,"speed":2000,"frame":"0","from":"sX:2;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                         data-textAlign="['left','center','center','center']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 6; white-space: nowrap; font-size: 205px; color:#fff; line-height: 240px; font-weight: 700; font-family: 'Poppins', sans-serif;">
                                        <div class="rs-looped rs-wave"  data-speed="3" data-angle="0" data-radius="2px" data-origin="50% 50%">Auto Mobile</div>
                                    </div>
                                    <div class="tp-caption tp-resizeme rs-parallaxlevel-1"
                                         id="slide-100-layer-6"
                                         data-x="['left','left','left','left']"
                                         data-hoffset="['-310','40','-40','40']"
                                         data-y="['bottom','bottom','bottom','bottom']"
                                         data-voffset="['-50','-50','-50','-50']"
                                         data-fontsize="['280','200','150','100']"
                                         data-lineheight="['240','240','240','150']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-type="text"
                                         data-responsive_offset="on"
                                         data-frames='[{"delay":1300,"speed":3000,"frame":"0","from":"sX:5;opacity:0;fb:90px;","to":"o:5;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":100,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                         data-textAlign="['left','center','center','center']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 6; white-space: nowrap; font-size: 180px; color:rgba(255,255,255,0.05); line-height: 240px; font-weight: 700; font-family: 'Poppins', sans-serif; ">
                                        <div class="rs-looped rs-wave"  data-speed="3" data-angle="0" data-radius="2px" data-origin="50% 50%">Industry</div>
                                    </div>
                                    <div class="tp-caption tp-resizeme rs-parallaxlevel-1"
                                         id="slide-100-layer-4"
                                         data-x="['left','left','left','left']"
                                         data-hoffset="['-10','-40','-30','30']"
                                         data-y="['top','top','top','top']"
                                         data-voffset="['250','250','250','170']"
                                         data-fontsize="['98','70','70','35']"
                                         data-lineheight="['240','240','240','240']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-type="text"
                                         data-responsive_offset="on"
                                         data-frames='[{"delay":1300,"speed":2000,"frame":"0","from":"sX:2;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                         data-textAlign="['left','center','center','center']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 6; white-space: nowrap; font-size: 205px; color:#fff; line-height: 240px; font-weight: 700; font-family: 'Poppins', sans-serif;">
                                        <div class="rs-looped rs-wave"  data-speed="3" data-angle="0" data-radius="2px" data-origin="50% 50%">Industry<span class="text-primary">.</span></div>
                                    </div>
                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption tp-resizeme rs-parallaxlevel-1"
                                         id="slide-100-layer-5"
                                         data-x="['left','left','left','left']" data-hoffset="['-10','-40','-30','30']"
                                         data-y="['top','top','top','top']" data-voffset="['490','485','485','360']"
                                         data-fontsize="['17','17','16','15']"
                                         data-lineheight="['28','28','28','28']"
                                         data-width="none"
                                         data-height="none"
                                         data-whitespace="nowrap"
                                         data-type="text"
                                         data-responsive_offset="on"
                                         data-frames='[{"delay":850,"speed":2000,"frame":"0","from":"sX:1.1;sY:1.1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 6; white-space: nowrap; font-size: 22px; line-height: 28px; font-weight: 400; color:#fff;font-family: 'Poppins', sans-serif;">
                                        <div class="rs-looped rs-wave"  data-speed="3" data-angle="0" data-radius="2px" data-origin="50% 50%">
                                            {!! $slider->$desc !!}</div>
                                    </div>
                                        <!-- LAYER NR. 8 -->
                                    <div class="tp-caption rev-btn rs-parallaxlevel-1"
                                         id="slide-100-layer-7"
                                         data-x="['left','left','left','left']" data-hoffset="['-10','-40','-30','-20']"
                                         data-y="['top','top','top','top']" data-voffset="['620','610','610','470']"
                                         data-fontsize="['16','16','16','16']"
                                         data-lineheight="['20','20','20','20']"
                                         data-width="['none','none','none','320']"
                                         data-height="none"
                                         data-whitespace="['nowrap','nowrap','nowrap','normal']"
                                         data-type="text"
                                         data-responsive_offset="on"
                                         data-frames='[{"delay":250,"speed":5000,"frame":"0","from":"y:100px;rZ:15deg;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                                         data-textAlign="['inherit','inherit','inherit','center']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]" style="z-index: 12; font-size: 16px;">
                                        <a href="{{ url('services') }}" class="site-button btnhover19 button-md outline outline-2 white">{{ __('home.our_services') }}</a>
                                    </div>
                                    <!-- LAYER NR. 8 -->
                                </li>
                                @if($index == 0)
                                    @break
                                @endif
                            @endforeach
                        </ul>
                        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>	</div>
                </div><!-- END REVOLUTION SLIDER -->
            </div>
        </div>
        <!-- Slider Banner -->

        <!-- contact area -->
        <div class="content-block">

            <!-- Our Services -->
            <div class="section-full content-inner bg-white" id="about">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="row">
                                    @foreach($services as $index => $service)
                                        <div class="col-lg-4 col-md-12 col-sm-6 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.3s">
                                            <div class="dlab-box-bg m-b30 box-hover style3" style="background-image: url({{ $slider->slider_image }})">
                                                <div class="icon-bx-wraper center p-lr20 p-tb30">
                                                    <div class="text-primary m-b20">
                                                        <span class="icon-cell icon-md"><i class="ti-user"></i></span>
                                                    </div>
                                                    <div class="icon-content">
                                                        @php
                                                            $title = session('lang') . '_title';
                                                            $desc = session('lang') . '_description';
                                                        @endphp
                                                        <h5 class="dlab-tilte">{{ $service->$title }} </h5>
                                                        <p>{{ $service->$desc }} </p>
                                                    </div>
                                                </div>
                                                <div class="icon-box-btn text-center">
                                                    <a href="{{ route('service.show', ['id'=> $service->id, 'title'=> $service->$title]) }}" class="site-button btn-block">{{ __('home.read_more') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        @if($index == 3)
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 m-b30 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
                                <div class="request-form dezPlaceAni">
                                    <div class="request-form-header">
                                        <i class="flaticon-message"></i>
                                        <p> {{ __('home.hesitate') }} </p>
                                        <h2> {{ __('home.contact_us') }} </h2>
                                    </div>
                                    <form action="{{ route('send.contact') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label>{{ __('home.full_name') }}</label>
                                                <input name="name" type="text" required="" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label>{{ __('home.email') }}</label>
                                                <input name="email" type="email" required="" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label>{{ __('home.phone') }}</label>
                                                <input name="phone" type="text" required="" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label>{{ __('home.message') }}</label>
                                                <textarea class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="site-button btnhover19 button-md btn-block">{{ __('home.send') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Our Services END -->

            <!-- Projects -->
            <div class="section-full" id="choose-us">
                    <div class="row m-lr0">
                        <div class="col-xl-6 col-lg-12 p-lr0 d-flex dis-tbl latest-project-info style1 bg-secondry wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.3s">
                            <div class="align-self-center text-white">
                                <div class="section-head text-white">
                                    <h2 class="title">{{ __('home.our_projects') }}</h2>
                                    <p>We’re continually working to change the way people think about and engage with our products.</p>
                                </div>
                                <ul class="list-check white list-2 rounded border">
                                    @foreach($projects as $project)
                                        <li>
                                            @php
                                                $title = session('lang') . '_title';
                                                $desc = session('lang') . '_description';
                                            @endphp
                                            <h4 class="m-b10">{{ $project->$title }}</h4>
                                            <p>{{ substr($project->$desc, 0, 30) }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 p-lr0 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.3s">
                            <div class="row spno">
                                <div class="col-lg-6 col-md-6 col-sm-6 bg-primary align-items-center d-flex">
                                    <div class="dlab-services-box text-white">
                                        <h2 class="service-year">32<small>year</small></h2>
                                        <h3 class="title m-b0">We are Building  the  Future and Restoring</h3>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <img class="img-cover" src="{{ asset('site/images/our-work/car/pic3.jpg') }}" alt="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="video-bx radius-no h100">
                                        <img src="{{ asset('site/images/our-work/car/pic4.jpg') }}" alt="Signature" class="img-cover"/>
                                        <div class="video-play-icon">
                                            <a href="https://www.youtube.com/watch?v=_FRZVScwggM" class="popup-youtube video bg-primary"><i class="fa fa-play"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 bg-secondry align-items-center d-flex">
                                    <div class="dlab-services-box text-white">
                                        <h3 class="title text-white m-b15">{{ __('home.about_us') }}</h3>
                                        <@php $desc = session('lang') . '_description'; @endphp
                                        {!! $aboutUs->$desc !!}
                                        <a href="{{ url('/about') }}" class="site-button btnhover19 outline white outline-2">{{ __('home.about_us') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <!-- Projects End -->

            <!-- Services -->
            <div class="section-full content-inner bg-gray" id="services">
                    <div class="container">
                        <div class="section-head text-black text-center">
                            <h2 class="title">{{ __('home.our_services') }}</h2>
                        </div>
                        <div class="row">
                            @foreach($services as $service)
                                <div class="col-lg-4 col-md-6 col-sm-12 m-b30 wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                                    @php
                                        $title = session('lang') . '_title';
                                        $desc = session('lang') . '_description';
                                    @endphp
                                    <div class="icon-bx-wraper bx-style-1 p-a30 center fly-box bg-white">
                                        <div class="icon-lg m-b20">
                                            <a href="{{ route('service.show', ['id'=> $service->id, 'title'=> $service->$title]) }}" class="icon-cell">
                                                <img src="{{ $service->service_image }}" alt=""/>
                                            </a>
                                        </div>
                                        <div class="icon-content">
                                            <h5 class="dlab-tilte text-uppercase">{{ $service->$title }}</h5>
                                            <p>{{ $service->$desc }}</p>
                                            <a href="{{ route('service.show', ['id'=> $service->id, 'title'=> $service->$title]) }}" class="site-button btnhover19">
                                                {{ __('home.read_more') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            <!-- Services -->

            <!-- Latest Blogs -->
            <div class="section-full content-inner bg-white" id="latestnews">
                    <div class="container">
                        <div class="section-head text-black text-center">
                            <h2 class="title">{{ __('home.latest_blog') }}</h2>
                        </div>
                        <div class="blog-carousel owl-carousel owl-btn-3 owl-btn-center-lr">
                            @foreach($blogs as $blog)
                                <div class="item wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                                    @php
                                        $title = session('lang') . '_title';
                                        $author = session('lang') . '_author';
                                        $content = session('lang') . '_content';
                                    @endphp
                                    <div class="blog-post blog-grid blog-rounded blog-effect1">
                                        <div class="dlab-post-media dlab-img-effect ">
                                            <a href="{{ url('blogs/' . $blog->id . '/' . $blog->$title) }}">
                                                <img src="{{ $blog->blog_image }}" alt="">
                                            </a>
                                        </div>
                                        <div class="dlab-info p-a20 border-1">
                                            <div class="dlab-post-meta ">
                                                <ul>
                                                    <li class="post-date">
                                                        <strong>{{ $blog->created_at->format('d M') }}</strong>
                                                        <span> {{ $blog->created_at->format('Y') }}</span>
                                                    </li>
                                                    <li class="post-author"> {{ __('home.by') . $blog->$author }} </li>
                                                </ul>
                                            </div>
                                            <div class="dlab-post-title">
                                                <h4 class="post-title"><a href="{{ url('blogs/' . $blog->id . '/' . $blog->$title) }}">{{ $blog->$title }}</a></h4>
                                            </div>
                                            <div class="dlab-post-text">
                                                {!!  substr($blog->$content, 0, 20) !!}
                                            </div>
                                            <div class="dlab-post-readmore">
                                                <a href="{{ url('blogs/' . $blog->id . '/' . $blog->$title) }}" title="READ MORE" rel="bookmark" class="site-button btnhover19">{{ __('home.read_more') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            <!-- Latest News End -->

            <!-- Our Team -->
            <div class="section-full bg-gray content-inner overlay-primary-dark bg-img-fix" id="team" style="background-image: url({{ asset('site/images/background/bg19.jpg') }});">
                    <div class="container">
                        <div class="section-head text-center text-white">
                            <h2 class="title"> {{ __('home.meet_team') }} </h2>
                        </div>
                        <div class="section-content">
                            <div class="row">
                                @foreach($teamMembers as $teamMember)
                                    <div class="col-lg-3 col-md-6 col-sm-6 wow bounceInLeft" data-wow-duration="2s" data-wow-delay="0.3s">
                                        <div class="dlab-box m-b30 dlab-team3">
                                            <div class="dlab-media">
                                                <a href="javascript:void(0)">
                                                    <img width="358" height="460" alt="" src="{{ $teamMember->member_image }}">
                                                </a>
                                            </div>
                                            <div class="dlab-info">
                                                @php
                                                    $name = session('lang') . '_name';
                                                    $title = session('lang') . '_title';
                                                @endphp
                                                <h4 class="dlab-title"><a href="javascript:void(0)">{{ $teamMember->$name }}</a></h4>
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
                </div>
            <!-- Our Team End -->

            <!-- Testimonials blog -->
            <div class="section-full content-inner bg-gray" id="client">
                    <div class="container">
                        <div class="section-head text-black text-center">
                            <h2 class="title">{{ __('home.happy_customers_said') }}</h2>
                        </div>
                        <div class="testimonial-six owl-loaded owl-theme owl-carousel owl-none dots-style-3">
                            @foreach($testimonials as $testimonial)
                                <div class="item wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                                    @php
                                        $desc = session('lang') . '_description';
                                        $name = session('lang') . '_name';
                                        $title = session('lang') . '_title';
                                    @endphp
                                    <div class="testimonial-8">
                                        <div class="testimonial-text">
                                            <p> {{ $testimonial->$desc }} </p>
                                        </div>
                                        <div class="testimonial-detail clearfix">
                                            <div class="testimonial-pic radius shadow"><img src="{{ $testimonial->testimonial_image }}" width="100" height="100" alt=""></div>
                                            <h5 class="testimonial-name m-t0 m-b5">{{ $testimonial->$name }}</h5> <span class="testimonial-position">{{ $testimonial->$title }}</span> </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            <!-- Testimonials blog End -->

            <!-- Call To Action -->
            <div class="section-full call-action bg-primary wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 text-white">
                                @php $desc = session('lang').'_description';@endphp
                                <h2 class="title">{{ $aboutUs->$desc }} </h2>
                            </div>
                            <div class="col-lg-3 d-flex">
                                <a href="{{ url('contact-us') }}" class="site-button btnhover19 white align-self-center outline ml-auto outline-2">{{ __('home.contact_us') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Call To Action End -->

        </div>

    </div>
    <!-- Content END-->
@endsection

