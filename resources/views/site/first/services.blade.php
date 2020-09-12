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
                        {{ __('home.our_services') }}
                    </h1>
                </div>
            </div>
        </div>
        <!-- end side menu -->
    </section>
    <!-- end main banner -->

    <!-- start portfolio section -->
    <section class="pb-0 sec-title">
        <div class="masonry masonry--gapless">
            <div class="container">
                <p class="mb-0 text-orange font-weight-bold type--uppercase tiny-title">{{ __('admin.services') }}</p>
                <h2>
                    {{ __('home.our_services') }}
                </h2>
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="masonry-filter-container text-center row mb-0">
                            <div class="masonry-filter-holder">
                                <div class="masonry__filters custom-masonry" data-filter-all-text="All Projects"><ul><li class="active" data-masonry-filter="*">{{ __('home.all_services') }}</li></ul></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="masonry__container bg--secondary masonry--active" style="position: relative; height: 1218px;">
                    @php
                        $title = session('lang') . '_title';
                        $desc = session('lang') . '_description';
                    @endphp
                    @foreach($services as $service)
                        <div class="col-md-4 col-12 masonry__item" style="position: absolute; left: 0px; top: 0px;">
                            <div class="project-thumb hover-element height-40">
                                <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}">
                                    <div class="hover-element__initial">
                                        <div class="background-image-holder" style="background: url(&quot;{{ $service->service_image }}&quot;); opacity: 1;">
                                            <img alt="background" src="{{ $service->service_image }}">
                                        </div>
                                    </div>
                                    <div class="hover-element__reveal" data-overlay="9">
                                        <div class="project-thumb__title">
                                            <h5>{{ $service->$title }}</h5>
                                            <span>{{ $service->$desc }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $services->appends(request()->query())->links() }}
            </div>

            <!--end of masonry__container-->
        </div>
        <!--end of masonry-->
    </section>
    <!-- end portfolio section -->
    <!-- start contact us section -->
    <section>
        <div class="container">
            <div class="row counter-bg bottom-content">
                <div class="col-lg-8 col-md-12">
                    <h2 class="text-white mb-0">Like what you see? Let’s Connect</h2>
                </div>
                <div class="col-lg-4 col-md-12">
                    <a href="contact.html" class="btn text-white bottom-link mb-0">Hire Us</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact us section -->

@endsection
