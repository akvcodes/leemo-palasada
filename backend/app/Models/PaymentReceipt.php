<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentReceipt extends Model
{
    use HasFactory;

    protected $primaryKey = 'receipt_id';

    protected $fillable = [
        'renter_id', 'contract_id', 'receipt_image_path', 'upload_date', 
        'month_reference', 'amount_paid', 'status', 'recognized_by', 
        'recognized_date', 'filed_date', 'rejection_reason', 'notes',
    ];

    protected $casts = [
        'upload_date' => 'datetime',
        'month_reference' => 'date',
        'recognized_date' => 'datetime',
        'filed_date' => 'datetime',
    ];

    public function renter()
    {
        return $this->belongsTo(Renter::class, 'renter_id', 'renter_id');
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id', 'contract_id');
    }
}