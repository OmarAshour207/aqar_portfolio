@extends('site.first.layouts.app')

@section('content')

    @include('site.first.layouts.header')

    <!-- start contact section -->
    <section class="contact-sec-two sec-title pb-0">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-8 col-md-7 pl-0 contact-form">
                    <div class="left-sec contact-page">
                        <div class="row m-0">
                            <div class="col-lg-10">
                                <h2 class="title">{{ __('home.login') }}</h2>
                                <p>{{ __('home.please_fill_out') }}</p>
                                <form class="form-contact" id="career-form" name="career-form" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <label>
                                        <i class="fa fa-envelope-open"></i>
                                        <span class="form-group">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{ __('home.email') }}:*">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </span>
                                    </label>
                                    <label>
                                        <i class="fa fa-user"></i>
                                        <span class="form-group">
                                            <input type="password" class="form-control @error('email') is-invalid @enderror" id="password" name="password"  placeholder="{{ __('home.password') }}:*">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </span>
                                    </label>


                                    <button class="btn btn--primary type--uppercase" type="submit" name="submit" id="submit">
                                        {{ __('home.login') }}
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
                    <a href="{{ url(setting('contact_us')) }}" class="btn text-white bottom-link mb-0">{{ __('home.hire_us') }}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact us section -->

@endsection
