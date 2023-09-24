<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'category',
        'slug',
        'fuel',
        'rental_company',
        'service_date'
    ];

    protected $hidden = [
    ];

    public function categories () {
        return $this->belongsTo(VehicleCategory::class, 'category', 'id');
    }
}
