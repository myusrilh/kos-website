<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontrakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kontrakan')->insert([
            [
                'id_pemilik' => 2,
                'nama' => 'Kontrakan Saudara',
                'harga' => 2500000,
                'fasilitas' => 'Kamar mandi dalam ・ Dapur ・ Wifi ・ Parkiran',
                'lokasi' => 'Jalan Galunggung Gang 6 NO 2 Malang Jawa Timur Indonesia',
                'aturan' => 'Tidak Boleh Membawa Peliharaan, Tidak Boleh Membawa Perempuan, Tidak Boleh Membawa Masuk Teman ke Kamar, Jam Malam, Menjaga Kebersihan, Menjaga Ketentraman',
                'tipe' => 'Putra',
                'foto' => 'download.jpg',
                'jumlah_kamar' => 3,
                'ukuran' => '3x3',
            ],
            [
                'id_pemilik' => 2,
                'nama' => 'Kontrakan Ambarawa',
                'harga' => 3500000,
                'fasilitas' => 'Kamar mandi dalam ・ Dapur ・ Wifi ・ Parkiran',
                'lokasi' => 'Jalan Jakarta Gang 6 NO 2 Malang Jawa Timur Indonesia',
                'aturan' => 'Tidak Boleh Membawa Peliharaan, Tidak Boleh Membawa Perempuan, Tidak Boleh Membawa Masuk Teman ke Kamar, Jam Malam, Menjaga Kebersihan, Menjaga Ketentraman',
                'tipe' => 'Putri',
                'foto' => 'download.jpg',
                'jumlah_kamar' => 5,
                'ukuran' => '3x3',
            ],
            [
                'id_pemilik' => 2,
                'nama' => 'Kontrakan Surabaya',
                'harga' => 3500000,
                'fasilitas' => 'Kamar mandi dalam ・ Dapur ・ Wifi ・ Parkiran',
                'lokasi' => 'Jalan Bendungan Sutami Gang 6 NO 2 Malang Jawa Timur Indonesia',
                'aturan' => 'Tidak Boleh Membawa Peliharaan, Tidak Boleh Membawa Perempuan, Tidak Boleh Membawa Masuk Teman ke Kamar, Jam Malam, Menjaga Kebersihan, Menjaga Ketentraman',
                'tipe' => 'Putra',
                'foto' => 'download.jpg',
                'jumlah_kamar' => 4,
                'ukuran' => '3x3',
            ],
            [
                'id_pemilik' => 2,
                'nama' => 'Kontrakan Bandara',
                'harga' => 3500000,
                'fasilitas' => 'Kamar mandi dalam ・ Dapur ・ Wifi ・ Parkiran',
                'lokasi' => 'Jalan Jakarta Gang 6 NO 2 Malang Jawa Timur Indonesia',
                'aturan' => 'Tidak Boleh Membawa Peliharaan, Tidak Boleh Membawa Perempuan, Tidak Boleh Membawa Masuk Teman ke Kamar, Jam Malam, Menjaga Kebersihan, Menjaga Ketentraman',
                'tipe' => 'Putri',
                'foto' => 'download.jpg',
                'jumlah_kamar' => 3,
                'ukuran' => '3x3',
            ],
        ]);
    }
}
