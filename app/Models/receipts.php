<?php

namespace App\Models;

use App\Enums\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipts extends Model
{
    use HasFactory;

    protected $table = 'receipts';

    protected $casts = [
        'payment_type' => Payment::class
    ];

    protected $fillable = ['type', 'cashier_id', 'payment', 'returns', 'time'];

    public function cashier()
    {
        return $this->belongsTo(Cashier::class);
    }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'receipts_id');
    }
}
