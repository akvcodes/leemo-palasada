<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;

    protected $primaryKey = 'qr_id';
    public $timestamps = false;

    protected $fillable = [
        'stall_id', 'qr_code_path', 'qr_value', 'is_active', 'generated_at', 'expires_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'generated_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function stall()
    {
        return $this->belongsTo(Stall::class, 'stall_id', 'stall_id');
    }
}