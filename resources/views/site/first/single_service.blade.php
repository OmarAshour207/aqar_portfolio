@extends('site.first.layouts.app')

@section('content')

    @include('site.first.layouts.header')

    <!-- start about section -->
    <section class="about-section pb-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-5 col-sm-8 col-8">
                    <div class="abt-img">

                        <div class="main-banner">
                            <div class="slideshow-container">
                                @php
                                    $meta_tag = session('lang') . '_meta_tag';
                                @endphp
                                <div class="mySlides fade">
                                    <a href=""><img src="{{ $service->service_image }}"  alt="{{ $service->$meta_tag }}" style="height: 500px"></a>
                                    <!--        <div class="text">Caption Text</div>-->
                                </div>

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
