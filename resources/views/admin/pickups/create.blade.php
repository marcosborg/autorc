@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.pickup.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.pickups.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('vehicle') ? 'has-error' : '' }}">
                            <label class="required" for="vehicle_id">{{ trans('cruds.pickup.fields.vehicle') }}</label>
                            <select class="form-control select2" name="vehicle_id" id="vehicle_id" required>
                                @foreach($vehicles as $id => $entry)
                                    <option value="{{ $id }}" {{ old('vehicle_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('vehicle'))
                                <span class="help-block" role="alert">{{ $errors->first('vehicle') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.pickup.fields.vehicle_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('suplier') ? 'has-error' : '' }}">
                            <label class="required" for="suplier_id">{{ trans('cruds.pickup.fields.suplier') }}</label>
                            <select class="form-control select2" name="suplier_id" id="suplier_id" required>
                                @foreach($supliers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('suplier_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('suplier'))
                                <span class="help-block" role="alert">{{ $errors->first('suplier') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.pickup.fields.suplier_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('carrier') ? 'has-error' : '' }}">
                            <label class="required" for="carrier_id">{{ trans('cruds.pickup.fields.carrier') }}</label>
                            <select class="form-control select2" name="carrier_id" id="carrier_id" required>
                                @foreach($carriers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('carrier_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('carrier'))
                                <span class="help-block" role="alert">{{ $errors->first('carrier') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.pickup.fields.carrier_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('storage_location') ? 'has-error' : '' }}">
                            <label for="storage_location">{{ trans('cruds.pickup.fields.storage_location') }}</label>
                            <input class="form-control" type="text" name="storage_location" id="storage_location" value="{{ old('storage_location', '') }}">
                            @if($errors->has('storage_location'))
                                <span class="help-block" role="alert">{{ $errors->first('storage_location') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.pickup.fields.storage_location_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('withdrawal_authorization') ? 'has-error' : '' }}">
                            <label for="withdrawal_authorization">{{ trans('cruds.pickup.fields.withdrawal_authorization') }}</label>
                            <input class="form-control" type="text" name="withdrawal_authorization" id="withdrawal_authorization" value="{{ old('withdrawal_authorization', '') }}">
                            @if($errors->has('withdrawal_authorization'))
                                <span class="help-block" role="alert">{{ $errors->first('withdrawal_authorization') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.pickup.fields.withdrawal_authorization_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('withdrawal_authorization_file') ? 'has-error' : '' }}">
                            <label for="withdrawal_authorization_file">{{ trans('cruds.pickup.fields.withdrawal_authorization_file') }}</label>
                            <div class="needsclick dropzone" id="withdrawal_authorization_file-dropzone">
                            </div>
                            @if($errors->has('withdrawal_authorization_file'))
                                <span class="help-block" role="alert">{{ $errors->first('withdrawal_authorization_file') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.pickup.fields.withdrawal_authorization_file_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('withdrawal_authorization_date') ? 'has-error' : '' }}">
                            <label for="withdrawal_authorization_date">{{ trans('cruds.pickup.fields.withdrawal_authorization_date') }}</label>
                            <input class="form-control datetime" type="text" name="withdrawal_authorization_date" id="withdrawal_authorization_date" value="{{ old('withdrawal_authorization_date') }}">
                            @if($errors->has('withdrawal_authorization_date'))
                                <span class="help-block" role="alert">{{ $errors->first('withdrawal_authorization_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.pickup.fields.withdrawal_authorization_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('documents') ? 'has-error' : '' }}">
                            <label for="documents">{{ trans('cruds.pickup.fields.documents') }}</label>
                            <div class="needsclick dropzone" id="documents-dropzone">
                            </div>
                            @if($errors->has('documents'))
                                <span class="help-block" role="alert">{{ $errors->first('documents') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.pickup.fields.documents_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pickup_state') ? 'has-error' : '' }}">
                            <label for="pickup_state_id">{{ trans('cruds.pickup.fields.pickup_state') }}</label>
                            <select class="form-control select2" name="pickup_state_id" id="pickup_state_id">
                                @foreach($pickup_states as $id => $entry)
                                    <option value="{{ $id }}" {{ old('pickup_state_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pickup_state'))
                                <span class="help-block" role="alert">{{ $errors->first('pickup_state') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.pickup.fields.pickup_state_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pickup_state_date') ? 'has-error' : '' }}">
                            <label for="pickup_state_date">{{ trans('cruds.pickup.fields.pickup_state_date') }}</label>
                            <input class="form-control datetime" type="text" name="pickup_state_date" id="pickup_state_date" value="{{ old('pickup_state_date') }}">
                            @if($errors->has('pickup_state_date'))
                                <span class="help-block" role="alert">{{ $errors->first('pickup_state_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.pickup.fields.pickup_state_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedWithdrawalAuthorizationFileMap = {}
Dropzone.options.withdrawalAuthorizationFileDropzone = {
    url: '{{ route('admin.pickups.storeMedia') }}',
    maxFilesize: 2000, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2000
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="withdrawal_authorization_file[]" value="' + response.name + '">')
      uploadedWithdrawalAuthorizationFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedWithdrawalAuthorizationFileMap[file.name]
      }
      $('form').find('input[name="withdrawal_authorization_file[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($pickup) && $pickup->withdrawal_authorization_file)
          var files =
            {!! json_encode($pickup->withdrawal_authorization_file) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="withdrawal_authorization_file[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
<script>
    var uploadedDocumentsMap = {}
Dropzone.options.documentsDropzone = {
    url: '{{ route('admin.pickups.storeMedia') }}',
    maxFilesize: 2000, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2000
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="documents[]" value="' + response.name + '">')
      uploadedDocumentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentsMap[file.name]
      }
      $('form').find('input[name="documents[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($pickup) && $pickup->documents)
          var files =
            {!! json_encode($pickup->documents) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="documents[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection