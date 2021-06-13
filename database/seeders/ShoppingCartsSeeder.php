<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Bahanbaku;
use App\Models\Cart;
use App\Models\Users;
use Carbon\Carbon;

class ShoppingCartsSeeder extends Seeder
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
        $userIds = DB::table('users')->pluck('id');

        foreach (Cart::all() as $carts) {
            $oneUser = $faker->randomElement($userIds);
            foreach (range(1,2) as $i) {
                DB::table('shopping_carts')->insert([
                'id_user' => $oneUser,
                'id_bahanbaku' => $faker->randomElement($bahanbakuIds),
                'id_cart' => $carts->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        }
    }
}

