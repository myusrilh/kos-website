<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontrakan extends Model
{
    protected $table = 'kontrakan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_pemilik', 'nama', 'email', 'harga', 'fasilitas',
        'lokasi', 'aturan', 'tipe',
        'foto', 'jumlah_kamar', 'ukuran',
    ];

    public function transaksi(){
        return $this->hasMany('App\Models\Transaksi','id_kontrakan');
    }
}
