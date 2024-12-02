<?php

namespace App\Models;

use App\Enums\MenuType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;

    protected $casts = [
        'menu_type' => MenuType::class,
    ];

    protected $fillable = ['name', 'price', 'stok', 'supplier_id', 'type_id', 'picture'];

    public function supplier()
    {
        return $this->belongsTo(supplier::class);
    }

    public function orders()
    {
        return $this->hasMany(orders::class);
    }
}
