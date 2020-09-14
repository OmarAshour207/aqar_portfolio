@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.seo') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.seo') }} </h1> <h3> / {{ trans('admin.names_pages') }} </h3>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('settings.pages.store') }}">

                    @csrf
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="about_us"> {{ trans('admin.seo') }} / {{ trans('admin.about') }} </label>
                        <input id="about_us" name="about_us" type="text" class="form-control" placeholder="{{ __('admin.about') }}" value="{{ old('about_us', setting('about_us')) }}">
                    </div>

                    <div class="form-group">
                        <label for="our_services"> {{ trans('admin.seo') }} / {{ trans('admin.our_services') }}</label>
                        <input id="our_services" name="our_services" type="text" class="form-control" placeholder="{{ __('admin.our_services') }}" value="{{ old('our_services', setting('our_services')) }}">
                    </div>

                    <div class="form-group">
                        <label for="our_projects"> {{ trans('admin.seo') }} / {{ trans('admin.our_projects') }}</label>
                        <input type="text" id="our_projects" name="our_projects" class="form-control" placeholder="{{ trans('admin.our_projects') }}..." value="{{ old('our_projects', setting('our_projects')) }}">
                    </div>

                    <div class="form-group">
                        <label for="blogs"> {{ trans('admin.seo') }} / {{ trans('admin.blogs') }}</label>
                        <input id="blogs" name="blogs" type="text" class="form-control" placeholder="{{ __('admin.blogs') }}" value="{{ old('blogs', setting('blogs')) }}">
                    </div>

                    <div class="form-group">
                        <label for="contact_us"> {{ trans('admin.seo') }} / {{ trans('admin.contact_us') }}</label>
                        <input id="contact_us" name="contact_us" type="text" class="form-control" placeholder="{{ __('admin.contact_us') }}" value="{{ old('contact_us', setting('contact_us')) }}">
                    </div>

                    <div class="text-right mb-5">
                        <input type="submit" name="add" class="btn btn-success" value="{{ trans('admin.add') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection
