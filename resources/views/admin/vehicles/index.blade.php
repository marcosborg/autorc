@extends('layouts.admin')
@section('content')
<div class="content">
    @can('vehicle_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.vehicles.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.vehicle.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Vehicle', 'route' => 'admin.vehicles.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.vehicle.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Vehicle">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.license') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.brand') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.model') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.year') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.motor_nr') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.vehicle_identification_number_vin') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.license_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.color') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.kilometers') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.seller_client') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.seller_company') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.buyer_client') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.buyer_company') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.purchase_and_sale_agreement') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.copy_of_the_citizen_card') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.tax_identification_card') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.copy_of_the_stamp_duty_receipt') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.vehicle_registration_document') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.vehicle_ownership_title') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.vehicle_keys') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.vehicle_manuals') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.release_of_reservation_or_mortgage') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.leasing_agreement') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.vehicle.fields.documents') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($brands as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($clients as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($companies as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($clients as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($companies as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('vehicle_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.vehicles.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.vehicles.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'license', name: 'license' },
{ data: 'brand_name', name: 'brand.name' },
{ data: 'model', name: 'model' },
{ data: 'year', name: 'year' },
{ data: 'motor_nr', name: 'motor_nr' },
{ data: 'vehicle_identification_number_vin', name: 'vehicle_identification_number_vin' },
{ data: 'license_date', name: 'license_date' },
{ data: 'color', name: 'color' },
{ data: 'kilometers', name: 'kilometers' },
{ data: 'seller_client_name', name: 'seller_client.name' },
{ data: 'seller_company_name', name: 'seller_company.name' },
{ data: 'buyer_client_name', name: 'buyer_client.name' },
{ data: 'buyer_company_name', name: 'buyer_company.name' },
{ data: 'purchase_and_sale_agreement', name: 'purchase_and_sale_agreement' },
{ data: 'copy_of_the_citizen_card', name: 'copy_of_the_citizen_card' },
{ data: 'tax_identification_card', name: 'tax_identification_card' },
{ data: 'copy_of_the_stamp_duty_receipt', name: 'copy_of_the_stamp_duty_receipt' },
{ data: 'vehicle_registration_document', name: 'vehicle_registration_document' },
{ data: 'vehicle_ownership_title', name: 'vehicle_ownership_title' },
{ data: 'vehicle_keys', name: 'vehicle_keys' },
{ data: 'vehicle_manuals', name: 'vehicle_manuals' },
{ data: 'release_of_reservation_or_mortgage', name: 'release_of_reservation_or_mortgage' },
{ data: 'leasing_agreement', name: 'leasing_agreement' },
{ data: 'date', name: 'date' },
{ data: 'documents', name: 'documents', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Vehicle').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
});

</script>
@endsection