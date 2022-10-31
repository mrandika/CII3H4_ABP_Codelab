<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warehouse::create([
            'name' => 'Warehouse Buah Batu',
            'address' => 'Jalan Terusan Buah Batu'
        ]);

        Warehouse::create([
            'name' => 'Warehouse Telkom',
            'address' => 'Jalan Telekomunikasi 1'
        ]);
    }
}
