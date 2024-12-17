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

class Pickup extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'pickups';

    public static $searchable = [
        'storage_location',
    ];

    protected $appends = [
        'withdrawal_authorization_file',
        'documents',
    ];

    protected $dates = [
        'withdrawal_authorization_date',
        'pickup_state_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'vehicle_id',
        'suplier_id',
        'carrier_id',
        'storage_location',
        'withdrawal_authorization',
        'withdrawal_authorization_date',
        'pickup_state_id',
        'pickup_state_date',
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

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function suplier()
    {
        return $this->belongsTo(Suplier::class, 'suplier_id');
    }

    public function carrier()
    {
        return $this->belongsTo(Carrier::class, 'carrier_id');
    }

    public function getWithdrawalAuthorizationFileAttribute()
    {
        return $this->getMedia('withdrawal_authorization_file');
    }

    public function getWithdrawalAuthorizationDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setWithdrawalAuthorizationDateAttribute($value)
    {
        $this->attributes['withdrawal_authorization_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDocumentsAttribute()
    {
        return $this->getMedia('documents');
    }

    public function pickup_state()
    {
        return $this->belongsTo(PickupState::class, 'pickup_state_id');
    }

    public function getPickupStateDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setPickupStateDateAttribute($value)
    {
        $this->attributes['pickup_state_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
