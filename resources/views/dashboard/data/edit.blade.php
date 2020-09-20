@push('admin_scripts')
    <script>
        var uploadedDocumentMap = {}
        // Dropzone.autoDiscover = false;
        Dropzone.options.documentDropzone = {
            // autoDiscover: false,
            url: '{{ route('upload.data.images') }}',
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
                    url: '{{ route('remove.data.image') }}',
                    data:{
                        _token: '{{ csrf_token() }}',
                        id: file.name,
                        data_id: '{{ request()->route('data.id') }}'
                    }
                });
                $('form').find('input[name="document[]"][value="' + file.name + '"]').remove()
            },
            init: function () {
                @if(!empty($data->image))
                var files = '{{ $data->image }}';
                for (var i = 0; i < files.split('|').length; i++) {
                    var file = files.split('|')[i]
                    if (file != '') {
                        var mock = {name: file, size: 2, type: ''};

                        this.emit('addedfile', mock);
                        this.options.thumbnail.call(this, mock, '{{ url("storage/data/") }}' +'/'+ file);
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
                    <h1 class="m-0"> {{ trans('admin.users') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('data.update', $data->id) }}" enctype="multipart/form-data">
                    @csrf

                    @method('put')
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="user"> {{ trans('admin.data') }} / {{ trans('admin.user') }}</label>
                        <select id="user" class="form-control select2" name="user_id">
                            <option value="" selected> {{ __('admin.choose_user') }} </option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $data->user_id ? 'selected' : '' }}> {{ $user->name }} </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="ar_data"> {{ trans('admin.data') }} / {{ trans('admin.ar_data') }}</label>
                        <textarea id="ar_data" name="ar_data" class="form-control ckeditor" placeholder="{{ __('admin.data') }}">{{ $data->ar_data }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="en_data"> {{ trans('admin.data') }} / {{ trans('admin.en_data') }}</label>
                        <textarea id="en_data" name="en_data" class="form-control ckeditor" placeholder="{{ __('admin.data') }}">{{ $data->en_data }}</textarea>
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
