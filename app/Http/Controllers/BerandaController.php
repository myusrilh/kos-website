<?php

namespace App\Http\Controllers;

use App\Models\Kontrakan;
use App\Models\Kos;
use App\Models\Penginapan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function show()
    {
        $kos = Kos::select('*')->where([['status',null],['jumlah_kamar','>',0]])->paginate(4);
        $kontrakan = Kontrakan::select('*')->where('status',null)->paginate(4);
        $penginapan = Penginapan::select('*')->where('status',null)->paginate(4);

        return view('home', compact('kos', 'penginapan', 'kontrakan'));
    }

    public function cari(Request $request)
    {
        $kontrakan = Kontrakan::select('*')
        ->where('status',null)
        ->where('lokasi', 'like', '%'.$request->cari.'%')
        ->paginate(4);
        $kos = Kos::select('*')
        ->where([['status',null],['jumlah_kamar','>',0]])
        ->where('lokasi', 'like', '%'.$request->cari.'%')
        ->paginate(4);
        $penginapan = Penginapan::select('*')
        ->where('status',null)
        ->where('lokasi', 'like', '%'.$request->cari.'%')
        ->paginate(4);

        return view('home', compact('kos', 'penginapan', 'kontrakan'));
    }

}
