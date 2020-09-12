@extends('site.fifth.layouts.app')

@section('content')
<!--hero section start-->
<section class="banner p-0 pos-r fullscreen-banner text-center">
    <div class="banner-slider owl-carousel no-pb" data-dots="false" data-nav="true">
      @foreach ($sliders as $index => $slider)
        <div class="item" data-bg-img="{{ $slider->slider_image }}" data-overlay="6">
        <div class="align-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-10 col-md-12 mr-auto ml-auto">
                <div class="box-shadow px-5 xs-px-1 py-5 xs-py-2 banner-1 pos-r" data-bg-color="rgba(255,255,255,0.050)">
                  <h5 class="text-white mb-3 letter-space-3 animated6">{{ __('home.what_we_do') }}</h5>
                  @php
                      $title = session('lang') . '_title';
                      $desc = session('lang') . '_description';
                  @endphp
                  <h1 class="text-white mb-3 animated8"> {!! $slider->$title !!} </h1>
                  <h5 class="lead text-white animated5 mb-3">
                      {!! $slider->$desc !!}
                  </h5>

                    <a class="btn btn-theme btn-radius animated7" href="{{ url('about') }}">{{ __('home.learn_more') }}</a>
                  <a class="btn btn-border btn-radius animated6" href="{{ url('contact-us') }}">{{ __('admin.contact_us') }}</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @if ($index == 2)
          @break
      @endif
      @endforeach
    </div>
</section>
<!--hero section end-->

<!--body content start-->

<div class="page-content">

    <!--about us start-->
    <section>
        <div class="container">
          <div class="row text-center">
            <div class="col-lg-8 col-md-10 ml-auto mr-auto">
              <div class="section-title">
                <h2 class="title">{{ __('home.about_our') }} <span>{{ __('home.company') }}</span></h2>
                <p class="mb-0">
                    @php
                        $desc = session('lang') . '_description';
                    @endphp
                    {{ $aboutUs->$desc }}
                </p>
              </div>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
              <div class="row">
                <div class="col-md-6 pr-2">
                    @foreach ($services as $index => $service)
                    <div class="about-img {{ $index == 0 ? 'mb-3' : '' }}">
                        <img class="img-fluid" src="{{ $service->service_image }}" alt="">
                    </div>
                    @if ($index == 1)
                        @break
                    @endif
                    @endforeach
                </div>
                <div class="col-md-6 mt-4 pl-2">
                    @foreach ($services as $index => $service)
                    @if ($index > 1 && $index < 4)
                        <div class="about-img {{ $index == 2 ? 'mb-3' : '' }}">
                            <img class="img-fluid" src="{{ $service->service_image }}" alt="">
                        </div>
                    @endif
                    @endforeach
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 box-shadow white-bg px-4 py-4 sm-px-3 sm-py-3 xs-py-2 xs-px-2 md-mt-5">
              <h5>{{ __('home.what_we_do') }}</h5>
              <p class="line-h-3">
                @php
                    $desc = session('lang') . '_description';
                @endphp
                {{ $aboutUs->$desc }}
              </p>
              <div class="row text-black mt-4">
                <div class="col-sm-6">
                  <ul class="list-unstyled">
                      @foreach ($services as $index => $service)
                      @php
                          $title = session('lang') . '_title';
                      @endphp
                      <li class="mb-2">- {{ $service->$title }}</li>
                      @if ($index == 2)
                          @break
                      @endif
                      @endforeach
                  </ul>
                </div>
                <div class="col-sm-6 xs-mt-3">
                  <ul class="list-unstyled">
                    @foreach ($services as $index => $service)
                    @if ($index > 2 && $index < 6)
                    @php
                        $title = session('lang') . '_title';
                    @endphp
                    <li class="mb-2">- {{ $service->$title }}</li>
                    @endif

                    @endforeach
                </ul>
                </div>
              </div>
              <div class="row mt-2">
          </div>
            </div>
          </div>
        </div>
      </section>
    <!--about us end-->


    <!--service start-->
    <section class="dark-bg text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 ml-auto mr-auto">
            <div class="section-title">
              <h2 class="title">{{ __('home.our') }} <span> {{ __('admin.services') }}</span></h2>
              <p class="mb-0 text-white">Misto Provide Greate Services for elit. Excepturi vero aliquam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel owl-theme" data-items="3" data-md-items="2" data-sm-items="1" data-xs-items="1" data-margin="30">
              @foreach ($services as $index => $service)
              @php
                  $title = session('lang') . '_title';
                  $desc = session('lang') . '_description';
              @endphp
              <div class="item">
                <div class="service-item">
                  <div class="service-images">
                    <img class="img-fluid" src="{{ $service->service_image }}" alt="">
                    <div class="service-icon"> <i class="flaticon-industrial-robot"></i>
                    </div>
                  </div>
                  <div class="service-description">
                      <h4>{{ $service->$title }}</h4>
                      <p> {{ $service->$desc }} </p>
                      <a href="{{ route('service.show', ['id'=> $service->id, 'title'=> $service->$title]) }}">{{ __('home.read_more') }} <i class="fas fa-arrow-left"></i></a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--service end-->


    <!--feauture start-->

    <section class="grey-bg pattern feuture-bottom white-overlay" data-bg-img="images/pattern/01.png" data-overlay="3">
      <div class="container">
        <div class="row no-gutters align-items-center">
          <div class="col-lg-6 col-md-6 pr-lg-5 md-px-2 text-center">
            <div class="section-title mb-md-0">
              <h2 class="title">{{ __('home.why') }} <span> {{ __('home.choose_us') }}</span></h2>
              @php
                  $desc = session('lang') . '_description';
              @endphp
              <p class="mb-0">{{ $aboutUs->$desc }}</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="featured-item bottom-icon">
              <div class="featured-title text-uppercase">
                <h5>Latest Technology</h5>
              </div>
              <div class="featured-desc">
                <p>Lorem ipsum dolor sit amet, consectetur ili adipiscing elit. Donec nec eros eget pellentesque et non erat. Maecenas nibh dolor, males uada et bibendu ma</p>
              </div>
              <div class="featured-icon"> <i class="flaticon-innovation"></i>
              </div> <span><i class="flaticon-innovation"></i></span>
            </div>
          </div>
        </div>
        <div class="row no-gutters">
            @foreach ($services as $index => $service)
          <div class="col-lg-3 col-md-6">
            <div class="featured-item bottom-icon">
                @php
                    $title = session('lang') . '_title';
                    $desc = session('lang') . '_description';
                @endphp
              <div class="featured-title text-uppercase">
                <h5>{{ $service->$title }}</h5>
              </div>
              <div class="featured-desc">
                <p>{{ $service->$desc }}</p>
              </div>
              <div class="featured-icon"> <i class="flaticon-chat-bubble"></i>
              </div> <span><i class="flaticon-chat-bubble"></i></span>
            </div>
          </div>
          @if ($index == 3)
              @break
          @endif
          @endforeach
        </div>
      </div>
    </section>

    <!--feauture end-->


    <!--project start-->
    <section class="o-hidden">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-8 col-md-10 ml-auto mr-auto">
            <div class="section-title">
              <h2 class="title">{{ __('home.latest') }} <span> {{ __('home.projects') }} </span></h2>
              <p class="mb-0">Misto Provide Greate Services for elit. Excepturi vero aliquam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="masonry row columns-4 no-gutters popup-gallery">
              <div class="grid-sizer"></div>
              @foreach ($projects as $index => $project)
              <div class="masonry-brick">
                <div class="portfolio-item">
                  <img src="{{ $project->project_image }}" alt="">
                  <div class="portfolio-hover">
                      @php
                          $title = session('lang') . '_title';
                          $desc = session('lang') . '_description';
                      @endphp
                    <div class="portfolio-title"> <span>{{ $project->$title }}</span>
                      <h4>{{ substr($project->$desc, 0, 50) }}</h4>
                    </div>
                    <div class="portfolio-icon">
                      <a class="popup popup-img" href="{{ asset('site/part2/images/portfolio/large/01.jpg') }}"> <i class="flaticon-magnifier"></i>
                      </a>
                      <a class="popup portfolio-link" target="_blank" href="#"> <i class="flaticon-broken-link-1"></i>
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
    </section>
    <!--project end-->


    <!--counter start-->

    <section class="grey-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-6">
            <div class="counter"> <i class="flaticon-innovation"></i>
              <span class="count-number" data-to="{{ $projects_count }}" data-speed="10000">{{ $projects_count }}</span>
              <label>{{ __('admin.projects') }}</label>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="counter"> <i class="flaticon-pencil"></i>
              <span class="count-number" data-to="{{ $services_count }}" data-speed="10000">{{ $services_count }}</span>
              <label>{{ __('admin.services') }}</label>
            </div>
          </div>
          <div class="col-lg-4 col-sm-12">
            <div class="counter md-mt-3"> <i class="flaticon-employee"></i>
              <span class="count-number" data-to="{{ $team_count }}" data-speed="10000">{{ $team_count }}</span>
              <label>{{ __('admin.team_members') }}</label>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--counter end-->


    <!--testimonial start-->
    <section class="dark-bg parallaxie" data-bg-img="{{ asset('site/part2/images/bg/02.jpg') }}" data-overlay="9">
      <div class="container">
        <div class="row text-center">
          <div class="col-md-8 ml-auto mr-auto">
            <div class="section-title">
              <h2 class="title">{{ __('home.our') }} <span> {{ __('home.testimonial') }} </span></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="owl-carousel owl-theme" data-items="1" data-autoplay="true">
            @foreach($testimonials as $index => $testimonial)
              <div class="item">
                <div class="testimonial">
                  <div class="row">
                    <div class="col-lg-10 col-md-12 ml-auto mr-auto">
                      <div class="testimonial-avatar">
                        <div class="testimonial-img">
                          <img class="img-center" src="{{ $testimonial->testimonial_image }}" alt="">
                        </div>
                      </div>
                      <div class="testimonial-content"> <span><i class="fas fa-quote-left"></i></span>
                        @php
                            $desc = session('lang') . '_description';
                            $name = session('lang') . '_name';
                            $title = session('lang') . '_title';
                        @endphp
                        <p>{{ $testimonial->$desc }}</p>
                        <div class="testimonial-caption">
                          <h6>{{ $testimonial->$name }} -</h6>
                          <label>{{ $testimonial->$title }}</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @if ($index == 2)
                  @break
              @endif
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--testimonial end-->


    <!--team start-->
    <section>
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-8 col-md-10 ml-auto mr-auto">
            <div class="section-title">
              <h2 class="title">{{ __('home.meet_team') }}</h2>
              <p class="mb-0">Misto Provide Greate Services for elit. Excepturi vero aliquam id. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
        <div class="row">
            @foreach ($teamMembers as $index => $teamMember)

            <div class="col-lg-4 col-md-12">
                <div class="team-member text-center">
                  <div class="team-images">
                    <img class="img-fluid" src="{{ $teamMember->member_image }}" alt="">
                    <div class="team-social-icon">
                      <ul>
                        <li><a href="{{ setting('facebook') }}"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li><a href="{{ setting('twitter') }}"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li><a href="{{ setting('instagram') }}"><i class="fab fa-instagram"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="team-description">
                      @php
                          $title = session('lang') . '_title';
                          $name = session('lang') . '_name';
                      @endphp
                    <h5>
                        <a href="#">{{ $teamMember->$name }}</a>
                    </h5>
                    <span>{{ $teamMember->$title }}</span>
                  </div>
                </div>
            </div>

            @if ($index == 2)
                @break
            @endif
            @endforeach

        </div>
      </div>
    </section>
    <!--team end-->


    <!--subscribe start-->

    <section class="grey-bg py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8 col-sm-12">
            <h3 class="text-black">{{ __('home.convert_idea') }} <span class="text-theme font-weight-bold"> {{ __('home.for_your_company') }} </span></h3>
          </div>
          <div class="col-md-4 col-sm-12 text-md-{{ session('lang') == 'en' ? 'left' : 'right' }} sm-mt-3">
              <a href="{{ url('contact-us') }}" class="btn btn-theme"><span>{{ __('admin.contact_us') }}</span></a>
          </div>
        </div>
      </div>
    </section>

    <!--subscribe end-->


    <!--blog start-->
    <section class="pb-17 sm-pb-8">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-8 col-md-10 ml-auto mr-auto">
            <div class="section-title">
              <h2 class="title">{{ __('home.latest') }} <span> {{ __('home.news') }}</span></h2>
              <p class="mb-0">Latest News For Our Solution Services for elit. Excepturi vero aliquam id. Lorem ipsum dolor amet, consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
        <div class="row">
            @foreach ($blogs as $index => $blog)
            <div class="col-lg-4 col-md-12">
                @php
                    $title = session('lang') . '_title';
                    $content = session('lang') . '_content';
                @endphp
                <div class="post">
                  <div class="post-image">
                    <img src="{{ $blog->blog_image }}" alt="">
                    <div class="post-date">{{ $blog->created_at->format('d M y') }}</div>
                  </div>
                  <div class="post-desc">
                    <div class="post-title">
                      <h5>
                        <a href="{{ url('blogs/' . $blog->id .'/'.$blog->$title) }}">
                            {{ $blog->$title }}
                        </a>
                     </h5>
                    </div>
                    {!!  substr($blog->$content, 0, 50) !!}
                  </div>
                  <div class="post-bottom">
                    <div class="post-meta">
                    </div>
                    <a class="post-btn text-center" href="{{ url('blogs/' . $blog->id .'/'.$blog->$title) }}">
                        {{ __('home.read_more') }}<i class="mr-2 fas fa-long-arrow-alt-left"></i>
                    </a>
                  </div>
                </div>
              </div>

            @endforeach
        </div>
      </div>
    </section>
    <!--blog end-->


</div>

<!--body content end-->
@endsection
