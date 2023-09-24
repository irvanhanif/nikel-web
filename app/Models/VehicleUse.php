<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleUse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vehicles_id',
        'users_id',
        'driver'
    ];

    protected $hidden = [
    ];

    public function user () {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function vehicle () {
        return $this->hasOne(Vehicle::class, 'id', 'vehicles_id');
    }
}
