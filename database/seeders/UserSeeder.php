<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buyerId = DB::table('users')->insertGetId([
            'name' => 'buyer',
            'email' => 'buyer@gmail.com',
            'password' => Hash::make('buyerPassword'),
        ]);

        $sellerId = DB::table('users')->insertGetId([
            'name' => 'seller',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('sellerPassword'),
        ]);

        //buyer role
        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => $buyerId,
        ]);

        //seller role
        DB::table('role_user')->insert([
            'role_id' => 3,
            'user_id' => $sellerId,
        ]);
    }
}
