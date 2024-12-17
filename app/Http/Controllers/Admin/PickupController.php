<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPickupRequest;
use App\Http\Requests\StorePickupRequest;
use App\Http\Requests\UpdatePickupRequest;
use App\Models\Carrier;
use App\Models\Pickup;
use App\Models\PickupState;
use App\Models\Suplier;
use App\Models\Vehicle;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PickupController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('pickup_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Pickup::with(['vehicle', 'suplier', 'carrier', 'pickup_state'])->select(sprintf('%s.*', (new Pickup)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'pickup_show';
                $editGate      = 'pickup_edit';
                $deleteGate    = 'pickup_delete';
                $crudRoutePart = 'pickups';

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
            $table->addColumn('vehicle_license', function ($row) {
                return $row->vehicle ? $row->vehicle->license : '';
            });

            $table->editColumn('vehicle.model', function ($row) {
                return $row->vehicle ? (is_string($row->vehicle) ? $row->vehicle : $row->vehicle->model) : '';
            });
            $table->editColumn('vehicle.year', function ($row) {
                return $row->vehicle ? (is_string($row->vehicle) ? $row->vehicle : $row->vehicle->year) : '';
            });
            $table->editColumn('vehicle.motor_nr', function ($row) {
                return $row->vehicle ? (is_string($row->vehicle) ? $row->vehicle : $row->vehicle->motor_nr) : '';
            });
            $table->editColumn('vehicle.vehicle_identification_number_vin', function ($row) {
                return $row->vehicle ? (is_string($row->vehicle) ? $row->vehicle : $row->vehicle->vehicle_identification_number_vin) : '';
            });
            $table->addColumn('suplier_name', function ($row) {
                return $row->suplier ? $row->suplier->name : '';
            });

            $table->addColumn('carrier_name', function ($row) {
                return $row->carrier ? $row->carrier->name : '';
            });

            $table->editColumn('storage_location', function ($row) {
                return $row->storage_location ? $row->storage_location : '';
            });
            $table->editColumn('withdrawal_authorization', function ($row) {
                return $row->withdrawal_authorization ? $row->withdrawal_authorization : '';
            });
            $table->editColumn('withdrawal_authorization_file', function ($row) {
                if (! $row->withdrawal_authorization_file) {
                    return '';
                }
                $links = [];
                foreach ($row->withdrawal_authorization_file as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>';
                }

                return implode(', ', $links);
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
            $table->addColumn('pickup_state_name', function ($row) {
                return $row->pickup_state ? $row->pickup_state->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'vehicle', 'suplier', 'carrier', 'withdrawal_authorization_file', 'documents', 'pickup_state']);

            return $table->make(true);
        }

        $vehicles      = Vehicle::get();
        $supliers      = Suplier::get();
        $carriers      = Carrier::get();
        $pickup_states = PickupState::get();

        return view('admin.pickups.index', compact('vehicles', 'supliers', 'carriers', 'pickup_states'));
    }

    public function create()
    {
        abort_if(Gate::denies('pickup_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicles = Vehicle::pluck('license', 'id')->prepend(trans('global.pleaseSelect'), '');

        $supliers = Suplier::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $carriers = Carrier::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pickup_states = PickupState::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pickups.create', compact('carriers', 'pickup_states', 'supliers', 'vehicles'));
    }

    public function store(StorePickupRequest $request)
    {
        $pickup = Pickup::create($request->all());

        foreach ($request->input('withdrawal_authorization_file', []) as $file) {
            $pickup->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('withdrawal_authorization_file');
        }

        foreach ($request->input('documents', []) as $file) {
            $pickup->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $pickup->id]);
        }

        return redirect()->route('admin.pickups.index');
    }

    public function edit(Pickup $pickup)
    {
        abort_if(Gate::denies('pickup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicles = Vehicle::pluck('license', 'id')->prepend(trans('global.pleaseSelect'), '');

        $supliers = Suplier::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $carriers = Carrier::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pickup_states = PickupState::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pickup->load('vehicle', 'suplier', 'carrier', 'pickup_state');

        return view('admin.pickups.edit', compact('carriers', 'pickup', 'pickup_states', 'supliers', 'vehicles'));
    }

    public function update(UpdatePickupRequest $request, Pickup $pickup)
    {
        $pickup->update($request->all());

        if (count($pickup->withdrawal_authorization_file) > 0) {
            foreach ($pickup->withdrawal_authorization_file as $media) {
                if (! in_array($media->file_name, $request->input('withdrawal_authorization_file', []))) {
                    $media->delete();
                }
            }
        }
        $media = $pickup->withdrawal_authorization_file->pluck('file_name')->toArray();
        foreach ($request->input('withdrawal_authorization_file', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $pickup->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('withdrawal_authorization_file');
            }
        }

        if (count($pickup->documents) > 0) {
            foreach ($pickup->documents as $media) {
                if (! in_array($media->file_name, $request->input('documents', []))) {
                    $media->delete();
                }
            }
        }
        $media = $pickup->documents->pluck('file_name')->toArray();
        foreach ($request->input('documents', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $pickup->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documents');
            }
        }

        return redirect()->route('admin.pickups.index');
    }

    public function show(Pickup $pickup)
    {
        abort_if(Gate::denies('pickup_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pickup->load('vehicle', 'suplier', 'carrier', 'pickup_state');

        return view('admin.pickups.show', compact('pickup'));
    }

    public function destroy(Pickup $pickup)
    {
        abort_if(Gate::denies('pickup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pickup->delete();

        return back();
    }

    public function massDestroy(MassDestroyPickupRequest $request)
    {
        $pickups = Pickup::find(request('ids'));

        foreach ($pickups as $pickup) {
            $pickup->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('pickup_create') && Gate::denies('pickup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Pickup();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
