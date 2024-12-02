<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = ['receipts_id', 'menu_id', 'amount', 'price', 'total_price'];

    public function receipt()
    {
        return $this->belongsTo(receipts::class, 'receipts_id');
    }

    public function menu()
    {
        return $this->belongsTo(menu::class);
    }
}
