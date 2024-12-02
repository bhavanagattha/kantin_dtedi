<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;


    protected $fillable = ['menu_id', 'cashier_id', 'previous_stock', 'end_stock'];

    public function menu()
    {
        return $this->belongsTo(menu::class);
    }

    public function cashier()
    {
        return $this->hasMany(cashier::class);
    }
}

