<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $table = 'admin';
    
    // protected $primaryKey = 'name';

    protected $fillable = ['name', 'password', 'profile_picture'];

    public function attendances()
    {
        return $this->hasMany(Attendances::class, 'admin_name', 'name');
    }

    public function logs()
    {
        return $this->hasMany(Log::class, 'admin_name', 'name');
    }
}
