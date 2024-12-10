@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.vehicle.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.vehicles.update", [$vehicle->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('license') ? 'has-error' : '' }}">
                                    <label for="license">{{ trans('cruds.vehicle.fields.license') }}</label>
                                    <input class="form-control" type="text" name="license" id="license" value="{{ old('license', $vehicle->license) }}">
                                    @if($errors->has('license'))
                                    <span class="help-block" role="alert">{{ $errors->first('license') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.vehicle.fields.license_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('brand') ? 'has-error' : '' }}">
                                    <label for="brand_id">{{ trans('cruds.vehicle.fields.brand') }}</label>
                                    <select class="form-control select2" name="brand_id" id="brand_id">
                                        @foreach($brands as $id => $entry)
                                        <option value="{{ $id }}" {{ (old('brand_id') ? old('brand_id') : $vehicle->brand->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('brand'))
                                    <span class="help-block" role="alert">{{ $errors->first('brand') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.vehicle.fields.brand_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('model') ? 'has-error' : '' }}">
                                    <label for="model">{{ trans('cruds.vehicle.fields.model') }}</label>
                                    <input class="form-control" type="text" name="model" id="model" value="{{ old('model', $vehicle->model) }}">
                                    @if($errors->has('model'))
                                    <span class="help-block" role="alert">{{ $errors->first('model') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.vehicle.fields.model_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('year') ? 'has-error' : '' }}">
                                    <label for="year">{{ trans('cruds.vehicle.fields.year') }}</label>
                                    <input class="form-control" type="number" name="year" id="year" value="{{ old('year', $vehicle->year) }}" step="1">
                                    @if($errors->has('year'))
                                    <span class="help-block" role="alert">{{ $errors->first('year') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.vehicle.fields.year_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('motor_nr') ? 'has-error' : '' }}">
                                    <label for="motor_nr">{{ trans('cruds.vehicle.fields.motor_nr') }}</label>
                                    <input class="form-control" type="text" name="motor_nr" id="motor_nr" value="{{ old('motor_nr', $vehicle->motor_nr) }}">
                                    @if($errors->has('motor_nr'))
                                    <span class="help-block" role="alert">{{ $errors->first('motor_nr') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.vehicle.fields.motor_nr_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('vehicle_identification_number_vin') ? 'has-error' : '' }}">
                                    <label for="vehicle_identification_number_vin">{{ trans('cruds.vehicle.fields.vehicle_identification_number_vin') }}</label>
                                    <input class="form-control" type="text" name="vehicle_identification_number_vin" id="vehicle_identification_number_vin" value="{{ old('vehicle_identification_number_vin', $vehicle->vehicle_identification_number_vin) }}">
                                    @if($errors->has('vehicle_identification_number_vin'))
                                    <span class="help-block" role="alert">{{ $errors->first('vehicle_identification_number_vin') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.vehicle.fields.vehicle_identification_number_vin_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('license_date') ? 'has-error' : '' }}">
                                    <label for="license_date">{{ trans('cruds.vehicle.fields.license_date') }}</label>
                                    <input class="form-control date" type="text" name="license_date" id="license_date" value="{{ old('license_date', $vehicle->license_date) }}">
                                    @if($errors->has('license_date'))
                                    <span class="help-block" role="alert">{{ $errors->first('license_date') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.vehicle.fields.license_date_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
                                    <label for="color">{{ trans('cruds.vehicle.fields.color') }}</label>
                                    <input class="form-control" type="text" name="color" id="color" value="{{ old('color', $vehicle->color) }}">
                                    @if($errors->has('color'))
                                    <span class="help-block" role="alert">{{ $errors->first('color') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.vehicle.fields.color_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('kilometers') ? 'has-error' : '' }}">
                                    <label for="kilometers">{{ trans('cruds.vehicle.fields.kilometers') }}</label>
                                    <input class="form-control" type="number" name="kilometers" id="kilometers" value="{{ old('kilometers', $vehicle->kilometers) }}" step="1">
                                    @if($errors->has('kilometers'))
                                    <span class="help-block" role="alert">{{ $errors->first('kilometers') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.vehicle.fields.kilometers_helper') }}</span>
                                </div>
                            </div>
                        </div>
                        <h3>Documents</h3>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group {{ $errors->has('seller_client') ? 'has-error' : '' }}">
                                            <label for="seller_client_id">{{ trans('cruds.vehicle.fields.seller_client') }}</label>
                                            <select class="form-control select2" name="seller_client_id" id="seller_client_id">
                                                @foreach($seller_clients as $id => $entry)
                                                <option value="{{ $id }}" {{ (old('seller_client_id') ? old('seller_client_id') : $vehicle->seller_client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('seller_client'))
                                            <span class="help-block" role="alert">{{ $errors->first('seller_client') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.vehicle.fields.seller_client_helper') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('buyer_client') ? 'has-error' : '' }}">
                                            <label for="buyer_client_id">{{ trans('cruds.vehicle.fields.buyer_client') }}</label>
                                            <select class="form-control select2" name="buyer_client_id" id="buyer_client_id">
                                                @foreach($buyer_clients as $id => $entry)
                                                <option value="{{ $id }}" {{ (old('buyer_client_id') ? old('buyer_client_id') : $vehicle->buyer_client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('buyer_client'))
                                            <span class="help-block" role="alert">{{ $errors->first('buyer_client') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.vehicle.fields.buyer_client_helper') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('purchase_and_sale_agreement') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="purchase_and_sale_agreement" value="0">
                                                <input type="checkbox" name="purchase_and_sale_agreement" id="purchase_and_sale_agreement" value="1" {{ $vehicle->purchase_and_sale_agreement || old('purchase_and_sale_agreement', 0) === 1 ? 'checked' : '' }}>
                                                <label for="purchase_and_sale_agreement" style="font-weight: 400">{{ trans('cruds.vehicle.fields.purchase_and_sale_agreement') }}</label>
                                            </div>
                                            @if($errors->has('purchase_and_sale_agreement'))
                                            <span class="help-block" role="alert">{{ $errors->first('purchase_and_sale_agreement') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.vehicle.fields.purchase_and_sale_agreement_helper') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('copy_of_the_citizen_card') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="copy_of_the_citizen_card" value="0">
                                                <input type="checkbox" name="copy_of_the_citizen_card" id="copy_of_the_citizen_card" value="1" {{ $vehicle->copy_of_the_citizen_card || old('copy_of_the_citizen_card', 0) === 1 ? 'checked' : '' }}>
                                                <label for="copy_of_the_citizen_card" style="font-weight: 400">{{ trans('cruds.vehicle.fields.copy_of_the_citizen_card') }}</label>
                                            </div>
                                            @if($errors->has('copy_of_the_citizen_card'))
                                            <span class="help-block" role="alert">{{ $errors->first('copy_of_the_citizen_card') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.vehicle.fields.copy_of_the_citizen_card_helper') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('tax_identification_card') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="tax_identification_card" value="0">
                                                <input type="checkbox" name="tax_identification_card" id="tax_identification_card" value="1" {{ $vehicle->tax_identification_card || old('tax_identification_card', 0) === 1 ? 'checked' : '' }}>
                                                <label for="tax_identification_card" style="font-weight: 400">{{ trans('cruds.vehicle.fields.tax_identification_card') }}</label>
                                            </div>
                                            @if($errors->has('tax_identification_card'))
                                            <span class="help-block" role="alert">{{ $errors->first('tax_identification_card') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.vehicle.fields.tax_identification_card_helper') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('copy_of_the_stamp_duty_receipt') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="copy_of_the_stamp_duty_receipt" value="0">
                                                <input type="checkbox" name="copy_of_the_stamp_duty_receipt" id="copy_of_the_stamp_duty_receipt" value="1" {{ $vehicle->copy_of_the_stamp_duty_receipt || old('copy_of_the_stamp_duty_receipt', 0) === 1 ? 'checked' : '' }}>
                                                <label for="copy_of_the_stamp_duty_receipt" style="font-weight: 400">{{ trans('cruds.vehicle.fields.copy_of_the_stamp_duty_receipt') }}</label>
                                            </div>
                                            @if($errors->has('copy_of_the_stamp_duty_receipt'))
                                            <span class="help-block" role="alert">{{ $errors->first('copy_of_the_stamp_duty_receipt') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.vehicle.fields.copy_of_the_stamp_duty_receipt_helper') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('vehicle_registration_document') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="vehicle_registration_document" value="0">
                                                <input type="checkbox" name="vehicle_registration_document" id="vehicle_registration_document" value="1" {{ $vehicle->vehicle_registration_document || old('vehicle_registration_document', 0) === 1 ? 'checked' : '' }}>
                                                <label for="vehicle_registration_document" style="font-weight: 400">{{ trans('cruds.vehicle.fields.vehicle_registration_document') }}</label>
                                            </div>
                                            @if($errors->has('vehicle_registration_document'))
                                            <span class="help-block" role="alert">{{ $errors->first('vehicle_registration_document') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.vehicle.fields.vehicle_registration_document_helper') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('vehicle_ownership_title') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="vehicle_ownership_title" value="0">
                                                <input type="checkbox" name="vehicle_ownership_title" id="vehicle_ownership_title" value="1" {{ $vehicle->vehicle_ownership_title || old('vehicle_ownership_title', 0) === 1 ? 'checked' : '' }}>
                                                <label for="vehicle_ownership_title" style="font-weight: 400">{{ trans('cruds.vehicle.fields.vehicle_ownership_title') }}</label>
                                            </div>
                                            @if($errors->has('vehicle_ownership_title'))
                                            <span class="help-block" role="alert">{{ $errors->first('vehicle_ownership_title') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.vehicle.fields.vehicle_ownership_title_helper') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('vehicle_keys') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="vehicle_keys" value="0">
                                                <input type="checkbox" name="vehicle_keys" id="vehicle_keys" value="1" {{ $vehicle->vehicle_keys || old('vehicle_keys', 0) === 1 ? 'checked' : '' }}>
                                                <label for="vehicle_keys" style="font-weight: 400">{{ trans('cruds.vehicle.fields.vehicle_keys') }}</label>
                                            </div>
                                            @if($errors->has('vehicle_keys'))
                                            <span class="help-block" role="alert">{{ $errors->first('vehicle_keys') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.vehicle.fields.vehicle_keys_helper') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('vehicle_manuals') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="vehicle_manuals" value="0">
                                                <input type="checkbox" name="vehicle_manuals" id="vehicle_manuals" value="1" {{ $vehicle->vehicle_manuals || old('vehicle_manuals', 0) === 1 ? 'checked' : '' }}>
                                                <label for="vehicle_manuals" style="font-weight: 400">{{ trans('cruds.vehicle.fields.vehicle_manuals') }}</label>
                                            </div>
                                            @if($errors->has('vehicle_manuals'))
                                            <span class="help-block" role="alert">{{ $errors->first('vehicle_manuals') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.vehicle.fields.vehicle_manuals_helper') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('release_of_reservation_or_mortgage') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="release_of_reservation_or_mortgage" value="0">
                                                <input type="checkbox" name="release_of_reservation_or_mortgage" id="release_of_reservation_or_mortgage" value="1" {{ $vehicle->release_of_reservation_or_mortgage || old('release_of_reservation_or_mortgage', 0) === 1 ? 'checked' : '' }}>
                                                <label for="release_of_reservation_or_mortgage" style="font-weight: 400">{{ trans('cruds.vehicle.fields.release_of_reservation_or_mortgage') }}</label>
                                            </div>
                                            @if($errors->has('release_of_reservation_or_mortgage'))
                                            <span class="help-block" role="alert">{{ $errors->first('release_of_reservation_or_mortgage') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.vehicle.fields.release_of_reservation_or_mortgage_helper') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('leasing_agreement') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="leasing_agreement" value="0">
                                                <input type="checkbox" name="leasing_agreement" id="leasing_agreement" value="1" {{ $vehicle->leasing_agreement || old('leasing_agreement', 0) === 1 ? 'checked' : '' }}>
                                                <label for="leasing_agreement" style="font-weight: 400">{{ trans('cruds.vehicle.fields.leasing_agreement') }}</label>
                                            </div>
                                            @if($errors->has('leasing_agreement'))
                                            <span class="help-block" role="alert">{{ $errors->first('leasing_agreement') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.vehicle.fields.leasing_agreement_helper') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                                            <label for="date">{{ trans('cruds.vehicle.fields.date') }}</label>
                                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $vehicle->date) }}">
                                            @if($errors->has('date'))
                                            <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.vehicle.fields.date_helper') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group {{ $errors->has('documents') ? 'has-error' : '' }}">
                                            <label for="documents">{{ trans('cruds.vehicle.fields.documents') }}</label>
                                            <div class="needsclick dropzone" id="documents-dropzone">
                                            </div>
                                            @if($errors->has('documents'))
                                            <span class="help-block" role="alert">{{ $errors->first('documents') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.vehicle.fields.documents_helper') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('pending') ? 'has-error' : '' }}">
                                    <label for="pending">{{ trans('cruds.vehicle.fields.pending') }}</label>
                                    <textarea class="form-control ckeditor" name="pending" id="pending">{!! old('pending', $vehicle->pending) !!}</textarea>
                                    @if($errors->has('pending'))
                                    <span class="help-block" role="alert">{{ $errors->first('pending') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.vehicle.fields.pending_helper') }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has('additional_items') ? 'has-error' : '' }}">
                                    <label for="additional_items">{{ trans('cruds.vehicle.fields.additional_items') }}</label>
                                    <textarea class="form-control ckeditor" name="additional_items" id="additional_items">{!! old('additional_items', $vehicle->additional_items) !!}</textarea>
                                    @if($errors->has('additional_items'))
                                    <span class="help-block" role="alert">{{ $errors->first('additional_items') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.vehicle.fields.additional_items_helper') }}</span>
                                </div>
                            </div>
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
    var uploadedDocumentsMap = {}
    Dropzone.options.documentsDropzone = {
        url: '{{ route('admin.vehicles.storeMedia') }}',
        maxFilesize: 2000, // MB
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        params: {
            size: 2000
        },
        success: function(file, response) {
            $('form').append('<input type="hidden" name="documents[]" value="' + response.name + '">')
            uploadedDocumentsMap[file.name] = response.name
        },
        removedfile: function(file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentsMap[file.name]
            }
            $('form').find('input[name="documents[]"][value="' + name + '"]').remove()
        },
        init: function() {
            @if(isset($vehicle) && $vehicle->documents)
            var files = {!! json_encode($vehicle->documents) !!}
            for (var i in files) {
                var file = files[i]
                this.options.addedfile.call(this, file)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="documents[]" value="' + file.file_name + '">')
            }
            @endif
        },
        error: function(file, response) {
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
    $(document).ready(function() {
        function SimpleUploadAdapter(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                return {
                    upload: function() {
                        return loader.file
                            .then(function(file) {
                                return new Promise(function(resolve, reject) {
                                    // Init request
                                    var xhr = new XMLHttpRequest();
                                    xhr.open('POST', '{{ route('admin.vehicles.storeCKEditorImages') }}', true);
                                    xhr.setRequestHeader('x-csrf-token', window._token);
                                    xhr.setRequestHeader('Accept', 'application/json');
                                    xhr.responseType = 'json';

                                    // Init listeners
                                    var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                                    xhr.addEventListener('error', function() {
                                        reject(genericErrorText)
                                    });
                                    xhr.addEventListener('abort', function() {
                                        reject()
                                    });
                                    xhr.addEventListener('load', function() {
                                        var response = xhr.response;

                                        if (!response || xhr.status !== 201) {
                                            return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                                        }

                                        $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                                        resolve({
                                            default: response.url
                                        });
                                    });

                                    if (xhr.upload) {
                                        xhr.upload.addEventListener('progress', function(e) {
                                            if (e.lengthComputable) {
                                                loader.uploadTotal = e.total;
                                                loader.uploaded = e.loaded;
                                            }
                                        });
                                    }

                                    // Send request
                                    var data = new FormData();
                                    data.append('upload', file);
                                    data.append('crud_id', '{{ $vehicle->id ?? 0 }}');
                                    xhr.send(data);
                                });
                            })
                    }
                };
            }
        }

        var allEditors = document.querySelectorAll('.ckeditor');
        for (var i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(
                allEditors[i], {
                    extraPlugins: [SimpleUploadAdapter]
                }
            );
        }
    });
</script>

@endsection