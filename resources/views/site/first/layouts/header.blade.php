<!-- start main banner -->
<section class="{{ Request::segment(1) == '' ? 'hero' : 'hero-inner' }} pt-0">

    @if(Request::segment(1) == '')
        <div class="main-banner mb-2">
            <div class="slideshow-container">
                @php
                    $meta_tag = session('lang') . '_meta_tag';
                @endphp
                @foreach($sliders as $index => $slider)
                    <div class="mySlides fade">
                        @if($slider->status == 1)
                            <img src="{{ $slider->slider_image }}" alt="{{ $slider->$meta_tag }}">
                        @else
                            <iframe width="420" height="315"
                                    src="https://www.youtube.com/embed/{{ getYoutubeId($slider->video) }}" allowfullscreen>
                            </iframe>
                        @endif

                    </div>
                @endforeach
                @if($slider->status == 1)
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                @endif

            </div>

            <style>


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
                    top: 31%;
                    width: auto;
                    padding: 16px;
                    margin-top: -22px;
                    color: white;
                    font-weight: bold;
                    font-size: 18px;
                    transition: 0.6s ease;
                    border-radius: 0 3px 3px 0;
                    user-select: none;
                    z-index: 8;
                }
                .next {
                    right: 98%;
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
    @endif
    <!-- start main header -->
    <div class="nav-container aos-init aos-animate" data-aos="fade-down">
        <nav id="menu1">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-8">
                        <div class="">
                            <a href="{{ url('/') }}" title="{{ __('home.home') }}">
                                <img class="img-fluid logo" alt="{{ setting('website_title') }}" src="{{ getLogo() }}" style="max-width: 97px;"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 text-right hidden-md hidden-sm hidden-xs d-flex justify-content-end align-items-center">
                        <div class="bar__module">
                            <ul class="menu-horizontal text-left">
                                <li><a href="{{ url('/') }}" title="{{ __('home.home') }}">{{ __('home.home') }}</a></li>
                                <li>
                                    <div class="dropdown">
                                        <a class="dropbtn" href="#" title="{{ setting('about_us') }}">
                                            {{ __('home.about_us') }}
                                        </a>
                                        <div class="dropdown-content">
                                            @php
                                                $title = session('lang') . '_title';
                                            @endphp
                                            @foreach($abouts as $about)
                                                <a href="{{ url(setting('about_us') . '?tab=' . $about->$title) }}" title="{{ setting('about_us') }}">{{ $about->$title }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="dropdown">
                                        <a class="dropbtn" href="{{ url(setting('our_services')) }}" title="{{ __('admin.services') }}">
                                            {{ __('home.our_services') }}
                                        </a>
                                        <div class="dropdown-content">
                                            @php
                                                $title = session('lang') . '_title';
                                                $meta_tag = session('lang') . '_meta_tag';
                                            @endphp
                                            @foreach($services as $index => $service)

                                                <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}" title="{{ $service->$meta_tag }}">
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
                                                            <a href="{{ route('service.show', ['id' => $id, 'title' => $name]) }}" title="{{ $name }}" class="ml-4">
                                                                {{ $name }}
                                                            </a>
                                                        @endif
                                                    @endforeach
                                                @endfor
                                            @endforeach
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <a href="{{ url(setting('our_projects')) }}" title="{{ setting('our_projects') }}">
                                        {{ __('home.our_projects') }}
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url(setting('blogs')) }}" title="{{ setting('blogs') }}">
                                        {{ __('home.blogs') }}
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url(setting('contact_us')) }}" title="{{ setting('contact_us') }}">
                                        {{ __('admin.contact_us') }}
                                    </a>
                                </li>

                                @if(Auth::check())
                                    <li>
                                        <a href="{{ url('profile') }}" title="{{ url('profile') }}" style="
                                            background: red;
                                            padding: 6px;
                                            border-radius: 6px;">
                                            {{ __('home.your_project') }}
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ url('/login') }}" title="{{ url('login') }}">
                                            {{ __('home.login') }}
                                        </a>
                                    </li>
                                @endif

                                @if(session('lang') == 'ar')
                                    <li class="mr-2">
                                        <a href="{{ url('lang/en') }}" title="{{ __('home.english') }}">
                                            En
                                        </a>
                                    </li>
                                    @else
                                    <li  class="mr-2">
                                        <a href="{{ url('lang/ar') }}" title="{{ __('home.arabic') }}">
                                            {{ __('home.arabic') }}
                                        </a>
                                    </li>
                                @endif

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
                        <a href="{{ url('/') }}" title="{{ setting('website_title') }}">
                            <img class="img-fluid" alt="{{ setting('website_title') }}" src="{{ getLogo() }}">
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
                <li class="my-2"><a href="{{ url('/') }}" title="{{ setting('website_title') }}">{{ __('home.home') }}</a></li>
                <li class="my-2">
                    <div class="dropdown">
                        <a class="dropbtn" href="#" title="{{ url(setting('about_us')) }}">
                            <i class="fa fa-arrow-circle-down"></i>{{ __('home.about_us') }}
                        </a>
                        <div class="dropdown-content">
                            @php
                                $title = session('lang') . '_title';
                            @endphp
                            @foreach($abouts as $about)
                                <a href="{{ url(setting('about_us') . '?tab='.$about->$title) }}" title="{{ url(setting('about_us') . '?tab='.$about->$title) }}">
                                    {{ $about->$title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </li>

                <li class="my-2">
                    <div class="dropdown">
                        <a class="dropbtn" href="{{ url(setting('our_services')) }}" title="{{ url(setting('our_services')) }}">
                            <i class="fa fa-arrow-circle-down"></i> {{ __('home.our_services') }}
                        </a>
                        <div class="dropdown-content">
                            @php
                                $title = session('lang') . '_title';
                                $meta_tag = session('lang') . '_meta_tag';
                            @endphp
                            @foreach($services as $index => $service)

                                <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}" title="{{ $service->$meta_tag }}">
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
                                            <a href="{{ route('service.show', ['id' => $id, 'title' => $name]) }}" class="ml-4" title="{{ $name }}">
                                                {{ $name }}
                                            </a>
                                        @endif
                                    @endforeach
                                @endfor
                            @endforeach
                        </div>
                    </div>
                </li>

                <li class="my-2"><a href="{{ url(setting('our_projects')) }}" title="{{ setting('our_projects') }}">{{ __('home.our_projects') }}</a></li>

                <li class="my-2">
                    <a href="{{ url(setting('blogs')) }}" title="{{ setting('blogs') }}">
                        {{ __('home.blogs') }}
                    </a>
                </li>
                <li class="my-2">
                    <a href="{{ url(setting('contact_us')) }}" title="{{ setting('contact_us') }}">
                        {{ __('admin.contact_us') }}
                    </a>
                </li>
                @if(Auth::check())
                    <li>
                        <a href="{{ url('profile') }}" title="{{ url('profile') }}" style="
                                            background: red;
                                            padding: 6px;
                                            border-radius: 6px;">
                            {{ __('home.your_project') }}
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/login') }}" title="{{ url('login') }}">
                            {{ __('home.login') }}
                        </a>
                    </li>
                @endif

                @if(session('lang') == 'ar')
                    <li class="my-2">
                        <a href="{{ url('lang/en') }}" title="{{ __('home.english') }}">
                            En
                        </a>
                    </li>
                @else
                    <li  class="my-2">
                        <a href="{{ url('lang/ar') }}" title="{{ __('home.arabic') }}">
                            {{ __('home.arabic') }}
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
    <!-- end side menu -->

    @if(Request::segment(1) == '')
    <!-- start main banner content-->
        <div class="container">

            <div class="row align-items-center justify-content-around banner-content" data-aos="fade-up">
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-8 text-center banner-line">
                    @php
                        $title = session('lang') . '_title';
                    @endphp
                    <h1 class="font-weight-bold">
                        <a href="{{ url('/') }}" class="typewrite text-white" data-period="2000" data-type='[]' title="{{ setting('website_title') }}">
                            <span class="wrap">&nbsp;</span>
                        </a>
                    </h1>
                    <p class="lead text-white">
                    </p>

                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row align-items-center justify-content-around banner-inner-content aos-init aos-animate" data-aos="fade-up">
                <div class="col-md-8 text-center">
                    <h1 class="text-white font-weight-bold">
                        {{ strtoupper($pageName) }}
                    </h1>
                </div>
            </div>
        </div>
    @endif
</section>
<!-- end main banner -->
