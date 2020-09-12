@push('admin_scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.change_theme', function (e) {
            e.preventDefault();
            let url = $(this).data('url');
            let id = $(this).data('id');

            $.ajax({
                url: url,
                method: 'POST',
                beforeSend: function () {
                    $('.loading-' + id).removeClass('d-none');
                    $('.data_error').html('');
                    $('.error_message').addClass('d-none');
                    $('.success_message').html('').addClass('d-none');
                }, success: function (data) {
                    if (data.status == true) {
                        $('.loading-' + id).addClass('d-none');
                        $('.success_message').html('<h1>' + data.message + '</h1>').removeClass('d-none');
                        window.location.reload();
                    }
                }, error: function (response) {
                    $('.loading-' + id).addClass('d-none');
                    let error_li = '';
                    $.each(response.responseJSON.errors, function(index, value){
                        error_li += '<li>' + value + '</li>'
                    });
                    $('.data_error').html(error_li);
                    $('.error_message').removeClass('d-none');
                }
            });
        })
    });
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
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.themes') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.themes') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card">
                <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                    <div class="alert alert-danger error_message d-none">
                        <ul class="data_error">
                        </ul>
                    </div>
                    <div class="alert alert-success success_message d-none"></div>

                    <table class="table mb-0 thead-border-top-0 table-striped">
                        <thead>
                        <tr>

                            <th style="width: 18px;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#companies" id="customCheckAll">
                                    <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                                </div>
                            </th>

                            <th style="width: 30px;" > {{ trans('admin.id') }} </th>
                            <th style="width: 120px;" > {{ trans('admin.ar_title') }} </th>
                            <th style="width: 120px;" > {{ trans('admin.en_title') }} </th>
                            <th style="width: 30px;" > {{ trans('admin.action') }} </th>
                        </tr>
                        </thead>
                        <tbody class="list" id="companies">
                        @if($themes->count() > 0)
                            @foreach($themes as $index => $theme)
                                <tr>
                                    <td class="text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_20">
                                            <label class="custom-control-label" for="customCheck1_20"><span class="text-hide">Check</span></label>
                                        </div>
                                    </td>
                                    <td style="width: 30px;">
                                        <div class="badge badge-soft-dark"> {{ $index+1 }} </div>
                                    </td>

                                    <td style="width: 120px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ $theme->ar_title }}
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width: 120px;">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                {{ $theme->en_title }}
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        @if($theme->status == 1)
                                            <button class="btn btn-success"> {{ __('admin.used_theme') }} </button>
                                        @else
                                            <a href="javascript:void(0)"
                                               data-url = "{{ route('themes.change', $theme->id) }}"
                                               data-id="{{ $theme->id }}"
                                               class="btn btn-sm btn-link change_theme">
                                                <i class="fa fa-edit fa-2x"></i>
                                                {{ __('admin.change') }}
                                                <i class="fa fa-spin fa-spinner loading-{{ $theme->id }} d-none"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('theme.show', $theme->en_title) }}" target="_blank">
                                            <i class="fa fa-eye"></i> {{ __('admin.view') }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <h1> {{ trans('admin.no_records') }} </h1>
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection
