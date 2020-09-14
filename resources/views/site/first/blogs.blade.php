@extends('site.first.layouts.app')

@section('content')

    @include('site.first.layouts.header')

    <!-- start blog section -->
    <section class="blog-section sec-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <p class="mb-0 text-orange font-weight-bold type--uppercase tiny-title">{{ __('admin.latest_blog') }}</p>
                    <h2>{{ __('home.blogs') }}</h2>
                </div>
                @php
                    $title = session('lang') . '_title';
                    $content = session('lang') . '_content';
                    $author = session('lang') . '_author';
                    $meta_tag = session('lang') . '_meta_tag';
                @endphp
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                    <div class="blog-block flex-column">
                        <div class="blog-img w-100">
                            <img src="{{ $blog->blog_image }}" class="img-fluid" alt="{{ $blog->$meta_tag }}">
                        </div>
                        <div class="blog-content">
                            <p>{{ date('d M' ,strtotime($blog->create_at)) }}</p>
                            <h4 title="{{ $blog->$meta_tag }}">
                                <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}" title="{{ $blog->$meta_tag }}">
                                    {{ $blog->$title }}
                                </a>
                            </h4>
                            <p>{!! substr($blog->$content, 0, 200) !!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $blogs->appends(request()->query())->links() }}
            </div>
        </div>
    </section>
    <!--end blog section -->

@endsection
