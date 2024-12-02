<?php

namespace App\Models;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendances extends Model
{
    use HasFactory;
    protected $fillable = ['attendance', 'schedule_id', 'admin_name', 'date'];
    
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function cashier()
    {
        return $this->belongsTo(cashier::class);
    }
}
