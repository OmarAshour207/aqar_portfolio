@extends('site.first.layouts.app')

@section('content')


    <!-- start main banner -->
    <section class="hero-inner pt-0">
        <!-- start main header -->

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


        <div class="container">
            <div class="row align-items-center justify-content-around banner-inner-content aos-init aos-animate" data-aos="fade-up">
                <div class="col-md-8 text-center">
                    <h1 class="text-white font-weight-bold">
                        {{ __('home.service_details') }}
                    </h1>
                </div>
            </div>
        </div>
        <!-- end side menu -->
    </section>
    <!-- end main banner -->

    <!-- start about section -->
    <section class="about-section pb-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-5 col-sm-8 col-8">
                    <div class="abt-img">

                        <div class="main-banner">
                            <div class="slideshow-container">

                                <div class="mySlides fade">
                                    <a href=""><img src="{{ $service->service_image }}" style="height: 500px"></a>
                                    <!--        <div class="text">Caption Text</div>-->
                                </div>

                                <div class="mySlides fade">
                                    <a href=""><img src="https://i.resimyukle.xyz/7fN7cM.jpg"></a>

                                </div>

                                <div class="mySlides fade">
                                    <a href=""><img src="https://i.resimyukle.xyz/x2QJQK.jpg"></a>

                                </div>

                                <div class="mySlides fade">
                                    <a href=""><img src="https://i.resimyukle.xyz/VQH4yf.jpg"></a>

                                </div>

                                <div class="mySlides fade">
                                    <a href=""><img src="https://i.resimyukle.xyz/AWHL3H.jpg"></a>

                                </div>

                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="next" onclick="plusSlides(1)">&#10095;</a>


                            </div>
                            <style>
                                /*
                                                    .mySlides {
                                        clip-path: polygon(50% 0%, 81% 0, 100% 0, 100% 65%, 50% 100%, 0 78%, 0 0, 18% 0);
                                        }
                                */
                                .right-sec-content {
                                    background: #1b148a!important;
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
                                .career .right-sec {

                                    height: auto;

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
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    @php
                        $title = session('lang') . '_title';
                        $desc = session('lang') . '_description';
                    @endphp
                    <p class="mb-0 text-orange font-weight-bold type--uppercase tiny-title">{{ __('home.service_details') }}</p>
                    <h2>{{ $service->$title }}</h2>
                    <p class="text-justify pr-3">{{ $service->$desc }}</p>
                </div>

                <div class="col-lg-2 col-md-1 col-sm-3 col-3">
                    <h1 class="v-text">mohamed</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->
    <!-- start business expert section -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-5 career d-lg-block pr-0">
                <div class="right-sec">
                    <div class="right-sec-content">
                        <h2 class="text-white">Reach Us</h2>
                        <h4 class="text-white"><i class="fa fa-envelope pr-3"></i>{{ setting('email') }}</h4>
                        <h4 class="text-white"><i class="fa fa-mobile pr-3"></i>{{ setting('phone') }}</h4>
                        <h4 class="text-white"><i class="fa fa-location-arrow pr-3"></i>{{ setting(session('lang') . '_address') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 pl-0 contact-form">
                <div class="left-sec contact-page">
                    <div class="row m-0">
                        <div class="col-lg-10">
                            <h2 class="title">{{ __('home.send_message') }}</h2>
                            <p>{{ __('home.please_fill_out') }}</p>
                            <form class="form-contact" id="career-form" name="career-form" action="{{ route('send.contact') }}" method="POST">
                                @csrf
                                <label>
                                    <i class="fa fa-user"></i>
                                    <span class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('admin.full_name') }}:*">
                                        </span>
                                </label>
                                <label>
                                    <i class="fa fa-envelope-open"></i>
                                    <span class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('home.email_contact') }}:*">
                                        </span>
                                </label>
                                <label>
                                    <i class="fa fa-mobile"></i>
                                    <span class="form-group">
                                            <input type="text" class="form-control" id="number" name="phone" placeholder="{{ __('home.phone') }}:*">
                                        </span>
                                </label>
                                <label class="mb-0">
                                    <i class="fa fa-comment"></i>
                                    <span class="form-group">
                                            <textarea id="message" name="message" placeholder="{{ __('home.message') }}:*"></textarea>
                                        </span>
                                </label>
                                <button class="btn btn--primary type--uppercase" type="submit" id="submit">
                                    {{ __('home.send') }}
                                </button>
                            </form>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>

        <div class="container">
            <div class="row counter-bg bottom-content">
                <div class="col-lg-8 col-md-12">
                    <h2 class="text-white mb-0">{{ __('home.like_what_see') }}</h2>
                </div>
                <div class="col-lg-4 col-md-12">
                    <a href="{{ url('contact-us') }}" class="btn text-white bottom-link mb-0">{{ __('home.hire_us') }}</a>
                </div>
            </div>
        </div>
    </section>

    <!-- end contact us section -->


@endsection
