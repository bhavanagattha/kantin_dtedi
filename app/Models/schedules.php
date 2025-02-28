<?php

namespace App\Models;

use App\Enums\Days;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $casts = [
        'type' => Days::class
    ];

    protected $fillable = ['shift_id', 'cashier_id', 'day'];

    public function shift()
    {
        return $this->belongsTo(Shifts::class);
    }

    public function cashier()
    {
        return $this->belongsTo(Cashier::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendances::class);
    }
}
