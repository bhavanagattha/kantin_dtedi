<?php

namespace App\Models;

use App\Enums\Days;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedules extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => Days::class
    ];

    protected $fillable = ['shift_id', 'cashier_id', 'day'];

    public function shift()
    {
        return $this->belongsTo(shifts::class);
    }

    public function cashier()
    {
        return $this->belongsTo(cashier::class);
    }

    public function attendances()
    {
        return $this->hasMany(attendances::class);
    }
}
