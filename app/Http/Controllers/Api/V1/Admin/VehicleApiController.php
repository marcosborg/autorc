<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Http\Resources\Admin\VehicleResource;
use App\Models\Vehicle;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VehicleApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vehicle_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleResource(Vehicle::with(['brand', 'seller_client', 'seller_company', 'buyer_client', 'buyer_company', 'suplier', 'payment_status'])->get());
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

        return (new VehicleResource($vehicle))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VehicleResource($vehicle->load(['brand', 'seller_client', 'seller_company', 'buyer_client', 'buyer_company', 'suplier', 'payment_status']));
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

        return (new VehicleResource($vehicle))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Vehicle $vehicle)
    {
        abort_if(Gate::denies('vehicle_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vehicle->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
