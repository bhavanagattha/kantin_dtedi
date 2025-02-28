<?php

namespace App\Models;

use App\Enums\MenuType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';

    protected $casts = [
        'menu_type' => MenuType::class,
    ];

    protected $fillable = ['name', 'price', 'stok', 'supplier_id', 'type_id', 'picture'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
