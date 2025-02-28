<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['receipts_id', 'menu_id', 'amount', 'price', 'total_price'];

    public function receipt()
    {
        return $this->belongsTo(Receipts::class, 'receipts_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
