<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Kos;
use App\Models\Kontrakan;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use Auth;

class TransaksiController extends Controller
{
    public function show()
    {
        // $transaksi_kos = Transaksi::select('*')->where([['id_pencari',Auth::user()->id],['id_kos','!=',null]])->get();
        // $transaksi_kontrakan = Transaksi::select('*')->where([['id_pencari',Auth::user()->id],['id_kontrakan','!=',null]])->get();
        // $transaksi_penginapan = Transaksi::select('*')->where([['id_pencari',Auth::user()->id],['id_penginapan','!=',null]])->get();
        $transaksi = Transaksi::select('*')->where('id_pencari',Auth::user()->id)->get();
        // $kos = Kos::select('*')->get();
        // $kontrakan = Kontrakan::select('*')->get();
        // $penginapan = Penginapan::select('*')->get();
        return view('transaksi.list', compact('transaksi'));
    }
}
