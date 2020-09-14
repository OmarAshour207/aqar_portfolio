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
                                                @foreach($services as $index => $service)

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
                                @foreach($services as $index => $service)

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


    </section>
    <!-- end main banner -->

    <!-- start about section -->
    <section class="about-section pb-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <p class="mb-0 text-orange font-weight-bold type--uppercase tiny-title">{{ __('home.about_us') }}</p>
                    @php
                        $title = session('lang') . '_title';
                        $desc = session('lang') . '_description';
                    @endphp
                    <h2>{{ $aboutUs->$title }}</h2>
                    <p class="text-justify pr-3">{{ $aboutUs->$desc }}</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-8 col-8">
                    <div class="abt-img">
                        <div class="video-thumb">
                            <img src="{{ $aboutUs->about_image }}" class="img-fluid mb-0 w-100" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->

    <!-- start business expert section -->
    <section class="business-expert overflow-visible">
        <div class="container position-relative">
            <div class="row">
                <div class="col-lg-10 col-md-12">
                    <div class="tabs-container" data-content-align="left">
                        <ul class="tabs tabs--spaced">
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
                            @foreach($abouts as $index => $about)
                            <li class="icon-list
                            @if(request('tab') == $about->$title)
                                {{ 'active' }}
                            @elseif ($index == 0 && request('tab') == '')
                                {{ 'active' }}
                            @endif">
                                <div class="tab__title text-center">
                                    <i class="fas fa-rocket"></i>
                                    <span class="h5">{{ $about->$title }}</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <ul class="tabs-content">
                            @foreach($abouts as $index => $about)
                                <li class="">
                                    <div class="tab__content">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-10 col-lg-10">
                                                    <div class="mt--1 mb--1 content-box">
                                                        <h3>{{ $about->$title }}</h3>
                                                        <p>
                                                            {{ $about->$desc }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end of row-->
                                        </div>
                                        <!--end of container-->
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="collaboration-img">
                <img class="img-1 img-fluid mb-0" src="{{ asset('site/images/1.png') }}" alt="">
                <img class="img-2 img-fluid mb-0" src="{{ asset('site/images/3.png') }}" alt="">
                <img class="img-3 img-fluid mb-0" src="{{ asset('site/images/4.gif') }}" alt="">
            </div>
        </div>
    </section>
    <!-- end business expert section -->

    <!-- start project preview section -->
    <section class="projects pb-0 about-project">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <p class="mb-0 text-orange font-weight-bold type--uppercase tiny-title">{{ __('home.projects') }}</p>
                    @php
                        $title = session('lang') . '_title';
                        $desc = session('lang') . '_description';
                    @endphp
                    <h2>{{ $aboutUs->$title }}</h2>
                    <p>
                        {{ $aboutUs->$desc }}
                    </p>
                </div>
                <div class="col-lg-8 col-md-12 counter-block">
                    <div class="row justify-content-center" id="counter">
                        <div class="col-lg-5 col-md-5 col-sm-6 col-6 counter-box">
                            <div class="boxed bg-transparent d-flex align-items-center justify-content-center boxed--border">
                                <i class="fas fa-store fa-3x mr-3"></i>
                                <div class="employees">
                                    <p class="counter-count">{{ $teamCount }}</p>
                                    <p class="employee-p">{{ __('home.employee') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-6 col-6 counter-box">
                            <div class="boxed bg-transparent d-flex align-items-center justify-content-center boxed--border">
                                <i class="fas fa-crown fa-3x mr-3"></i>
                                <div class="customer">
                                    <p class="counter-count">{{ $clientCount }}</p>
                                    <p class="customer-p">{{ __('home.customer') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-6 col-6 counter-box">
                            <div class="boxed bg-transparent d-flex align-items-center justify-content-center boxed--border">
                                <i class="fas fa-edit fa-3x mr-3"></i>
                                <div class="design">
                                    <p class="counter-count">{{ $projectCount }}</p>
                                    <p class="design-p">{{ __('home.projects') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-6 col-6 counter-box">
                            <div class="boxed bg-transparent d-flex align-items-center justify-content-center boxed--border">
                                <i class="fas fa-user fa-3x mr-3"></i>
                                <div class="order">
                                    <p class="counter-count">{{ $blogCount }}</p>
                                    <p class="order-p">{{ __('admin.blog') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end project preview section -->


    <!-- start contact us section -->
    <section>
        <div class="container">
            <div class="row counter-bg bottom-content">
                <div class="col-lg-8 col-md-12">
                    <h2 class="text-white mb-0"> {{ __('home.like_what_see') }} </h2>
                </div>
                <div class="col-lg-4 col-md-12">
                    <a href="{{ url('contact-us') }}" class="btn text-white bottom-link mb-0">{{ __('home.hire_us') }}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact us section -->

@endsection
