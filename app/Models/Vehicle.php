<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Vehicle extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'vehicles';

    protected $appends = [
        'documents',
    ];

    protected $dates = [
        'license_date',
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'license',
        'brand_id',
        'model',
        'year',
        'motor_nr',
        'vehicle_identification_number_vin',
        'license_date',
        'color',
        'kilometers',
        'seller_client_id',
        'seller_company_id',
        'buyer_client_id',
        'buyer_company_id',
        'purchase_and_sale_agreement',
        'copy_of_the_citizen_card',
        'tax_identification_card',
        'copy_of_the_stamp_duty_receipt',
        'vehicle_registration_document',
        'vehicle_ownership_title',
        'vehicle_keys',
        'vehicle_manuals',
        'release_of_reservation_or_mortgage',
        'leasing_agreement',
        'date',
        'pending',
        'additional_items',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function getLicenseDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLicenseDateAttribute($value)
    {
        $this->attributes['license_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function seller_client()
    {
        return $this->belongsTo(Client::class, 'seller_client_id');
    }

    public function seller_company()
    {
        return $this->belongsTo(Company::class, 'seller_company_id');
    }

    public function buyer_client()
    {
        return $this->belongsTo(Client::class, 'buyer_client_id');
    }

    public function buyer_company()
    {
        return $this->belongsTo(Company::class, 'buyer_company_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDocumentsAttribute()
    {
        return $this->getMedia('documents');
    }
}