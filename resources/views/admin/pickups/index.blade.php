@extends('layouts.admin')
@section('content')
<div class="content">
    @can('pickup_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.pickups.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.pickup.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Pickup', 'route' => 'admin.pickups.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.pickup.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Pickup">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.pickup.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.pickup.fields.vehicle') }}
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
                                    {{ trans('cruds.pickup.fields.suplier') }}
                                </th>
                                <th>
                                    {{ trans('cruds.pickup.fields.carrier') }}
                                </th>
                                <th>
                                    {{ trans('cruds.pickup.fields.storage_location') }}
                                </th>
                                <th>
                                    {{ trans('cruds.pickup.fields.withdrawal_authorization') }}
                                </th>
                                <th>
                                    {{ trans('cruds.pickup.fields.withdrawal_authorization_file') }}
                                </th>
                                <th>
                                    {{ trans('cruds.pickup.fields.withdrawal_authorization_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.pickup.fields.documents') }}
                                </th>
                                <th>
                                    {{ trans('cruds.pickup.fields.pickup_state') }}
                                </th>
                                <th>
                                    {{ trans('cruds.pickup.fields.pickup_state_date') }}
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
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($vehicles as $key => $item)
                                            <option value="{{ $item->license }}">{{ $item->license }}</option>
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
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($supliers as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($carriers as $key => $item)
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
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($pickup_states as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
@can('pickup_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pickups.massDestroy') }}",
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
    ajax: "{{ route('admin.pickups.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'vehicle_license', name: 'vehicle.license' },
{ data: 'vehicle.model', name: 'vehicle.model' },
{ data: 'vehicle.year', name: 'vehicle.year' },
{ data: 'vehicle.motor_nr', name: 'vehicle.motor_nr' },
{ data: 'vehicle.vehicle_identification_number_vin', name: 'vehicle.vehicle_identification_number_vin' },
{ data: 'suplier_name', name: 'suplier.name' },
{ data: 'carrier_name', name: 'carrier.name' },
{ data: 'storage_location', name: 'storage_location' },
{ data: 'withdrawal_authorization', name: 'withdrawal_authorization' },
{ data: 'withdrawal_authorization_file', name: 'withdrawal_authorization_file', sortable: false, searchable: false },
{ data: 'withdrawal_authorization_date', name: 'withdrawal_authorization_date' },
{ data: 'documents', name: 'documents', sortable: false, searchable: false },
{ data: 'pickup_state_name', name: 'pickup_state.name' },
{ data: 'pickup_state_date', name: 'pickup_state_date' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Pickup').DataTable(dtOverrideGlobals);
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