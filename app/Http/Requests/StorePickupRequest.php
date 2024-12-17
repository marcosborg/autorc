<?php

namespace App\Http\Requests;

use App\Models\Pickup;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePickupRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pickup_create');
    }

    public function rules()
    {
        return [
            'vehicle_id' => [
                'required',
                'integer',
            ],
            'suplier_id' => [
                'required',
                'integer',
            ],
            'carrier_id' => [
                'required',
                'integer',
            ],
            'storage_location' => [
                'string',
                'nullable',
            ],
            'withdrawal_authorization' => [
                'string',
                'nullable',
            ],
            'withdrawal_authorization_file' => [
                'array',
            ],
            'withdrawal_authorization_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'documents' => [
                'array',
            ],
            'pickup_state_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
