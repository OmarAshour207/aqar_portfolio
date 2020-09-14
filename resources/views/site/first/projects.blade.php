@extends('site.first.layouts.app')

@section('content')

    @include('site.first.layouts.header')

    <!-- start blog section -->
    <section class="blog-section sec-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <p class="mb-0 text-orange font-weight-bold type--uppercase tiny-title">{{ __('admin.our_projects') }}</p>
                    <h2>{{ __('home.projects') }}</h2>
                </div>
                @php
                    $title = session('lang') . '_title';
                    $desc = session('lang') . '_description';
                @endphp
                @foreach($projects as $project)
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-block flex-column">
                            <div class="blog-img w-100">
                                <img src="{{ $project->project_image }}" class="img-fluid" alt="blog-img">
                            </div>
                            <div class="blog-content">
                                <h4>
                                    <a href="#">
                                        {{ $project->$title }}
                                    </a>
                                </h4>
                                <p>{{ $project->$desc }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $projects->appends(request()->query())->links() }}
            </div>
        </div>
    </section>
    <!--end blog section -->

@endsection
