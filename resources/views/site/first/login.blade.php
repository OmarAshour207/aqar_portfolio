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
                                    <li class="my-2"><a class="text-white" href="{{ url('/') }}">{{ __('home.home') }}</a></li>
                                    <li class="my-2"><a class="text-white" href="{{ url('about') }}">{{ __('home.about_us') }}</a></li>
                                    <li class="my-2"><a class="text-white" href="{{ url('services') }}">{{ __('home.our_services') }}</a></li>
                                    <li class="my-2"><a class="text-white" href="{{ url('projects') }}">{{ __('home.our_projects') }}</a></li>

                                    <li class="my-2"><a class="text-white" href="{{ url('blogs') }}">{{ __('home.blogs') }}</a></li>
                                    <li class="my-2"><a class="text-white" href="{{ url('contact-us') }}">{{ __('admin.contact_us') }}</a></li>
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
                    <li class="my-2"><a class="text-white" href="{{ url('/') }}">{{ __('home.home') }}</a></li>
                    <li class="my-2"><a class="text-white" href="{{ url('about') }}">{{ __('home.about_us') }}</a></li>
                    <li class="my-2"><a class="text-white" href="{{ url('services') }}">{{ __('home.our_services') }}</a></li>
                    <li class="my-2"><a class="text-white" href="{{ url('projects') }}">{{ __('home.our_projects') }}</a></li>

                    <li class="my-2"><a class="text-white" href="{{ url('blogs') }}">{{ __('home.blogs') }}</a></li>
                    <li class="my-2"><a class="text-white" href="{{ url('contact-us') }}">{{ __('admin.contact_us') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center justify-content-around banner-inner-content aos-init aos-animate" data-aos="fade-up">
                <div class="col-md-8 text-center">
                    <h1 class="text-white font-weight-bold">
                        {{ __('home.login') }}
                    </h1>
                </div>
            </div>
        </div>
        <!-- end side menu -->
    </section>
    <!-- end main banner -->


    <section class="pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form id="regForm" name="regForm" action="{{ route('login') }}" method="POST" novalidate="novalidate">
                        @csrf
                        <h3>{{ __('home.login') }}</h3>
                        <div class="mb-10">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('admin.email') }}" id="email" name="email">
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="mb-10">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('home.password') }}" id="person_name" name="password">
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="mb-10">
                            <div class="form-btn">
                                <button type="submit" class="btn btn--primary"> {{ __('home.login') }} </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
