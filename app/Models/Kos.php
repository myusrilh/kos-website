<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    protected $table = 'kos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_pemilik', 'nama', 'email', 'harga', 'fasilitas',
        'lokasi', 'aturan', 'tipe',
        'foto', 'jumlah_kamar', 'ukuran',
    ];

    public function transaksi(){
        return $this->belongsTo('App\Models\Transaksi');
    }
}
