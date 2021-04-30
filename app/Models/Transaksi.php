<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_pencari','id_kos', 'id_kontrakan', 'id_penginapan', 'biaya_sewa',
        'mulai_sewa', 'akhir_sewa', 'status',
    ];

    public function kontrakan(){
        return $this->hasMany('App\Models\Kontrakan','id');
    }

    public function kos(){
        return $this->hasMany('App\Models\Kos','id');
    }

    public function penginapan(){
        return $this->hasMany('App\Models\Penginapan','id');
    }
    
    public function user(){
        return $this->hasMany('App\Models\User','id');
    }
    
}
