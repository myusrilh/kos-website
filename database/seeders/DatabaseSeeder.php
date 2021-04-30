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
        $this->call(UserSeeder::class);
        $this->call(KosSeeder::class);
        $this->call(KontrakanSeeder::class);
        $this->call(PenginapanSeeder::class);
    }
}
