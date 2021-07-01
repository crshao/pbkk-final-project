<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Bahanbaku;
use App\Models\Resep;
use Carbon\Carbon;

class BahanbakuResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $bahanbakuIds = DB::table('bahanbakus')->pluck('id');

        foreach (Resep::all() as $resep) {
            foreach (range(1,2) as $i) {
                DB::table('bahanbaku_resep')->insert([
                'id_bahanbaku' => $faker->randomElement($bahanbakuIds),
                'jumlah' => $faker->randomDigitNotNull,
                'id_resep' => $resep->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
