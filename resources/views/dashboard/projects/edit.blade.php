@push('admin_scripts')

    <script type="text/javascript">
        var uploadedDocumentMap = {}
        // Dropzone.autoDiscover = false;
        Dropzone.options.documentDropzone = {
            // autoDiscover: false,
            url: '{{ route('upload.project.images') }}',
            maxFilesize: 2, // MB
            maxFiles:5,
            dictDefaultMessage: '{{ __('admin.upload_photo') }}',
            dictRemoveFile: '<button class="btn btn-danger"> <i class="fa fa-trash center"></i></button>',
            addRemoveLinks: true,
            params: {
                _token: '{{ csrf_token() }}',
                width: 1920,
                height: 1080
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                $.ajax({
                    dataType:'json',
                    type:'post',
                    url: '{{ route('remove.project.image') }}',
                    data:{
                        _token: '{{ csrf_token() }}',
                        id: file.name,
                        data_id: '{{ request()->route('project.id') }}'
                    }
                });
                $('form').find('input[name="document[]"][value="' + file.name + '"]').remove()
            },
            init: function () {
                @if(!empty($project->image))
                var files = '{{ $project->image }}';
                for (var i = 0; i < files.split('|').length; i++) {
                    var file = files.split('|')[i]
                    if (file != '') {
                        var mock = {name: file, size: 2, type: ''};

                        this.emit('addedfile', mock);
                        this.options.thumbnail.call(this, mock, '{{ url("storage/projects/") }}' +'/'+ file);
                        $('.dz-progress').remove();

                        $('form').append('<input type="hidden" name="document[]" value="' + file + '">')
                    }
                }

                @endif

            }
        }

    </script>
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
                        <label for="document">{{ trans('admin.data') }} / {{ trans('admin.photo') }}</label>
                        <div class="needsclick dropzone" id="document-dropzone">
                        </div>
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
