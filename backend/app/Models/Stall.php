<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stall extends Model
{
    use HasFactory;

    protected $primaryKey = 'stall_id';

    protected $fillable = [
        'stall_number', 'location_x', 'location_y', 'category', 'size_sqm', 'monthly_rental_fee', 'status',
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'stall_id', 'stall_id');
    }
}