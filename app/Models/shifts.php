<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shifts extends Model
{
    use HasFactory;

    protected $fillable = ['start_time', 'end_time'];

    public function schedules()
    {
        return $this->hasMany(schedules::class);
    }
}
