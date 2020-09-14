@extends('site.first.layouts.app')

@section('content')
    <!-- start main banner -->
    <section class="hero pt-0">
        <div class="main-banner">
            <div class="slideshow-container">
                @foreach($sliders as $index => $slider)
                <div class="mySlides fade">
                    <a href="">
                        <img src="{{ $slider->slider_image }}">
                    </a>
                    <!--        <div class="text">Caption Text</div>-->
                </div>
                @endforeach
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>


            </div>
            <style>
                .mySlides {
                    clip-path: polygon(50% 0%, 81% 0, 100% 0, 100% 65%, 50% 100%, 0 78%, 0 0, 18% 0);
                }

                .slideshow-container img {
                    vertical-align: middle;
                    height: 100%;
                    object-fit: cover;
                    width: 100%;
                }
                .slideshow-container {

                    max-width:100%;
                    height: 100%;
                    position: relative;
                    margin: auto;
                }
                .prev, .next {
                    cursor: pointer;
                    position: absolute;
                    top: 50%;

                    width: auto;
                    padding: 16px;
                    margin-top: -22px;
                    color: white;
                    font-weight: bold;
                    font-size: 18px;
                    transition: 0.6s ease;
                    border-radius: 0 3px 3px 0;
                    user-select: none;
                }
                .next {
                    right: 0;
                    border-radius: 3px 0 0 3px;
                }
                .prev:hover, .next:hover {
                    background-color: rgba(0, 0, 0, 0.72);
                }
                .text {
                    color: white;
                    font-size: 110%;
                    padding: 13px;
                    position: absolute;
                    bottom: 0;
                    width: 100%;
                    background: rgba(14, 15, 16, 0.67);;
                    text-align: center;
                }
                .dot {
                    cursor: pointer;
                    height: 3px;
                    width: 20px;
                    margin: 0 2px;
                    background-color: #e1e1e1;
                    display: inline-block;
                    transition: background-color 0.6s ease;
                }
                .active, .dot:hover {
                    background-color: black;
                }
                .fade {
                    -webkit-animation-name: fade;
                    -webkit-animation-duration: 1.5s;
                    animation-name: fade;
                    animation-duration: 1.5s;
                }
                @-webkit-keyframes fade {
                    from {opacity: .4}
                    to {opacity: 1}
                }
                @keyframes fade {
                    from {opacity: .4}
                    to {opacity: 1}
                }
                @media only screen and (max-width: 300px) {
                    .prev, .next,.text {font-size: 11px}
                }
            </style>
            <script>
                var slideIndex = 1;
                showSlides(slideIndex);

                function plusSlides(n) {
                    showSlides(slideIndex += n);
                }

                function currentSlide(n) {
                    showSlides(slideIndex = n);
                }

                function showSlides(n) {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("dot");
                    if (n > slides.length) {slideIndex = 1}
                    if (n < 1) {slideIndex = slides.length}
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex-1].style.display = "block";
                    dots[slideIndex-1].className += " active";
                }
            </script>
        </div>

        <!-- start main header -->
        <div class="nav-container aos-init aos-animate" data-aos="fade-down">
            <nav id="menu1">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-8">
                            <div class="">
                                <a href="{{ url('/') }}">
                                    <img class="img-fluid logo" alt="Elements" src="{{ getLogo() }}" style="max-width: 97px;"/>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-12 text-right hidden-md hidden-sm hidden-xs d-flex justify-content-end align-items-center">
                            <div class="bar__module">
                                <ul class="menu-horizontal text-left">
                                    <li><a href="{{ url('/') }}">{{ __('home.home') }}</a></li>
                                    <li>
                                        <div class="dropdown">
                                            <a class="dropbtn" href="#">
                                                <i class="fa fa-arrow-circle-down"></i>{{ __('home.about_us') }}
                                            </a>
                                            <div class="dropdown-content">
                                                @php
                                                    $title = session('lang') . '_title';
                                                @endphp
                                                @foreach($abouts as $about)
                                                    <a href="{{ url('about?tab='.$about->$title) }}">{{ $about->$title }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="dropdown">
                                            <a class="dropbtn" href="{{ url('services') }}">
                                                <i class="fa fa-arrow-circle-down"></i> {{ __('home.our_services') }}
                                            </a>
                                            <div class="dropdown-content">
                                                @php
                                                    $title = session('lang') . '_title';
                                                @endphp
                                                @foreach($header_services as $index => $service)

                                                    <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}">
                                                        {{ $service->$title }} <i class="fa fa-chevron-circle-right"></i>
                                                    </a>
                                                    @for($i = 0;$i < count($subCategory); $i++)
                                                        @foreach($subCategory[$i] as $index => $sub)
                                                            @if($index == $service->id)
                                                                @php
                                                                    $allValue = explode('-', $sub);
                                                                    $id = $allValue[1];
                                                                    $name = $allValue[0];
                                                                @endphp
                                                                <a href="{{ route('service.show', ['id' => $id, 'title' => $name]) }}" class="ml-4">
                                                                    {{ $name }}
                                                                </a>
                                                            @endif
                                                        @endforeach
                                                    @endfor
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>

                                    <li><a href="{{ url('projects') }}">{{ __('home.our_projects') }}</a></li>

                                    <li><a href="{{ url('blogs') }}">{{ __('home.blogs') }}</a></li>
                                    <li><a href="{{ url('contact-us') }}">{{ __('admin.contact_us') }}</a></li>
                                    <li>
                                        <div class="dropdown">
                                            <a class="dropbtn" href="#">
                                                <i class="fa fa-arrow-circle-down"></i> {{ __('admin.languages') }}
                                            </a>
                                            <div class="dropdown-content">
                                                <a href="{{ url('lang/ar') }}">{{ __('home.arabic') }}</a>
                                                <a href="{{ url('lang/en') }}">{{ __('home.english') }}</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-4 text-right hidden-lg">
                            <a href="javascript:void(0)" class="text-white menu-open">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- end main header -->

        <!-- start side menu -->
        <div class="menu hidden-lg">
            <div class="container">
                <div class="row bar bar--sm bar-1">
                    <div class="col-lg-3 col-md-6 col-sm-8 col-8">
                        <div class="">
                            <a href="{{ url('/') }}">
                                <img class="img-fluid" alt="logo" src="{{ getLogo() }}">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-sm-4 col-4 text-right">
                        <a href="javascript:void(0)" class="menu-close text-white">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                </div>
                <ul class="nav flex-column mt-5 lead text-center">
                    <li class="my-2"><a href="{{ url('/') }}">{{ __('home.home') }}</a></li>
                    <li class="my-2">
                        <div class="dropdown">
                            <a class="dropbtn" href="#">
                                <i class="fa fa-arrow-circle-down"></i>{{ __('home.about_us') }}
                            </a>
                            <div class="dropdown-content">
                                @php
                                    $title = session('lang') . '_title';
                                @endphp
                                @foreach($abouts as $about)
                                    <a href="{{ url('about?tab='.$about->$title) }}">{{ $about->$title }}</a>
                                @endforeach
                            </div>
                        </div>
                    </li>

                    <li class="my-2">
                        <div class="dropdown">
                            <a class="dropbtn" href="{{ url('services') }}">
                                <i class="fa fa-arrow-circle-down"></i> {{ __('home.our_services') }}
                            </a>
                            <div class="dropdown-content">
                                @php
                                    $title = session('lang') . '_title';
                                @endphp
                                @foreach($header_services as $index => $service)

                                    <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}">
                                        {{ $service->$title }} <i class="fa fa-chevron-circle-right"></i>
                                    </a>
                                    @for($i = 0;$i < count($subCategory); $i++)
                                        @foreach($subCategory[$i] as $index => $sub)
                                            @if($index == $service->id)
                                                @php
                                                    $allValue = explode('-', $sub);
                                                    $id = $allValue[1];
                                                    $name = $allValue[0];
                                                @endphp
                                                <a href="{{ route('service.show', ['id' => $id, 'title' => $name]) }}" class="ml-4">
                                                    {{ $name }}
                                                </a>
                                            @endif
                                        @endforeach
                                    @endfor
                                @endforeach
                            </div>
                        </div>
                    </li>

                    <li class="my-2"><a href="{{ url('projects') }}">{{ __('home.our_projects') }}</a></li>

                    <li class="my-2"><a href="{{ url('blogs') }}">{{ __('home.blogs') }}</a></li>
                    <li class="my-2"><a href="{{ url('contact-us') }}">{{ __('admin.contact_us') }}</a></li>
                    <li class="my-2">
                        <div class="dropdown">
                            <a class="dropbtn" href="#">
                                <i class="fa fa-arrow-circle-down"></i> {{ __('admin.languages') }}
                            </a>
                            <div class="dropdown-content">
                                <a href="{{ url('lang/ar') }}">{{ __('home.arabic') }}</a>
                                <a href="{{ url('lang/en') }}">{{ __('home.english') }}</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end side menu -->

        <!-- start main banner content-->
        <div class="container">

            <div class="row align-items-center justify-content-around banner-content" data-aos="fade-up">
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-8 text-center banner-line">
                    @php
                        $title = session('lang') . '_title';
                    @endphp
                    <h1 class="font-weight-bold">
                        @foreach($sliders as $index => $slider)
                            <a href="{{ url('/') }}" class="typewrite text-white" data-period="2000" data-type='[ "{{ $slider->$title }}" ]'>
                                <span class="wrap">&nbsp;</span>
                            </a>
                            @if($index == 0)
                                @break
                            @endif
                        @endforeach
                    </h1>
                    <p class="lead text-white">
                        @php
                            $desc = session('lang') . '_description';
                        @endphp
                        @foreach($sliders as $index => $slider)
                            {{ $slider->$desc }}
                            @if($index == 0)
                                @break
                            @endif
                        @endforeach
                    </p>

                </div>
            </div>
        </div>
    </section>
    <!-- end main banner -->
    <!-- start service section -->
    <section class="bg--secondary cms-tech pb-0">
        <div class="container">
            <div class="row  mt-5">
                <div class="col-lg-5 mt-10">
                    <p class="mb-0 text-orange font-weight-bold type--uppercase tiny-title">{{ __('admin.services') }}</p>
                    <h1>
                        {{ __('home.about_us') }}
                    </h1>
                    @php
                        $desc = session('lang') . '_description';
                    @endphp
                    <p class="text-justify"> {{ $aboutUs->$desc }} </p>
                    <a class="btn btn--primary type--uppercase" href="{{ url('about') }}">
                            <span class="btn__text">
                        {{ __('home.learn_more_about_us') }}
                        </span>
                    </a>
                </div>
                <div class="col-lg-1 col-md-1 mt-10 "></div>
                <div class="col-lg-6 col-md-12 mt-11 ">
                    <div class="row">
                        <h1 style="
                                float: right;
                                text-align: center;
                                direction: rtl;
                                margin-top:142px;
                                color: #ed0242;">
                            {{ __('home.innovative_services') }}
                        </h1>
                        <iframe id="player" type="text/html" width="640" height="390"
                                src="http://www.youtube.com/embed/M7lc1UVf-VE?enablejsapi=1&origin=http://example.com"
                                frameborder="0"></iframe>
                    </div>
                </div>

            </div>
            <!--end of masonry-->
        </div>
        <!--end of container-->
    </section>
    <!-- end service section -->


    <!-- start service section -->
    @if(in_array('our_services', $page_filter))
    <section class="bg--secondary cms-tech pb-0">
        <div class="container">
            <div class="row  mt-5">
                <div class="col-lg-4 mt-10">
                    <p class="mb-0 text-orange font-weight-bold type--uppercase tiny-title">{{ __('home.our_services') }}</p>
                    <h1>
                        {{ __('home.innovative_services') }}
                    </h1>
                    @php
                        $desc = session('lang') . '_description';
                    @endphp
                    <p class="text-justify"> {{ $aboutUs->$desc }} </p>
                    <a class="btn btn--primary type--uppercase" href="{{ url('about') }}">
                            <span class="btn__text">
                        {{ __('home.learn_more_about_us') }}
                        </span>
                    </a>
                </div>
                <div class="col-lg-7 col-md-12 offset-lg-1 service-blocks">
                    <div class="row">
                        @php
                            $title = session('lang') . '_title';
                            $desc = session('lang') . '_description';
                        @endphp
                        <div class="col-md-6">
                            @foreach($services as $index => $service)
                            <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}" class="font-weight-normal">
                                <div class="card card-2 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
                                    <div class="card__top">
                                        <img alt="Wordpress" src="{{ $service->service_image }}" class="img-fluid mb-3" style="width: 68px;height: 60px;">
                                    </div>
                                    <div class="card__body pt-0">
                                        <h4>{{ $service->$title }}</h4>
                                        <p class="mb-0">
                                            {{ $service->$desc }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                                @if($index == 2)
                                    @break
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-6 mt-60 sec-cl">
                            @foreach($services as $index => $service)
                                @if($index > 2 && $index < 6)
                                    <a href="javascript:void(0)" class="font-weight-normal">
                                        <div class="card card-2 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
                                            <div class="card__top">
                                                <img alt="Wordpress" src="{{ $service->service_image }}" class="img-fluid mb-3" style="width: 68px;height: 60px;">
                                            </div>
                                            <div class="card__body pt-0">
                                                <h4>{{ $service->$title }}</h4>
                                                <p class="mb-0">
                                                    {{ $service->$desc }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    @if($index == 5)
                                        @break
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <!--end of masonry-->
        </div>
        <!--end of container-->
    </section>
    @endif
    <!-- end service section -->

    @if(in_array('our_projects', $page_filter))
    <!-- start industries section -->
    <section class="industries-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <p class="mb-0 text-orange font-weight-bold type--uppercase tiny-title">{{ __('home.our_projects') }}</p>
                    <h1>{{ __('home.our_projects') }}</h1>
                </div>
                <div class="col-lg-9">
                    <div class="lazy" id="industry_serve">
                        @php
                            $title = session('lang') . '_title';
                        @endphp
                        @foreach($projects as $index => $project)
                            <div class="project-thumb hover-element hover--active">
                                <a href="javascript:void(0)">
                                    <div class="hover-element__initial">
                                        <div class="background-image-holder">
                                            <img src="{{ $project->project_image }}" data-lazy="{{ $project->project_image }}" alt="Business" />
                                        </div>
                                    </div>
                                    <div class="hover-element__reveal" data-overlay="9">
                                        <div class="project-thumb__title">
                                            <h5>{{ $project->$title }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end industries section -->
    <section class="industries-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="lazy" id="industry_serve2">
                        @php
                            $title = session('lang') . '_title';
                        @endphp
                        @foreach($projects as $index => $project)
                            <div class="project-thumb hover-element hover--active" style="border-radius: 14px;">
                                <a href="javascript:void(0)">
                                    <div class="hover-element__initial">
                                        <div class="background-image-holder">
                                            <img src="{{ $project->project_image }}" data-lazy="{{ $project->project_image }}" alt="Business" />
                                        </div>
                                    </div>
                                    <div class="hover-element__reveal" data-overlay="9">
                                        <div class="project-thumb__title">
                                            <h5>{{ $project->$title }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(in_array('latest_blog', $page_filter))
    <section class="blog-section sec-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <p class="mb-0 text-orange font-weight-bold type--uppercase tiny-title">{{ __('admin.latest_blog') }}</p>
                    <h2>{{ __('home.blogs') }}</h2>
                </div>
                @php
                    $title = session('lang') . '_title';
                    $desc = session('lang') . '_content';
                @endphp
                @foreach($blogs as $index => $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-block flex-column">
                            <div class="blog-img w-100">
                                <img src="{{ $blog->blog_image }}" alt="Blog Image">
                            </div>
                            <div class="blog-content">

                                <h4 class="mb-2">
                                    <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                        {{ $blog->$title }}
                                    </a>
                                </h4>
                                <p>{!! substr($blog->$desc, 0, 70) !!}</p>
                            </div>
                        </div>
                    </div>
                    @if($index == 2)
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif


@endsection
