@extends('site.first.layouts.app')

@section('content')

    @include('site.first.layouts.header')


    <!-- start service section -->
    <section class="bg--secondary">
        <div class="row"><img style="margin-top: 250px;" src="{{ asset('site/images/kos.png') }}"></div>
        <div class="container">

            <div class="row">
                <div class="col-lg-5">
                    <p class="mb-0 text-orange font-weight-bold type--uppercase tiny-title">{{ __('admin.services') }}</p>
                    <h1>
                        {{ __('home.innovative_services') }}
                    </h1>
                    @php
                        $desc = session('lang') . '_description';
                    @endphp
                    <p class="text-justify">{{ $aboutUs->$desc }}</p>
                    <a class="btn btn--primary type--uppercase" href="{{ url(setting('about_us')) }}" title="{{ setting('about_us') }}">
                        <span class="btn__text">
                            {{ __('home.learn_more_about_us') }}
                        </span>
                    </a>
                </div>
                <div class="col-lg-1 col-md-1 mt-10"><img src="{{ asset('site/images/kos2.png') }}"></div>
                <div class="col-lg-6 col-md-12">
                    <div class="row">
                        <h1 class="h1home" style="
                                            float: right;
                                            text-align: center;
                                            direction: rtl;
                                            color: #ed0242;">
                            {{ __('home.innovative_services') }}
                        </h1>

                        <div class="lazy" id="industry_serve3">
                            @foreach($abouts as $index => $about)
                                <div class="project-thumb hover-element hover--active">
                                    <a href="javascript:void(0)">
                                        <div class="hover-element__initial">
                                            <iframe class="homee" id="player" type="text/html" width="640" height="390"
                                                    src="https://www.youtube.com/embed/{{ getYoutubeId($about->video) }}"></iframe>
                                        </div>
                                    </a>
                                </div>
                                @if($index == 2)
                                    @break
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
                    <a class="btn btn--primary type--uppercase" href="{{ url(setting('about_us')) }}" title="{{ setting('about_us') }}">
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
                            $meta_tag = session('lang') . '_meta_tag';
                        @endphp
                        <div class="col-md-6">
                            @foreach($services as $index => $service)
                                <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}" title="{{ $service->$meta_tag }}" class="font-weight-normal">
                                    <div class="card card-2 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">
                                        <div class="card__top">
                                            <br>
                                        </div>
                                        <div class="card__body pt-0">
                                            <h4 title="{{ $service->$meta_tag }}">{{ $service->$title }}</h4>
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
                                                <br>
                                            </div>
                                            <div class="card__body pt-0">
                                                <h4 title="{{ $service->$meta_tag }}">{{ $service->$title }}</h4>
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
                            $meta_tag = session('lang') . '_meta_tag';
                        @endphp
                        @foreach($projects as $index => $project)
                            <div class="project-thumb hover-element hover--active">
                                <a href="javascript:void(0)">
                                    <div class="hover-element__initial">
                                        <div class="background-image-holder">
                                            <img src="{{ $project->project_image }}" data-lazy="{{ $project->project_image }}" alt="{{ $project->meta_tag }}" />
                                        </div>
                                    </div>
                                    <div class="hover-element__reveal" data-overlay="9">
                                        <div class="project-thumb__title">
                                            <h5 title="{{ $project->$title }}">{{ $project->$title }}</h5>
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
                            $name = session('lang') . '_name';
                        @endphp
                        @foreach($clients as $client)
                            <div class="project-thumb hover-element hover--active" style="border-radius: 14px;">
                                <a href="javascript:void(0)" title="{{ $client->$name }}">
                                    <div class="hover-element__initial">
                                        <div class="background-image-holder">
                                            <img src="{{ $client->client_image }}" data-lazy="{{ $client->client_image }}" alt="{{ $client->$name }}" />
                                        </div>
                                    </div>
                                    <div class="hover-element__reveal" data-overlay="9">
                                        <div class="project-thumb__title">
                                            <h5>{{ $client->$name }}</h5>
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
                    $name = session('lang') . '_name';
                    $desc = session('lang') . '_description';
                    $meta_tag = session('lang') . '_meta_tag';
                @endphp

                <div class="col-lg-12">
                    <div class="lazy" id="industry_serve4">
                        @foreach($testimonials as $index => $testimonial)
                        <div class="" style="border-radius: 14px;">
                            <a href="javascript:void(0)">
                                <div class="blog-img w-100">
                                    @if ($testimonial->status == 1)
                                        <img src="{{ $testimonial->testimonial_image }}" alt="{{ $testimonial->$meta_tag }}" style="height: 355px;border-radius: 14px;">
                                    @else
                                        <iframe width="420" height="315"
                                                src="https://www.youtube.com/embed/{{ getYoutubeId($testimonial->video) }}" allowfullscreen>
                                        </iframe>
                                    @endif
                                </div>
                                <div class="blog-content">

                                    <p>{{ substr($testimonial->$desc, 0, 70) }}</p>
                                    <h4 class="mb-2 x">
                                        <a href="javascript:void(0)" title="{{ $testimonial->$meta_tag }}">
                                            {{ $testimonial->$name }}
                                        </a>
                                    </h4>
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


@endsection
