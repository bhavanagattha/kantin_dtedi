<?php

namespace App\Models;

use App\Enums\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipts extends Model
{
    use HasFactory;

    protected $casts = [
        'payment_type' => Payment::class
    ];

    protected $fillable = ['type', 'cashier_id', 'payment', 'returns', 'time'];

    public function cashier()
    {
        return $this->belongsTo(cashier::class);
    }

    public function orders()
    {
        return $this->hasMany(orders::class, 'receipts_id');
    }
}
