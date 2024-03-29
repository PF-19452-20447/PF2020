@extends('layouts.app')

@section('breadcrumbs')
    {{ Breadcrumbs::render('contratos.index') }}
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
                    {{ __('Contracts') }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <div class="dropdown dropdown-inline" id="datatable-buttons">

                        </div>
                       @canany(['adminApp', 'accessAsLandlord'])
                       <a href="{{ route('contratos.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            {{ __('Create Contract') }}
                        </a>
                       @endcanany
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
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {{$dataTable->scripts()}}
    <script>
        (function(window,$){
            $.fn.dataTable.Buttons.defaults.dom.container.className = '';
            $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-default btn-icon-sm';
            var buttons = new $.fn.dataTable.Buttons(window.LaravelDataTables["contrato-table"], {
                buttons: [
                    'export',
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
                        jQuery('#contrato-table').DataTable().draw(false);
                    });
                }
            });
        }
    </script>
@endpush
