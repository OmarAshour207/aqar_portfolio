@extends('site.first.layouts.app')

@section('content')

    @include('site.first.layouts.header')

    @php
        $title = session('lang') . '_title';
        $content = session('lang') . '_content';
    @endphp
    <!-- start blog section -->
    <section class="blog-section single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-2">

                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <p class="mb-0 text-orange font-weight-bold  tiny-title">{{ date('d M' , strtotime($blog->create_at)) }}</p>
                            <h2>{{ $blog->$title }}</h2>
                            <div class="blog-img main-blog-img w-100">
                                <img src="{{ $blog->blog_image }}" class="img-fluid" alt="blog-img">
                            </div>
                            <div class="blog-block flex-column">
                                <div class="blog-content full mt-5">
                                    <ul class="nav d-flex">
                                        <li class="mr-3"><i class="fas fa-calendar-alt"></i> {{ date('D M Y' ,strtotime($blog->create_at)) }}</li>
                                    </ul>
                                    {!! $blog->$content !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="blog-sidebar mb-5">
                                <div class="mb-3">
                                    <h3>{{ __('home.recent_blogs') }}</h3>
                                    @foreach($blogs as $recent)
                                        <div class="blog-block justify-content-between d-flex mb-4">
                                        <div class="blog-img side-img">
                                            <img src="{{ $recent->blog_image }}" class="img-fluid" alt="blog-img">
                                        </div>
                                        <div class="side-content pl-3">
                                            <h4 class="mb-0">
                                                <a href="{{ route('blog.show', ['id' => $recent->id, 'title' => $recent->$title]) }}">
                                                    {{ $recent->$title }}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end blog section -->

@endsection
