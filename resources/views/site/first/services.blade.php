@extends('site.first.layouts.app')

@section('content')

    @include('site.first.layouts.header')

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
