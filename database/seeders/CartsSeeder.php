<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->insert([
            'totalBerat' => '1',
            'totalHarga' => '32000'
        ]);

        DB::table('carts')->insert([
            'totalBerat' => '2',
            'totalHarga' => '64000'
        ]);

        DB::table('carts')->insert([
            'totalBerat' => '3',
            'totalHarga' => '96000'
        ]);
    }
}
