@extends('layouts.app')
<?php
view()->share('pageTitle', __('Users'));
view()->share('hideSubHeader', true);
?>
@section('breadcrumbs')
    {{ Breadcrumbs::render('users.index') }}
@endsection
@push('styles')
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet" type="text/css" >
@endpush


@section('content')

    <!--begin::Portlet-->
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-user"></i>
			</span>
                <h3 class="kt-portlet__head-title">
                    {{ __('Users') }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <div class="dropdown dropdown-inline" id="datatable-buttons">

                        </div>
                        &nbsp;@can('add_users')
                            <a href="{{ route('users.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                {{ __('New user') }}
                            </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <!--begin: Datatable classes table dataTable no-footer -->
                {{$dataTable->table(['class' => 'table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline'])}}
            <!--end: Datatable -->

        </div>
    </div>
    <!--end::Portlet-->

@endsection

@push('scripts')
    <!--<script src="{{ asset('js/datatables.js') }}"></script>-->
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {{$dataTable->scripts()}}
    <script>
        (function(window,$){
            $.fn.dataTable.Buttons.defaults.dom.container.className = '';
            $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-default btn-icon-sm';
            var buttons = new $.fn.dataTable.Buttons(window.LaravelDataTables["users-table"], {
                buttons: [
                    'export',
                    //'print',
                    /*{
                        text: 'Orange',
                        className: 'orange'
                    }*/
                ]
            }).container().appendTo($('#datatable-buttons'));
        })(window,jQuery);
        function destroyConfirmation(e){
            var _this =  jQuery(e);
            swal.fire({
                title: '{{ __('Are you sure you want to delete this?') }}',
                text: "{!! __("You won't be able to revert this!") !!}",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: "{{ __('Yes, delete it!') }}"
            }).then(function(result) {
                if (result.value) {
                    //jQuery("#"+_this.data('destroy-form-id')).submit();
                    jQuery.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url: _this.data('delete-url'),
                        type: 'POST',
                        dataType: 'json',
                        data: {_method: 'DELETE', submit: true}
                    }).always(function (data) {
                        jQuery('#users-table').DataTable().draw(false);
                    });
                    /*swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )*/
                }
            });
        }
    </script>
@endpush
