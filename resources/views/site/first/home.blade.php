@extends('site.first.layouts.app')

@section('content')

    @include('site.first.layouts.header')

    <!-- start service section -->
    <section class="bg--secondary cms-tech pb-0 mt-10">
        <div class="container">
            <div class="row  mt-5">
                <div class="col-lg-5 mt-10">
                    <p class="mb-0 text-orange font-weight-bold type--uppercase tiny-title">{{ __('admin.services') }}</p>
                    <h1>
                        {{ __('home.about_us') }}
                    </h1>
                    @php
                        $desc = session('lang') . '_description';
                    @endphp
                    <p class="text-justify"> {{ $aboutUs->$desc }} </p>
                    <a class="btn btn--primary type--uppercase" href="{{ url('about') }}">
                            <span class="btn__text">
                        {{ __('home.learn_more_about_us') }}
                        </span>
                    </a>
                </div>
                <div class="col-lg-1 col-md-1 mt-10 "></div>
                <div class="col-lg-6 col-md-12 mt-11 ">
                    <div class="row">
                        <h1 style="
                                float: right;
                                text-align: center;
                                direction: rtl;
                                margin-top:142px;
                                color: #ed0242;">
                            {{ __('home.innovative_services') }}
                        </h1>
                        <iframe id="player" type="text/html" width="640" height="390"
                                src="http://www.youtube.com/embed/M7lc1UVf-VE?enablejsapi=1&origin=http://example.com"
                                frameborder="0"></iframe>
                    </div>
                </div>

            </div>
            <!--end of masonry-->
        </div>
        <!--end of container-->
    </section>
    <!-- end service section -->


    <!-- start service section -->
    @if(in_array('our_services', $page_filter))
    <section class="bg--secondary cms-tech pb-0">
        <div class="container">
            <div class="row  mt-5">
                <div class="col-lg-4 mt-10">
                    <p class="mb-0 text-orange font-weight-bold type--uppercase tiny-title">{{ __('home.our_services') }}</p>
                    <h1>
                        {{ __('home.innovative_services') }}
                    </h1>
                    @php
                        $desc = session('lang') . '_description';
                    @endphp
                    <p class="text-justify"> {{ $aboutUs->$desc }} </p>
                    <a class="btn btn--primary type--uppercase" href="{{ url('about') }}">
                            <span class="btn__text">
                        {{ __('home.learn_more_about_us') }}
                        </span>
                    </a>
                </div>
                <div class="col-lg-7 col-md-12 offset-lg-1 service-blocks">
                    <div class="row">
                        @php
                            $title = session('lang') . '_title';
                            $desc = session('lang') . '_description';
                        @endphp
                        <div class="col-md-6">
                            @foreach($services as $index => $service)
                            <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}" class="font-weight-normal">
                                <div class="card card-2 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
                                    <div class="card__top">
                                        <img alt="Wordpress" src="{{ $service->service_image }}" class="img-fluid mb-3" style="width: 68px;height: 60px;">
                                    </div>
                                    <div class="card__body pt-0">
                                        <h4>{{ $service->$title }}</h4>
                                        <p class="mb-0">
                                            {{ $service->$desc }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                                @if($index == 2)
                                    @break
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-6 mt-60 sec-cl">
                            @foreach($services as $index => $service)
                                @if($index > 2 && $index < 6)
                                    <a href="javascript:void(0)" class="font-weight-normal">
                                        <div class="card card-2 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
                                            <div class="card__top">
                                                <img alt="Wordpress" src="{{ $service->service_image }}" class="img-fluid mb-3" style="width: 68px;height: 60px;">
                                            </div>
                                            <div class="card__body pt-0">
                                                <h4>{{ $service->$title }}</h4>
                                                <p class="mb-0">
                                                    {{ $service->$desc }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    @if($index == 5)
                                        @break
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <!--end of masonry-->
        </div>
        <!--end of container-->
    </section>
    @endif
    <!-- end service section -->

    @if(in_array('our_projects', $page_filter))
    <!-- start industries section -->
    <section class="industries-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <p class="mb-0 text-orange font-weight-bold type--uppercase tiny-title">{{ __('home.our_projects') }}</p>
                    <h1>{{ __('home.our_projects') }}</h1>
                </div>
                <div class="col-lg-9">
                    <div class="lazy" id="industry_serve">
                        @php
                            $title = session('lang') . '_title';
                        @endphp
                        @foreach($projects as $index => $project)
                            <div class="project-thumb hover-element hover--active">
                                <a href="javascript:void(0)">
                                    <div class="hover-element__initial">
                                        <div class="background-image-holder">
                                            <img src="{{ $project->project_image }}" data-lazy="{{ $project->project_image }}" alt="Business" />
                                        </div>
                                    </div>
                                    <div class="hover-element__reveal" data-overlay="9">
                                        <div class="project-thumb__title">
                                            <h5>{{ $project->$title }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end industries section -->
    <section class="industries-section">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="lazy" id="industry_serve2">
                        @php
                            $title = session('lang') . '_title';
                        @endphp
                        @foreach($projects as $index => $project)
                            <div class="project-thumb hover-element hover--active" style="border-radius: 14px;">
                                <a href="javascript:void(0)">
                                    <div class="hover-element__initial">
                                        <div class="background-image-holder">
                                            <img src="{{ $project->project_image }}" data-lazy="{{ $project->project_image }}" alt="Business" />
                                        </div>
                                    </div>
                                    <div class="hover-element__reveal" data-overlay="9">
                                        <div class="project-thumb__title">
                                            <h5>{{ $project->$title }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(in_array('testimonials', $page_filter))
    <section class="blog-section sec-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <p class="mb-0 text-orange font-weight-bold type--uppercase tiny-title">{{ __('home.clients_reviews') }}</p>
                    <h2>{{ __('home.reviews') }}</h2>
                </div>
                @php
                    $title = session('lang') . '_title';
                    $desc = session('lang') . '_description';
                @endphp
                @foreach($testimonials as $index => $testimonial)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-block flex-column">
                            <div class="blog-img w-100">
                                @if ($testimonial->status == 1)
                                    <img src="{{ $testimonial->testimonial_image }}" alt="Blog Image">
                                @else
                                    <iframe width="420" height="315"
                                            src="https://www.youtube.com/embed/{{ getYoutubeId($testimonial->video) }}" allowfullscreen>
                                    </iframe>
                                @endif
                            </div>
                            <div class="blog-content">

                                <h4 class="mb-2">
                                    <a href="#">
                                        {{ $testimonial->$title }}
                                    </a>
                                </h4>
                                <p>{{ substr($testimonial->$desc, 0, 70) }}</p>
                            </div>
                        </div>
                    </div>
                    @if($index == 2)
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif


@endsection
