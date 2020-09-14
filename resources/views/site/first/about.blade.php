@extends('site.first.layouts.app')

@section('content')

    @include('site.first.layouts.header')

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
                    <h2 title="{{ $aboutUs->$title }}">{{ $aboutUs->$title }}</h2>
                    <p class="text-justify pr-3">{{ $aboutUs->$desc }}</p>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-8 col-8">
                    <div class="abt-img">
                        <div class="video-thumb">
                            <img src="{{ $aboutUs->about_image }}" class="img-fluid mb-0 w-100" alt="{{ $aboutUs->$title }}">
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
                                                        <h3 title="{{ $aboutUs->$title }}">{{ $about->$title }}</h3>
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
                    <h2 title="{{ $aboutUs->$title }}">{{ $aboutUs->$title }}</h2>
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
                    <a href="{{ url(setting('contact_us')) }}" title="{{ setting('contact_us') }}" class="btn text-white bottom-link mb-0">{{ __('home.hire_us') }}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact us section -->

@endsection
