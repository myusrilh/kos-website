<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kos')->insert([
            [
                'id_pemilik' => 2,
                'nama' => 'Kos Muslim',
                'harga' => 1000000,
                'fasilitas' => 'Kamar mandi dalam ・ Dapur ・ Wifi ・ Parkiran',
                'lokasi' => 'Jalan Jakarta Gang 6 NO 2 Malang Jawa Timur Indonesia',
                'aturan' => 'Tidak Boleh Membawa Peliharaan, Tidak Boleh Membawa Perempuan, Tidak Boleh Membawa Masuk Teman ke Kamar, Jam Malam, Menjaga Kebersihan, Menjaga Ketentraman',
                'tipe' => 'Kos Putra',
                'foto' => 'download.jpg',
                'jumlah_kamar' => 12,
                'ukuran' => '3x3',
            ],
            [
                'id_pemilik' => 2,
                'nama' => 'Kos Muslimah',
                'harga' => 2000000,
                'fasilitas' => 'Kamar mandi dalam ・ Dapur ・ Wifi ・ Parkiran',
                'lokasi' => 'Jalan Candi Gang 6 NO 2 Malang Jawa Timur Indonesia',
                'aturan' => 'Tidak Boleh Membawa Peliharaan, Tidak Boleh Membawa Laki-laki, Tidak Boleh Membawa Masuk Teman ke Kamar, Jam Malam, Menjaga Kebersihan, Menjaga Ketentraman',
                'tipe' => 'Kos Putri',
                'foto' => 'download.jpg',
                'jumlah_kamar' => 15,
                'ukuran' => '3x3',
            ],
            [
                'id_pemilik' => 2,
                'nama' => 'Kos Candi',
                'harga' => 250000,
                'fasilitas' => 'Kamar mandi dalam ・ Dapur ・ Wifi ・ Parkiran',
                'lokasi' => 'Jalan Candi Gang 3 NO 2 Malang Jawa Timur Indonesia',
                'aturan' => 'Tidak Boleh Membawa Peliharaan, Tidak Boleh Membawa Perempuan, Tidak Boleh Membawa Masuk Teman ke Kamar, Jam Malam, Menjaga Kebersihan, Menjaga Ketentraman',
                'tipe' => 'Kos Putra',
                'foto' => 'download.jpg',
                'jumlah_kamar' => 6,
                'ukuran' => '3x3',
            ],
            [
                'id_pemilik' => 2,
                'nama' => 'Kos Putra Muslim',
                'harga' => 500000,
                'fasilitas' => 'Kamar mandi dalam ・ Dapur ・ Wifi ・ Parkiran',
                'lokasi' => 'Jalan Candi Gang 3 NO 2 Malang Jawa Timur Indonesia',
                'aturan' => 'Tidak Boleh Membawa Peliharaan, Tidak Boleh Membawa Laki-laki, Tidak Boleh Membawa Masuk Teman ke Kamar, Jam Malam, Menjaga Kebersihan, Menjaga Ketentraman',
                'tipe' => 'Kos Putra',
                'foto' => 'download.jpg',
                'jumlah_kamar' => 10,
                'ukuran' => '3x3',
            ],
        ]);
    }
}
