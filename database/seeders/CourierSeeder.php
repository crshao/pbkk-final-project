<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('couriers')->insert([
            'name' => 'Michael Budiman',
            'phone_number' => '085574563214'
        ]);

        DB::table('couriers')->insert([
            'name' => 'Peter Imanuel',
            'phone_number' => '089552147441'
        ]);
    }
}
