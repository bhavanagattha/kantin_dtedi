<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cashier extends Authenticatable
{
    // protected $casts = [
    //     'status' => Status::class,
    // ];

    use HasFactory, HasApiTokens;

    protected $fillable = ['name', 'password', 'profile_picture', 'status', 'username', 'no_telp', 'salary'];
    protected $table = 'cashier';

    public function schedules()
    {
        return $this->hasMany(Schedules::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipts::class);
    }
}
