<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\Transaksi;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Carbon\Carbon;

class KosController extends Controller
{
    public function show()
    {
        $show_all = Kos::select('*')->where([['status',null],['jumlah_kamar','>',0]])->paginate(4);

        return view('kos.show', compact('show_all'));
    }

    public function cari(Request $request)
    {
        $show_all = Kos::select('*')
        ->where([['status',null],['jumlah_kamar','>',0]])
        ->where('lokasi', 'like', '%'.$request->cari.'%')
        ->paginate(4);

        return view('kos.show', compact('show_all'));
    }

    public function filter_tipe(Request $request){
        $show_all = Kos::select('*')
        ->where([['status',null],['jumlah_kamar','>',0]])
        ->where('tipe',$request->putra)
        ->orWhere('tipe',$request->putri)
        ->orWhere('tipe',$request->campur)
        ->paginate(4);

        return view('kos.show', compact('show_all'));
    }

    public function filter_fasilitas(Request $request){
        
        $show_all = Kos::select('*')
        ->where([['status',null],['jumlah_kamar','>',0]])
        ->where('fasilitas','LIKE','%'.$request->wifi.'%')
        ->orWhere('fasilitas','LIKE','%'.$request->listrik.'%')
        ->orWhere('fasilitas','LIKE','%'.$request->kmdalam.'%')
        ->orWhere('fasilitas','LIKE','%'.$request->kmluar.'%')
        ->orWhere('fasilitas','LIKE','%'.$request->dapur.'%')
        ->orWhere('fasilitas','LIKE','%'.$request->parkiran.'%')
        ->paginate(4);

        return view('kos.show', compact('show_all'));
    }

    public function detail($id)
    {
        $kos = Kos::select('*')->where('id', $id)->first();

        return view('kos.detail', compact('kos'));
    }

    public function tambah()
    {
        return view('kos.tambah');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|max:50',
            'harga' => 'required',
            'lokasi' => 'required',
            'jumlah_kamar' => 'required',
            'foto.*' => 'mimes:jpg,jpeg,png',
        ],
        [
           'nama.required' => 'Masukkan nama kos!',
           'lokasi.required' => 'Lokasi kos harus diisi!',
           'nama.max' => 'Nama melebihi 50 karakter!',
           'harga.required' => 'Harga harus diisi!',
        ]);

        if ($validate) {
            $foto = '';
            if ($request->hasfile('foto')) {
                foreach ($request->file('foto') as $file) {
                    $name = time().'.'.$file->extension();
                    $file->move(public_path().'/img/', $name);
                    $foto = $foto.$name.' ';
                }
            } else {
                $foto = 'download.jpg';
            }

            $fasilitas = '';
            foreach ($request->input('fasilitas') as $f) {
                $fasilitas = $fasilitas.'・'.$f;
            }

            if ($request->ukuran == 'lainnya') {
                $request->ukuran == $request->inputukuran;
            }

            $input = new Kos([
                'id_pemilik' => Auth::user()->id,
                'nama' => $request->nama,
                'harga' => $request->harga,
                'lokasi' => $request->lokasi,
                'fasilitas' => $fasilitas,
                'aturan' => $request->aturan,
                'foto' => $foto,
                'tipe' => $request->tipe,
                'jumlah_kamar' => $request->jumlah_kamar,
                'ukuran' => $request->ukuran,
            ]);

            if ($input->save()) {
                return redirect('pemilik/kos/'.Auth::user()->id)->with('sukses', 'Data kos berhasil diinput');
            } else {
                return back();
            }
        }
    }

    public function pesan(Request $request){
        // Durasi sewa dalam hitungan bulan
        $durasi = Carbon::parse($request->mulai_sewa)->diffInMonths($request->akhir_sewa);
        $harga_total = $request->biaya_sewa * $durasi;

        $kos = Kos::findOrFail($request->id_kos);
        if($kos->jumlah_kamar > 0){
            $kos->jumlah_kamar = $kos->jumlah_kamar-1;
        }else{
            $kos->status = 'full';
        }
        $kos->update();

        $transaksi = new Transaksi([
            'id_pencari' => $request->id_pencari,
            'id_kos' => $request->id_kos,
            'biaya_sewa' => $harga_total,
            'mulai_sewa' => $request->mulai_sewa,
            'akhir_sewa' => $request->akhir_sewa,
            'status' => 'pending'
        ]);

        if($transaksi->save()){
            return redirect('/')->with('sukses','Terima kasih sudah memesan. Silahkan melakukan pembayaran sesuai nominal!');
        }else{
            return back('kos/show')->with('failed','Maaf transaksi gagal!');
        }
    }

    // public function batal($id){
    //     $transaksi = Transaksi::findOrFail($id);
        
    //     if($transaksi->delete()){
    //         $kos = Kos::find($transaksi->id_kos);
    //         $kos->jumlah_kamar++;
    //         if($kos->jumlah_kamar > 0){
    //             $kos->status = null;
    //         }
            
    //         if($kos->update()){
    //             return redirect('/')->with('sukses','Pesanan berhasil dibatalkan');
    //         }else{
    //             return back('kos/show')->with('failed','Maaf pesanan gagal dibatalkan!');
    //         }
    //     }
    // }
}
