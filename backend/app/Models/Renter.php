<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    use HasFactory;

    protected $primaryKey = 'renter_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'business_name', 'contact_number', 'address', 'valid_id_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'renter_id', 'renter_id');
    }
}