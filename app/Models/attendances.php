<?php

namespace App\Models;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    use HasFactory;

    protected $table = 'attendances';
    protected $fillable = ['attendance', 'schedule_id', 'admin_name', 'date'];
    
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function cashier()
    {
        return $this->belongsTo(Cashier::class);
    }
}
