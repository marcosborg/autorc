<?php

namespace App\Http\Requests;

use App\Models\Vehicle;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVehicleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vehicle_create');
    }

    public function rules()
    {
        return [
            'license' => [
                'string',
                'nullable',
            ],
            'model' => [
                'string',
                'nullable',
            ],
            'year' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'motor_nr' => [
                'string',
                'nullable',
            ],
            'vehicle_identification_number_vin' => [
                'string',
                'nullable',
            ],
            'license_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'color' => [
                'string',
                'nullable',
            ],
            'kilometers' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'documents' => [
                'array',
            ],
            'photos' => [
                'array',
            ],
            'invoice' => [
                'array',
            ],
            'payment_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
