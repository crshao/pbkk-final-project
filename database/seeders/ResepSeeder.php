<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class ResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reseps')->insert([
            'name' => "Ayam Goreng Mentega",
            'description' => "Ayam digoreng memakai mentega",
            'jenis' => "Gorengan",
            'gambar' => "storage/uploads/EUfkT160WgX6NrwKlJxKE4e4Fo7ZaS5EBdXeDu3W.jpg",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('reseps')->insert([
            'name' => "Ikan Asam Manis",
            'description' => "Ikan asam manis",
            'jenis' => "Kuah",
            'gambar' => "storage/uploads/D1HwmTV6cywhNTufCzTq3Kw1kfUSa0bDF0R020e2.jpg",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
