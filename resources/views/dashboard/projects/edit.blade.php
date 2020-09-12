@push('admin_scripts')
    <script type="text/javascript">
        var url = window.location.href;
        var path = url.split('/')[4];
        Dropzone.autoDiscover = false;
        $(document).ready(function () {
            $('#mainphoto').dropzone({
                url: '{{ route('upload.image') }}',
                paramName:'image',
                autoDiscover: false,
                uploadMultiple: false,
                maxFiles: 1,
                acceptedFiles: 'image/*',
                dictDefaultMessage: '{{ __('admin.upload_photo') }}',
                dictRemoveFile: '<button class="btn btn-danger"> <i class="fa fa-trash center"></i></button>',
                params: {
                    _token: '{{ csrf_token() }}',
                    path: path,
                    width: 500,
                    height: 600
                },
                addRemoveLinks: true,
                removedfile:function (file) {
                    var imageName = $('.image_name').val();
                    $.ajax({
                        dataType: 'json',
                        type: 'POST',
                        url: '{{ route('remove.image') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            image: imageName,
                            path: path
                        }
                    });
                    var fmock;
                    return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement): void 0;
                },
                init: function () {

                        @if(!empty($project->image))
                        @php $title = session('lang') . '_title'; @endphp
                    var mock = { name: '{{ $project->$title }}', size: 2};
                    this.emit('addedfile', mock);
                    this.emit('thumbnail', mock, '{{ $project->project_image }}');
                    this.emit('complete', mock);
                    $('.dz-progress').remove();
                    @endif

                        this.on("success", function (file, image) {
                        $('.image_name').val(image);
                    })
                }
            });
        });
    </script>
    <style type="text/css">

        .dropzone {
            width: 200px;
            height: 90px;
            min-height: 0px !important;
            background-color: #1C2260;
            border: #1C2260;
        }
    </style>
@endpush

@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.edit') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.projects') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
                    @csrf

                    @method('put')
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="ar_title"> {{ trans('admin.project') }} / {{ trans('admin.ar_title') }}</label>
                        <input id="ar_title" name="ar_title" type="text" class="form-control" placeholder="{{ __('admin.ar_title') }}" value="{{ $project->ar_title }}">
                    </div>
                    <div class="form-group">
                        <label for="en_title"> {{ trans('admin.project') }} / {{ trans('admin.en_title') }}</label>
                        <input id="en_title" name="en_title" type="text" class="form-control" placeholder="{{ __('admin.en_title') }}" value="{{ $project->en_title }}">
                    </div>

                    <div class="form-group">
                        <label for="desc"> {{ trans('admin.project') }} / {{ trans('admin.ar_description') }}</label>
                        <textarea id="desc" name="ar_description" rows="4" class="form-control" placeholder="{{ trans('admin.project') }} / {{ trans('admin.ar_description') }}...">{{ $project->ar_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="desc"> {{ trans('admin.project') }} / {{ trans('admin.en_description') }}</label>
                        <textarea id="desc" name="en_description" rows="4" class="form-control" placeholder="{{ trans('admin.project') }} / {{ trans('admin.en_description') }}...">{{ $project->en_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="ar_meta_tag"> {{ trans('admin.projects') }} / {{ trans('admin.ar_meta_tag') }}</label>
                        <input id="ar_meta_tag" name="ar_meta_tag" type="text" class="form-control" placeholder="{{ trans('admin.ar_meta_tag') }}" value="{{ $project->ar_meta_tag }}">
                    </div>
                    <div class="form-group">
                        <label for="en_meta_tag"> {{ trans('admin.projects') }} / {{ trans('admin.en_meta_tag') }}</label>
                        <input id="en_meta_tag" name="en_meta_tag" type="text" class="form-control" placeholder="{{ trans('admin.en_meta_tag') }}" value="{{ $project->en_meta_tag }}">
                    </div>

                    <div class="form-group">
                        <input class="image_name" type="hidden" name="image" value="{{ $project->image }}">
                    </div>
                    <div class="form-group">
                        <label> {{ __('admin.photo') }} </label>
                        <div class="dropzone" id="mainphoto"></div>
                    </div>

                    <div class="text-right mb-5">
                        <input type="submit" name="add" class="btn btn-success" value="{{ trans('admin.update') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection
