<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVehicleRequest;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Brand;
use App\Models\Client;
use App\Models\Company;
use App\Models\PaymentStatus;
use App\Models\Suplier;
use App\Models\Vehicle;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VehicleController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('vehicle_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Vehicle::with(['brand', 'seller_client', 'seller_company', 'buyer_client', 'buyer_company', 'suplier', 'payment_status'])->select(sprintf('%s.*', (new Vehicle)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'vehicle_show';
                $editGate      = 'vehicle_edit';
                $deleteGate    = 'vehicle_delete';
                $crudRoutePart = 'vehicles';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('license', function ($row) {
                return $row->license ? $row->license : '';
            });
            $table->addColumn('brand_name', function ($row) {
                return $row->brand ? $row->brand->name : '';
            });

            $table->editColumn('model', function ($row) {
                return $row->model ? $row->model : '';
            });
            $table->editColumn('year', function ($row) {
                return $row->year ? $row->year : '';
            });
            $table->editColumn('motor_nr', function ($row) {
                return $row->motor_nr ? $row->motor_nr : '';
            });
            $table->editColumn('vehicle_identification_number_vin', function ($row) {
                return $row->vehicle_identification_number_vin ? $row->vehicle_identification_number_vin : '';
            });

            $table->editColumn('color', function ($row) {
                return $row->color ? $row->color : '';
            });
            $table->editColumn('kilometers', function ($row) {
                return $row->kilometers ? $row->kilometers : '';
            });
            $table->addColumn('seller_client_name', function ($row) {
                return $row->seller_client ? $row->seller_client->name : '';
            });

            $table->addColumn('seller_company_name', function ($row) {
                return $row->seller_company ? $row->seller_company->name : '';
            });

            $table->addColumn('buyer_client_name', function ($row) {
                return $row->buyer_client ? $row->buyer_client->name : '';
            });

            $table->addColumn('buyer_company_name', function ($row) {
                return $row->buyer_company ? $row->buyer_company->name : '';
            });

            $table->editColumn('purchase_and_sale_agreement', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->purchase_and_sale_agreement ? 'checked' : null) . '>';
            });
            $table->editColumn('copy_of_the_citizen_card', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->copy_of_the_citizen_card ? 'checked' : null) . '>';
            });
            $table->editColumn('tax_identification_card', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->tax_identification_card ? 'checked' : null) . '>';
            });
            $table->editColumn('copy_of_the_stamp_duty_receipt', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->copy_of_the_stamp_duty_receipt ? 'checked' : null) . '>';
            });
            $table->editColumn('vehicle_registration_document', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->vehicle_registration_document ? 'checked' : null) . '>';
            });
            $table->editColumn('vehicle_ownership_title', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->vehicle_ownership_title ? 'checked' : null) . '>';
            });
            $table->editColumn('vehicle_keys', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->vehicle_keys ? 'checked' : null) . '>';
            });
            $table->editColumn('vehicle_manuals', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->vehicle_manuals ? 'checked' : null) . '>';
            });
            $table->editColumn('release_of_reservation_or_mortgage', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->release_of_reservation_or_mortgage ? 'checked' : null) . '>';
            });
            $table->editColumn('leasing_agreement', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->leasing_agreement ? 'checked' : null) . '>';
            });

            $table->editColumn('documents', function ($row) {
                if (! $row->documents) {
                    return '';
                }
                $links = [];
                foreach ($row->documents as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });
            $table->editColumn('purchase_price', function ($row) {
                return $row->purchase_price ? $row->purchase_price : '';
            });
            $table->editColumn('photos', function ($row) {
                if (! $row->photos) {
                    return '';
                }
                $links = [];
                foreach ($row->photos as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->addColumn('suplier_name', function ($row) {
                return $row->suplier ? $row->suplier->name : '';
            });

            $table->editColumn('invoice', function ($row) {
                if (! $row->invoice) {
                    return '';
                }
                $links = [];
                foreach ($row->invoice as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
            });

            $table->addColumn('payment_status_name', function ($row) {
                return $row->payment_status ? $row->payment_status->name : '';
            });

            $table->editColumn('amount_paid', function ($row) {
                return $row->amount_paid ? $row->amount_paid : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'brand', 'seller_client', 'seller_company', 'buyer_client', 'buyer_company', 'purchase_and_sale_agreement', 'copy_of_the_citizen_card', 'tax_identification_card', 'copy_of_the_stamp_duty_receipt', 'vehicle_registration_document', 'vehicle_ownership_title', 'vehicle_keys', 'vehicle_manuals', 'release_of_reservation_or_mortgage', 'leasing_agreement', 'documents', 'photos', 'suplier', 'invoice', 'payment_status']);

            return $table->make(true);
        }

        $brands           = Brand::get();
        $clients          = Client::get();
        $companies        = Company::get();
        $supliers         = Suplier::get();
        $payment_statuses = PaymentStatus::get();

        return view('admin.vehicles.index', compact('brands', 'clients', 'companies', 'supliers', 'payment_statuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('vehicle_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $seller_clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $seller_companies = Company::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $buyer_clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $buyer_companies = Company::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $supliers = Suplier::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_statuses = PaymentStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vehicles.create', compact('brands', 'buyer_clients', 'buyer_companies', 'payment_statuses', 'seller_clients', 'seller_companies', 'supliers'));
    }

    public function store(StoreVehicleRequest $request)
    {
        $vehicle = Vehicle::create($request->all());

        foreach ($request->input('documents', []) as $file) {
            $vehicle->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
        }

        foreach ($request->input('photos', []) as $file) {
            $vehicle->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

        foreach ($request->input('invoice', []) as $file) {
            $vehicle->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('invoice');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $vehicle->id]);
        }

        return redirect()->route('admin.vehicles.index');
    }

    public function edit(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $seller_clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $seller_companies = Company::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $buyer_clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $buyer_companies = Company::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $supliers = Suplier::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_statuses = PaymentStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicle->load('brand', 'seller_client', 'seller_company', 'buyer_client', 'buyer_company', 'suplier', 'payment_status');

        return view('admin.vehicles.edit', compact('brands', 'buyer_clients', 'buyer_companies', 'payment_statuses', 'seller_clients', 'seller_companies', 'supliers', 'vehicle'));
    }

    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());

        if (count($vehicle->documents) > 0) {
            foreach ($vehicle->documents as $media) {
                if (! in_array($media->file_name, $request->input('documents', []))) {
                    $media->delete();
                }
            }
        }
        $media = $vehicle->documents->pluck('file_name')->toArray();
        foreach ($request->input('documents', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $vehicle->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
            }
        }

        if (count($vehicle->photos) > 0) {
            foreach ($vehicle->photos as $media) {
                if (! in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $vehicle->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $vehicle->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        if (count($vehicle->invoice) > 0) {
            foreach ($vehicle->invoice as $media) {
                if (! in_array($media->file_name, $request->input('invoice', []))) {
                    $media->delete();
                }
            }
        }
        $media = $vehicle->invoice->pluck('file_name')->toArray();
        foreach ($request->input('invoice', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $vehicle->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('invoice');
            }
        }

        return redirect()->route('admin.vehicles.index');
    }

    public function show(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle->load('brand', 'seller_client', 'seller_company', 'buyer_client', 'buyer_company', 'suplier', 'payment_status');

        return view('admin.vehicles.show', compact('vehicle'));
    }

    public function destroy(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle->delete();

        return back();
    }

    public function massDestroy(MassDestroyVehicleRequest $request)
    {
        $vehicles = Vehicle::find(request('ids'));

        foreach ($vehicles as $vehicle) {
            $vehicle->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('vehicle_create') && Gate::denies('vehicle_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Vehicle();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
