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
                    width: 150,
                    height: 150
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

                    @if(!empty($user->image))
                        var mock = { name: '{{ $user->name }}', size: 2};
                        this.emit('addedfile', mock);
                        this.emit('thumbnail', mock, '{{ $user->user_image }}');
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
                    <h1 class="m-0"> {{ trans('admin.users') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf

                    @method('put')
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="name"> {{ trans('admin.users') }} / {{ trans('admin.name') }}</label>
                        <input id="name" name="name" type="text" class="form-control" placeholder="{{ __('admin.name') }}" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email"> {{ trans('admin.users') }} / {{ trans('admin.email') }}</label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="{{ __('admin.email') }}" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label for="new_password"> {{ trans('admin.users') }} / {{ trans('admin.new_password') }}</label>
                        <input id="new_password" name="password" type="password" class="form-control" placeholder="{{ __('admin.new_password') }}" value="{{ old('new_password') }}">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation"> {{ trans('admin.users') }} / {{ trans('admin.confirm_password') }}</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="{{ __('admin.confirm_password') }}" value="{{ old('password_confirmation') }}">
                    </div>

                    <div class="form-group">
                        <label for="is_admin"> {{ trans('admin.users') }} / {{ trans('admin.is_admin') }}</label>
                        <select class="form-control select2" name="is_admin">
                            <option value="0" {{ $user->is_admin == 0 ? 'selected' : '' }}> {{ __('admin.user') }} </option>
                            <option value="1" {{ $user->is_admin == 1 ? 'selected' : '' }}> {{ __('admin.admin_role') }} </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input class="image_name" type="hidden" name="image" value="{{ $user->image }}">
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
