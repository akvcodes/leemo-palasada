<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketMap extends Model
{
    use HasFactory;

    protected $primaryKey = 'map_id';

    protected $fillable = [
        'map_name', 'map_image_path', 'width', 'height', 'default_zoom', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}