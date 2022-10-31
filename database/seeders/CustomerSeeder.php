<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'Andika',
            'address' => 'Mengger Hilir',
            'phone_number' => '0812345678910'
        ]);

        Customer::create([
            'name' => 'Andiki',
            'address' => 'Sukapura',
            'phone_number' => '0812345876910'
        ]);
    }
}
