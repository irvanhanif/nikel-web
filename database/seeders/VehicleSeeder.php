<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleCategory::insert([
            'name' => "Pengangkut Barang",
            'slug' => "Pengangkut-Barang"
        ]);
        Vehicle::insert([
            'name' => "Mobil Pick Up",
            'category' => "1",
            'fuel' => "Solar",
            'slug' => "mobil-pick-up",
            'rental_company' => "PT Cipta Kerja",
            'service_date' => "2023-09-07"
        ]);
    }
}
