<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stock';
    protected $fillable = ['menu_id', 'cashier_id', 'previous_stock', 'end_stock'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function cashier()
    {
        return $this->hasMany(Cashier::class);
    }
}

