@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.pickup.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.pickups.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pickup.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $pickup->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pickup.fields.vehicle') }}
                                    </th>
                                    <td>
                                        {{ $pickup->vehicle->license ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pickup.fields.suplier') }}
                                    </th>
                                    <td>
                                        {{ $pickup->suplier->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pickup.fields.carrier') }}
                                    </th>
                                    <td>
                                        {{ $pickup->carrier->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pickup.fields.storage_location') }}
                                    </th>
                                    <td>
                                        {{ $pickup->storage_location }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pickup.fields.withdrawal_authorization') }}
                                    </th>
                                    <td>
                                        {{ $pickup->withdrawal_authorization }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pickup.fields.withdrawal_authorization_file') }}
                                    </th>
                                    <td>
                                        @foreach($pickup->withdrawal_authorization_file as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pickup.fields.withdrawal_authorization_date') }}
                                    </th>
                                    <td>
                                        {{ $pickup->withdrawal_authorization_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pickup.fields.documents') }}
                                    </th>
                                    <td>
                                        @foreach($pickup->documents as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pickup.fields.pickup_state') }}
                                    </th>
                                    <td>
                                        {{ $pickup->pickup_state->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.pickup.fields.pickup_state_date') }}
                                    </th>
                                    <td>
                                        {{ $pickup->pickup_state_date }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.pickups.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection