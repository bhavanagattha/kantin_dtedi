<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Supplier extends Model
{
    use HasFactory, Searchable;

    protected $casts = [
        'status' => Status::class,
    ];

    protected $table = 'supplier';

    protected $fillable = ['name', 'username', 'no_telp', 'income', 'status', 'profile_picture'];

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'username' => $this->username,
            'no_telp' => $this->no_telp,
            'status' => $this->status,
        ];
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
