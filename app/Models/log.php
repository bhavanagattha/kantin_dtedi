<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'log';

    protected $fillable = ['cashier_id', 'admin_name', 'action', 'date'];

    public function cashier()
    {
        return $this->belongsTo(Cashier::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_name', 'name');
    }
}
