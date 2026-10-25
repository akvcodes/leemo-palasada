<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentStatusLog extends Model
{
    use HasFactory;

    protected $table = 'payment_status_log'; // <--- ADD THIS LINE
    protected $primaryKey = 'log_id';
    public $timestamps = false;

    protected $fillable = [
        'contract_id', 'renter_id', 'month_reference', 'payment_status', 
        'receipt_id', 'recognized_by', 'status_updated_at', 'notes',
    ];

    protected $casts = [
        'month_reference' => 'date',
        'status_updated_at' => 'datetime',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id', 'contract_id');
    }

    public function renter()
    {
        return $this->belongsTo(Renter::class, 'renter_id', 'renter_id');
    }
}