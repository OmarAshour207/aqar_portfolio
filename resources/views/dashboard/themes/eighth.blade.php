@extends('site.eighth.layouts.app')

@section('content')

    <!--hero section start-->
    <section class="banner p-0 pos-r fullscreen-banner">
        <div class="banner-slider owl-carousel no-pb" data-dots="false" data-nav="true">
        @foreach ($sliders as $index => $slider)
        <div class="item" data-bg-img="{{ $slider->slider_image }}">
            <div class="align-center p-0">
            <div class="container">
                <div class="row align-items-center">
                <div class="col-lg-7 col-md-12">
                    <div class="dark-bg p-5 xs-px-2 xs-py-2">
                    <h5 class="text-white mb-3 letter-space-3 animated6">{{ __('home.what_we_do') }}</h5>
                    @php
                        $title = session('lang') . '_title';
                        $desc = session('lang') . '_description';
                    @endphp
                    <h1 class="text-white mb-3 animated9">{!! $slider->$title !!}</h1>
                    <p class="lead text-white animated5 mb-3">
                        {!! $slider->$desc !!}
                    </p>
                    <a class="btn btn-theme btn-radius animated7" href="{{ url('about') }}"> {{ __('home.learn_more') }} </a>
                    <a class="btn btn-border btn-radius animated6" href="{{ url('contact-us') }}">{{ __('home.contact_us') }}</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        @if ($index == 1)
            @break
        @endif
        @endforeach
        </div>
    </section>
    <!--hero section end-->

    <!--body content start-->
    <div class="page-content">

        <!--about us start-->
        <section>
            <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-12">
                <img class="img-fluid rounded w-75" src="{{ $aboutUs->about_image }}" alt="">
                    <div class="theme-bg rounded p-4 mt-n5 z-index-1 w-75 mr-auto">
                        <div class="section-title mb-0">
                        <h2 class="mb-0 font-w-5 text-white">20+ Years Experience</h2>
                        </div>
                    </div>
                </div>
            <div class="col-lg-7 col-md-12 md-mt-5">
                <div class="section-title">
                <h6>{{ __('home.about_us') }}</h6>
                    <h2 class="title-2">{{ __('home.what_we_do') }}</h2>
                    @php
                        $desc = session('lang') . '_description';
                    @endphp
                    <p class="mb-0">{{ $aboutUs->$desc }}</p>
                </div>
                <div class="row no-gutters">
                    @foreach ($services as $index => $service)
                    <div class="col-md-6 col-sm-6 {{ $index != 0 ? 'mt-5' : '' }} ">
                        <div class="featured-item left-icon">
                        <div class="featured-icon"> <i class="flaticon-innovation text-theme"></i>
                        </div>
                        @php
                            $title = session('lang') . '_title';
                            $desc = session('lang') . '_description';
                        @endphp
                        <div class="featured-title text-uppercase">
                            <h5>{{ $service->$title }}</h5>
                        </div>
                        <div class="featured-desc">
                            <p>{{ substr($service->$desc, 0, 30) }}</p>
                        </div>
                        </div>
                    </div>
                    @endforeach
            </div>
                </div>
            </div>
            </div>
        </section>
        <!--about us end-->

        <!--service start-->
        <section class="text-center grey-bg">
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                <div class="section-title">
                    <h6>{{ __('home.our_services') }}</h6>
                    <h2 class="title-2">Amazing Services Provide</h2>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="owl-carousel owl-theme" data-items="3" data-md-items="2" data-sm-items="1" data-xs-items="1" data-margin="30">
                    @foreach ($services as $index => $service)
                    @php
                        $title = session('lang') . '_title';
                        $desc = session('lang') . '_description';
                    @endphp
                    <div class="item">
                        <div class="service-item">
                            <div class="service-images">
                            <img class="img-fluid" src="{{ $service->service_image }}" alt="">
                            <div class="service-icon"> <i class="flaticon-industrial-robot"></i>
                            </div>
                            </div>
                            <div class="service-description">
                            <h4> {{ $service->$title }} </h4>
                            <p> {{ substr($service->$desc, 0, 30) }} </p>
                            <a href="{{ route('service.show', ['id'=> $service->id, 'title'=> $service->$title]) }}">
                                {{ __('home.read_more') }} <i class="fas fa-arrow-left"></i>
                            </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                </div>
            </div>
            </div>
        </section>
        <!--service end-->


        <section class="theme-bg py-5 text-white">
            <div class="container">
                <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="counter style-4">
                    <span class="count-number" data-to="{{ $projects_count }}" data-speed="10000">{{ $projects_count }}</span>
                    <label>{{ __('admin.projects') }}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="counter style-4">
                    <span class="count-number" data-to="{{ $services_count }}" data-speed="10000">{{ $services_count }}</span>
                    <label>{{ __('admin.services') }}</label>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="counter style-4 md-mt-3">
                    <span class="count-number" data-to="{{ $team_count }}" data-speed="10000">{{ $team_count }}</span>
                    <label>{{ __('admin.team_members') }}</label>
                    </div>
                </div>
                </div>
            </div>
        </section>


        <!--project start-->

            <section>
                <div class="container">
                    <div class="row align-items-end mb-5">
                    <div class="col-lg-12 col-md-12">
                        <div class="section-title mb-0">
                        <h6>{{ __('home.our_projects') }}</h6>
                        <h2 class="title-2">{{ __('home.latest') }} {{ __('home.projects') }}</h2>
                        <p class="mb-0">Misto Provide Greate Services for elit. Excepturi vero aliquam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="grid row columns-3 no-gutters popup-gallery">
                        <div class="grid-sizer"></div>
                        @foreach ($projects as $index => $project)
                        <div class="grid-item">
                            @php
                                $title = session('lang') . '_title';
                            @endphp
                            <div class="portfolio-item">
                                <img src="{{ $project->project_image }}" alt="">
                                <div class="portfolio-hover">
                                    <div class="portfolio-title"> <span>{{ __('home.projects') }} - {{ $index+1 }} </span>
                                    <h4>{{ $project->$title }}</h4>
                                </div>
                                <div class="portfolio-icon">
                                    <a class="popup popup-img" href="{{ $project->project_image }}"> <i class="flaticon-magnifier"></i>
                                    </a>
                                </div>
                                </div>
                            </div>
                            </div>
                            @if ($index == 5)
                                @break
                            @endif
                        @endforeach

                        </div>
                    </div>
                    </div>
                </div>
            </section>

        <!--project end-->


        <!--testimonial start-->
            <section class="dark-bg">
                <div class="container">
                    <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel owl-theme" data-items="3" data-md-items="2" data-sm-items="2" data-autoplay="true">
                        @foreach ($testimonials as $index => $testimonial)
                        <div class="item">
                            <div class="testimonial style-3 mx-3 my-3">
                            <div class="testimonial-avatar">
                                <div class="testimonial-img">
                                <img class="img-center" src="{{ $testimonial->testimonial_image }}" alt="">
                                </div>
                            </div>
                            <div class="testimonial-content"> <span><i class="fas fa-quote-left"></i></span>
                            @php
                                $desc = session('lang') . '_description';
                                $name = session('lang') . '_name';
                                $title = session('lang') . '_title';
                            @endphp
                                <p> {{ $testimonial->$desc }} </p>
                                <div class="testimonial-caption">
                                <h6>{{ $testimonial->$name }} -</h6>
                                    <label>{{ $testimonial->$title }}</label>
                                </div>
                            </div>
                            </div>
                        </div>
                        @if ($index == 3)
                            @break
                        @endif
                        @endforeach
                        </div>
                    </div>
                    </div>
                </div>
            </section>
        <!--testimonial end-->


        <section class="dark-bg py-5" data-bg-img="{{ asset('site/part2/images/bg/01.jpg') }}" data-overlay="8">
            <div class="container">
                <div class="row align-items-center">
                <div class="col-md-8 col-sm-12">
                    <h2 class="text-white">{{ __('home.convert_idea') }} <span class="text-theme font-weight-bold"> {{ __('home.for_your_company') }} </span></h2>
                </div>
                <div class="col-md-4 col-sm-12 text-md-left sm-mt-3"> <a href="{{ url('contact-us') }}" class="btn btn-theme"><span>{{ __('admin.contact_us') }}</span></a>
                </div>
                </div>
            </div>
        </section>


        <!--team start-->
            <section>
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                            <div class="section-title">
                                <h2 class="title">{{ __('home.meet_team') }}</h2>
                                <p class="mb-0">Misto Engineers Services for elit. Excepturi vero aliquam id. Lorem
                                    ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($teamMembers as $index => $teamMember)
                            <div class="col-lg-4 col-md-12 {{ $index != 0 ? 'md-mt-5' : '' }}">
                                <div class="team-member text-center style-2">
                                    <div class="team-images">
                                        <img class="img-fluid" src="{{ $teamMember->member_image }}" alt="">
                                    </div>
                                    @php
                                    $title = session('lang') . '_title';
                                    $name = session('lang') . '_name';
                                    @endphp
                                    <div class="team-description"> <span>{{ $teamMember->$name }}</span>
                                        <h5><a href="#">{{ $teamMember->$title }}</a></h5>
                                        <div class="team-social-icon">
                                            <ul>
                                                <li>
                                                    <a href="{{ setting('facebook') }}"><i
                                                            class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ setting('twitter') }}"><i class="fab fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ setting('instagram') }}"><i class="fab fa-instagram"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($index == 2)
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
        <!--team end-->


        <!--blog start-->
            <section>
            <div class="container">
                <div class="row text-center">
                <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                    <div class="section-title">
                    <h2 class="title">{{ __('home.latest') }} <span> {{ __('home.news') }}</span></h2>
                    <p class="mb-0">Misto Provide Greate Services for elit. Excepturi vero aliquam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
                </div>
                <div class="row align-items-center">
                @foreach ($blogs as $index => $blog)
                <div class="col-lg-5">
                    @php
                    $title = session('lang') . '_title';
                    $content = session('lang') . '_content';
                    @endphp
                    <div class="post style-2">
                    <div class="post-image">
                        <img src="{{ $blog->blog_image }}" alt="">
                        <div class="post-date">{{ $blog->created_at->format('d M y') }}</div>
                    </div>
                    <div class="post-desc">
                        <div class="post-title">
                        <h5>
                            <a href="{{ url('blogs/' . $blog->id . '/' . $blog->$title) }}">
                            {{ $blog->$title }}
                            </a>
                        </h5>
                        </div>
                        <p>{!! $blog->$content !!}</p>
                        <a class="post-btn" href="{{ url('blogs/' . $blog->id . '/' . $blog->$title) }}">{{ __('home.read_more') }}<i class="mr-2 fas fa-long-arrow-alt-left"></i></a>
                    </div>
                    </div>
                </div>
                @if ($index == 0)
                    @break
                @endif
                @endforeach
                <div class="col-lg-7 md-mt-5">
                    @foreach ($blogs as $index => $blog)
                    @php
                    $title = session('lang') . '_title';
                    $content = session('lang') . '_content';
                    @endphp
                        @if ($index > 0)
                        <div class="post style-2 {{ $index == 2 ? 'mt-5' : '' }} ">
                        <div class="row no-gutters row-eq-height">
                            <div class="col-md-6">
                            <div class="post-image">
                                <img class="h-100" src="{{ $blog->blog_image }}" alt="">
                                <div class="post-date">{{ $blog->created_at->format('d M y') }}</div>
                            </div>
                            </div>
                            <div class="col-md-6 align-item-middle white-bg">
                            <div>
                                <div class="post-desc">
                                <div class="post-title">
                                    <h5>
                                    <a href="{{ url('blogs/' . $blog->id . '/' . $blog->$title) }}">
                                        {{ $blog->$title }}
                                    </a>
                                    </h5>
                                </div>
                                <p> {!! $blog->$content !!} </p>
                                <a class="post-btn" href="{{ url('blogs/' . $blog->id . '/' . $blog->$title) }}">{{ __('home.read_more') }}<i class="mr-2 fas fa-long-arrow-alt-left"></i></a>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        @endif
                        @if ($index == 2)
                            @break
                        @endif
                    @endforeach
                </div>
                </div>
            </div>
            </section>
        <!--blog end-->


    </div>

    <!--body content end-->
@endsection
