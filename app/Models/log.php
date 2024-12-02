<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    use HasFactory;

    protected $fillable = ['cashier_id', 'admin_name', 'action', 'date'];

    public function cashier()
    {
        return $this->belongsTo(cashier::class);
    }

    public function admin()
    {
        return $this->belongsTo(admin::class, 'admin_name', 'name');
    }
}
