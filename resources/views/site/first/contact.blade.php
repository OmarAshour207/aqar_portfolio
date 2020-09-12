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
                        {{ __('admin.contact_us') }}
                    </h1>
                </div>
            </div>
        </div>
        <!-- end side menu -->
    </section>
    <!-- end main banner -->

    <!-- start contact section -->
    <section class="contact-sec-two sec-title pb-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-5 career d-lg-block pr-0">
                    <div class="right-sec">
                        <div class="right-sec-content">
                            <h2 class="text-white">{{ __('home.reach_us') }}</h2>
                            <h4 class="text-white"><i class="fa fa-envelope pr-3"></i>{{ setting('email') }}</h4>
                            <h4 class="text-white"><i class="fa fa-mobile pr-3"></i>{{ __('home.phone') }}</h4>
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
                                @if(session('success'))

                                @endif
                                <form class="form-contact" id="career-form" name="career-form" action="{{ route('send.contact') }}" method="POST">
                                    @csrf
                                    <label>
                                        <i class="fa fa-user"></i>
                                        <span class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('admin.full_name') }}">
                                        </span>
                                    </label>
                                    <label>
                                        <i class="fa fa-envelope-open"></i>
                                        <span class="form-group">
                                            <input type="email" class="form-control" id="email" name="email"  placeholder="{{ __('home.email') }}">
                                        </span>
                                    </label>
                                    <label>
                                        <i class="fa fa-mobile"></i>
                                        <span class="form-group">
                                            <input type="text" class="form-control" id="number" name="phone" placeholder="{{ __('home.phone') }}">
                                        </span>
                                    </label>
                                    <label class="mb-0">
                                        <i class="fa fa-comment"></i>
                                        <span class="form-group">
                                            <textarea id="message" name="message" placeholder="{{ __('home.message') }}"></textarea>
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

    </section>
    <section class="p-0 plant-img">
        <div class="container">
            <div class="plant-img_2">
                <img src="{{ asset('site/images/contact_us_plant.png') }}" class="img-fluid float-right plant" alt="Plant">
            </div>
        </div>
    </section>
    <!-- end contact section -->
    <!-- start contact us section -->
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
