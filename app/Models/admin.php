<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class admin extends Model
{
    use HasFactory;

    protected $table = 'admin';
    
    protected $primaryKey = 'name';

    protected $fillable = ['name', 'password'];

    public function attendances()
    {
        return $this->hasMany(attendances::class, 'admin_name', 'name');
    }

    public function logs()
    {
        return $this->hasMany(log::class, 'admin_name', 'name');
    }
}
