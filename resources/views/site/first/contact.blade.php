@extends('site.first.layouts.app')

@section('content')

    @include('site.first.layouts.header')

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
