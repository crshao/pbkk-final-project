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
            'name' => "Ayam Goreng",
            'description' => "Ayam digoreng",
            'jenis' => "Gorengan",
            'gambar' => "storage/uploads/K1jwGWHOwBSqIm5qhJ48lvJZq9YxS6KS3HSWJpuG.jpg",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('reseps')->insert([
            'name' => "Mie Ayam",
            'description' => "Mie Ayam",
            'jenis' => "Kuah",
            'gambar' => "storage/uploads/K1jwGWHOwBSqIm5qhJ48lvJZq9YxS6KS3HSWJpuG.jpg",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('reseps')->insert([
            'name' => "Ayam bakar",
            'description' => "Ayam dibakar",
            'jenis' => "Bakaran",
            'gambar' => "storage/uploads/K1jwGWHOwBSqIm5qhJ48lvJZq9YxS6KS3HSWJpuG.jpg",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
