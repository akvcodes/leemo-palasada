<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeofenceSetting extends Model
{
    use HasFactory;

    protected $primaryKey = 'geofence_id';

    protected $fillable = [
        'market_id', 'latitude', 'longitude', 'radius_meters', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function market()
    {
        return $this->belongsTo(MarketMap::class, 'market_id', 'map_id');
    }
}