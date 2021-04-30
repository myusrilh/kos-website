<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penginapan extends Model
{
    protected $table = 'penginapan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_pemilik', 'nama', 'email', 'harga', 'fasilitas',
        'lokasi', 'aturan', 'tipe',
        'foto', 'jumlah_kamar', 'ukuran',
    ];

    public function transaksi(){
        return $this->hasMany('App\Models\Transaksi','id_penginapan');
    }
}
