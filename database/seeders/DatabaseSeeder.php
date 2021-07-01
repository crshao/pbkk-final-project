<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BahanbakuSeeder::class);
        $this->call(ResepSeeder::class);
        $this->call(CartsSeeder::class);
        $this->call(BahanbakuResepSeeder::class);
        $this->call(CourierSeeder::class);
    }
}
