<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nama' => 'Jono',
                'alamat' => 'Jalan Kalianyar No. 92',
                'nomor' => '080765112300',
                'email' => 'jono@gmail.com',
                'password' => bcrypt('jono12'),
                'level' => 'pencari',
                'remember_token' => Str::random(10),
            ],
            [
                'nama' => 'Gilbert',
                'alamat' => 'Jalan Bondowoso No. 21',
                'nomor' => '080761345901',
                'email' => 'gilbert@gmail.com',
                'password' => bcrypt('gilbert'),
                'level' => 'pemilik',
                'remember_token' => Str::random(10),
            ],
            [
                'nama' => 'Admin Finnel',
                'nomor' => '081111000333',
                'alamat' => null,
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin1'),
                'level' => 'admin',
                'remember_token' => Str::random(10),
            ],
        ]);
    }
}
