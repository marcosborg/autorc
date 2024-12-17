<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePickupRequest;
use App\Http\Requests\UpdatePickupRequest;
use App\Http\Resources\Admin\PickupResource;
use App\Models\Pickup;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PickupApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pickup_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PickupResource(Pickup::with(['vehicle', 'suplier', 'carrier', 'pickup_state'])->get());
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

        return (new PickupResource($pickup))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pickup $pickup)
    {
        abort_if(Gate::denies('pickup_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PickupResource($pickup->load(['vehicle', 'suplier', 'carrier', 'pickup_state']));
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

        return (new PickupResource($pickup))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pickup $pickup)
    {
        abort_if(Gate::denies('pickup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pickup->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
