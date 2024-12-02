<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cashier extends Model
{
    protected $casts = [
        'status' => Status::class,
    ];

    use HasFactory;

    protected $fillable = ['name', 'password'];

    public function schedules()
    {
        return $this->hasMany(schedules::class);
    }

    public function logs()
    {
        return $this->hasMany(log::class);
    }

    public function receipts()
    {
        return $this->hasMany(receipts::class);
    }
}
