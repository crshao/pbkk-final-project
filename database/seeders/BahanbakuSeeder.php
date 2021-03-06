<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class BahanbakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bahanbakus')->insert([
            'name' => "Bawang Putih",
            'description' => "Bawang putih digunakan sebagai bumbu yang digunakan hampir di setiap makanan dan masakan Indonesia. Sebelum dipakai sebagai bumbu, bawang putih dihancurkan dengan ditekan dengan sisi pisau (dikeprek) sebelum dirajang halus dan ditumis di penggorengan dengan sedikit minyak goreng. Bawang putih bisa juga dihaluskan dengan berbagai jenis bahan bumbu yang lain. Bawang putih mempunyai khasiat sebagai antibiotik alami di dalam tubuh manusia",
            'pricetag' => "Rp. 3.200 / Ons",
            'price' => 3200,
            'jenis' => "Rempah",
            'gambar' => "storage/uploads/K1jwGWHOwBSqIm5qhJ48lvJZq9YxS6KS3HSWJpuG.jpg",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_id' => 12
        ]);

        DB::table('bahanbakus')->insert([
            'name' => "Bawang Merah",
            'description' => "bawang merah",
            'pricetag' => "Rp. 3.200 / Ons",
            'price' => 3200,
            'jenis' => "Rempah",
            'gambar' => "storage/uploads/mwKPe4M6sZDSHnAqnraZCHFpleKPZ9FlMYJqTork.jpg",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_id' => 12
        ]);

        DB::table('bahanbakus')->insert([
            'name' => "Wortel",
            'description' => "Wortel",
            'pricetag' => "Rp. 3.200 / Ons",
            'price' => 3200,
            'jenis' => "Sayur",
            'gambar' => "storage/uploads/Ge6GhG3qFT3HpZ99Oie0ChjAsQrY6LMYjRMLJELQ.jpg",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_id' => 12
        ]);

        DB::table('bahanbakus')->insert([
            'name' => "Kentang",
            'description' => "kentang",
            'pricetag' => "Rp. 3.200 / Ons",
            'price' => 3200,
            'jenis' => "Sayur",
            'gambar' => "storage/uploads/N14tjK56U4hHCFvGSkCDwka02hebCCLbznyeN4IK.jpg",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_id' => 12
        ]);

        DB::table('bahanbakus')->insert([
            'name' => "Merica",
            'description' => "Merica",
            'pricetag' => "Rp. 3.200 / Ons",
            'price' => 3200,
            'jenis' => "Rempah",
            'gambar' => "storage/uploads/VgyPLAJAlE42oC734wcOW1H9H3aH0FJdvay6UUCZ.jpg",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_id' => 12
        ]);
    }
}
