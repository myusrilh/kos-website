<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenginapanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penginapan')->insert([
            [
                'id_pemilik' => 2,
                'nama' => '1001 Malam',
                'harga' => 300000,
                'fasilitas' => 'Kamar mandi dalam ・ Dapur ・ Wifi ・ Parkiran',
                'lokasi' => 'Jalan Jakarta Gang 6 NO 2 Malang Jawa Timur Indonesia',
                'aturan' => 'Tidak Boleh Membawa Peliharaan, Tidak Boleh Membawa Perempuan, Tidak Boleh Membawa Masuk Teman ke Kamar, Jam Malam, Menjaga Kebersihan, Menjaga Ketentraman',
                'tipe' => 'Syariah',
                'foto' => 'download.jpg',
                'jumlah_kamar' => 3,
                'ukuran' => '3x3',
            ],
            [
                'id_pemilik' => 2,
                'nama' => 'Negeri',
                'harga' => 500000,
                'fasilitas' => 'Kamar mandi dalam ・ Dapur ・ Wifi ・ Parkiran',
                'lokasi' => 'Jalan Candi Gang 6 NO 2 Malang Jawa Timur Indonesia',
                'aturan' => 'Tidak Boleh Membawa Peliharaan, Tidak Boleh Membawa Perempuan, Tidak Boleh Membawa Masuk Teman ke Kamar, Jam Malam, Menjaga Kebersihan, Menjaga Ketentraman',
                'tipe' => 'Bebas',
                'foto' => 'download.jpg',
                'jumlah_kamar' => 5,
                'ukuran' => '3x3',
            ],
            [
                'id_pemilik' => 2,
                'nama' => 'Pagoda Emas',
                'harga' => 400000,
                'fasilitas' => 'Kamar mandi dalam ・ Dapur ・ Wifi ・ Parkiran',
                'lokasi' => 'Jalan Surabaya Gang 6 NO 2 Malang Jawa Timur Indonesia',
                'aturan' => 'Tidak Boleh Membawa Peliharaan, Tidak Boleh Membawa Perempuan, Tidak Boleh Membawa Masuk Teman ke Kamar, Jam Malam, Menjaga Kebersihan, Menjaga Ketentraman',
                'tipe' => 'Bebas',
                'foto' => 'download.jpg',
                'jumlah_kamar' => 4,
                'ukuran' => '3x3',
            ],
            [
                'id_pemilik' => 2,
                'nama' => 'Penginapan Syariah',
                'harga' => 300000,
                'fasilitas' => 'Kamar mandi dalam ・ Dapur ・ Wifi ・ Parkiran',
                'lokasi' => 'Jalan Semarang Gang 6 NO 2 Malang Jawa Timur Indonesia',
                'aturan' => 'Tidak Boleh Membawa Peliharaan, Tidak Boleh Membawa Perempuan, Tidak Boleh Membawa Masuk Teman ke Kamar, Jam Malam, Menjaga Kebersihan, Menjaga Ketentraman',
                'tipe' => 'Syariah',
                'foto' => 'download.jpg',
                'jumlah_kamar' => 3,
                'ukuran' => '3x3',
            ],
        ]);
    }
}
