@extends('site.third.layouts.app')

@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- contact area -->
        <div class="content-block">
            <div class="section-full content-inner bg-white">
                <div class="container">
                    <div class="section-head text-black text-center">
                        <h2 class="title">{{ __('home.our_services') }}</h2>
                        <p> {{ __('home.lorem_ipsum') }} </p>
                    </div>
                    <div class="row">
                        @foreach($services as $service)
                            @php
                                $title = session('lang') . '_title';
                            @endphp
                            <div class="col-lg-4 col-md-6 col-sm-12 m-b50 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                                <div class="dlab-box service-box-3">
                                    <div class="dlab-media radius-sm dlab-img-overlay1 zoom dlab-img-effect">
                                        <a href="{{ route('service.show', ['id'=> $service->id, 'title'=> $service->$title]) }}">
                                            <img src="{{ $service->service_image }}" alt="">
                                        </a>
                                    </div>
                                    <div class="dlab-info">
                                        <h4 class="title">
                                            <a href="{{ route('service.show', ['id'=> $service->id, 'title'=> $service->$title]) }}">
                                                {{ $service->$title }}
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="section-full call-action bg-primary wow fadeIn" data-wow-duration="2s" data-wow-delay="0.3s">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 text-white">
                            @php $desc = session('lang') . '_description'; @endphp
                            <h2 class="title"> {!! $aboutUs->$desc !!} </h2>
                            <p class="m-b0">{{ __('home.short_lorem_ipsum') }}</p>
                        </div>
                        <div class="col-lg-3 d-flex">
                            <a href="{{ url('contact-us') }}" class="site-button btnhover15 white align-self-center outline ml-auto radius-xl outline-2">{{ __('home.contact_us') }} </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-full content-inner-2 bg-gray wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s" style="background-image:url({{ asset('site/images/overlay/brilliant.png') }});">
                <div class="container">
                    <div class="section-head text-black text-center">
                        @php $desc = session('lang') . '_description'; @endphp
                        <h2 class="title"> {!! $aboutUs->$desc !!} </h2>
                        <p>{{ __('home.lorem_ipsum') }}</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="img-carousel-dots owl-theme owl-dots-none owl-carousel owl-btn-center-lr owl-btn-3">
                                @foreach($services as $index => $service)
                                <div class="item">
                                    @php
                                        $title = session('lang') . '_title';
                                    @endphp
                                    <div class="service-box style4">
                                        <div class="icon-lg m-b5 text-primary radius">
                                            <a href="{{ route('service.show', ['id'=> $service->id, 'title'=> $service->$title]) }}" class="icon-cell"><i class="flaticon-worker"></i></a>
                                        </div>
                                        <h3 class="title"> {{ $service->$title }} </h3>
                                        <div class="no"> {{ $index+1 }} </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Our Team -->
            <div class="section-full bg-white content-inner">
                <div class="container">
                    <div class="section-head text-center">
                        <h2 class="title">{{ __('admin.team_members') }}</h2>
                    </div>
                    <div class="row">
                        @foreach($teamMembers as $teamMember)
                            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInLeftBig" data-wow-duration="2s" data-wow-delay="0.3s">
                                <div class="our-team m-b30">
                                    <div class="dlab-media radius-sm  zoom dlab-img-effect">
                                        <img src="{{ $teamMember->member_image }}" alt="">
                                    </div>
                                    <div class="team-title-bx text-center">
                                        @php
                                            $name = session('lang') . '_name';
                                            $title = session('lang') . '_title';
                                        @endphp
                                        <h2 class="title"><a href="javascript:void(0)"> {{ $teamMember->$name }} </a></h2>
                                        <span> {{ $teamMember->$title }} </span>
                                        <ul class="social-list">
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Our Team END -->

            <!-- Latest Projects -->
            <div class="section-full content-inner-2 bg-white">
                <div class="container">
                    <div class="section-head text-center">
                        <h2 class="title">{{ __('home.our_projects') }}</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="img-carousel-dots-nav owl-theme owl-dots-none owl-carousel owl-btn-center-lr owl-btn-3">
                                @foreach($projects as $project)
                                    <div class="item wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                                        <div class="dlab-box project-bx">
                                            <div class="dlab-media radius-sm dlab-img-overlay1 dlab-img-effect zoom">
                                                <a href="javascript:void(0)">
                                                    <img src="{{ $project->project_image }}" alt="">
                                                </a>
                                            </div>
                                            <div class="dlab-info">
                                                <h5 class="dlab-title">
                                                    @php
                                                        $title = session('lang') . '_title';
                                                    @endphp
                                                    <a href="javascript:void(0)">{{ $project->$title }}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Latest Projects End -->

            <!-- Testimonials -->
            <div class="section-full content-inner bg-gray">
                <div class="container">
                    <div class="section-head text-center">
                        <h2 class="title">{{ __('admin.testimonials') }}</h2>
                    </div>
                    <div class="testimonial-six owl-carousel owl-btn-center-lr testimonial-13-area owl-btn-2 primary dots-style-3 owl-theme">
                        @foreach($testimonials as $testimonial)
                            <div class="item wow bounceInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                                <div class="testimonial-13">
                                    @php
                                        $desc = session('lang') . '_description';
                                        $name = session('lang') . '_name';
                                        $title = session('lang') . '_title';
                                    @endphp
                                    <div class="testimonial-text">
                                        <div class="quote-left"></div>
                                        <p>{{ $testimonial->$desc }}</p>
                                    </div>
                                    <div class="testimonial-detail clearfix">
                                        <div class="testimonial-pic radius shadow">
                                            <img src="{{ $testimonial->testimonial_image }}" alt="">
                                        </div>
                                        <h5 class="testimonial-name m-t10 m-b5">{{ $testimonial->$name }}</h5>
                                        <span class="testimonial-position text-primary">{{ $testimonial->$title }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Testimonials End -->

            <div class="section-full content-inner bg-white">
                <div class="container">
                    <div class="section-head text-black text-center">
                        <h2 class="title text-capitalize"> {{ __('home.latest_blog') }} </h2>
                    </div>
                    <div class="row">
                        @foreach($blogs as $blog)
                            <div class="col-lg-4 col-md-6 wow bounceInLeft" data-wow-duration="2s" data-wow-delay="0.3s">
                                @php
                                    $title = session('lang') . '_title';
                                    $author = session('lang') . '_author';
                                    $content = session('lang') . '_content';
                                @endphp
                                <div class="blog-post blog-grid blog-rounded blog-effect1">
                                    <div class="dlab-post-media dlab-img-effect zoom">
                                        <a href="{{ url('blogs/' . $blog->id . '/' . $blog->$title) }}">
                                            <img src="{{ $blog->blog_image }}" alt="">
                                        </a>
                                    </div>
                                    <div class="dlab-info p-a20 border-1 bg-white">
                                        <div class="dlab-post-meta">
                                            <ul>
                                                <li class="post-date">
                                                    <strong>{{ $blog->created_at->format('d M') }}</strong>
                                                    <span> {{ $blog->created_at->format('Y') }}</span>
                                                </li>
                                                <li class="post-author"> {{ __('home.by') . $blog->$author }} </li>
                                            </ul>
                                        </div>
                                        <div class="dlab-post-title">
                                            <h4 class="post-title"><a href="{{ url('blogs/' . $blog->id . '/' . $blog->$title) }}">{{ $blog->$title }}</a></h4>
                                        </div>
                                        <div class="dlab-post-text">
                                            <p>{!!  substr($blog->$content, 0, 50) !!}</p>
                                        </div>
                                        <div class="dlab-post-readmore">
                                            <a href="{{ url('blogs/' . $blog->id . '/' . $blog->$title) }}" title="READ MORE" rel="bookmark" class="site-button btnhover15">
                                                {{ __('home.read_more') }}
                                                <i class="ti-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content END-->
@endsection

