<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use App\Models\Transaksi;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PenginapanController extends Controller
{
    public function show()
    {
        $show_all = Penginapan::select('*')->where('status',null)->paginate(4);

        return view('penginapan.show', compact('show_all'));
    }

    public function cari(Request $request)
    {
        $show_all = Penginapan::select('*')
        ->where('status',null)
        ->where('lokasi', 'like', '%'.$request->cari.'%')
        ->paginate(4);

        return view('penginapan.show', compact('show_all'));
    }

    public function filter_tipe(Request $request){
        $show_all = Penginapan::select('*')
        ->where('status',null)
        ->where('tipe',$request->bebas)
        ->orWhere('tipe',$request->syariah)
        ->paginate(4);

        return view('penginapan.show', compact('show_all'));
    }

    public function detail($id)
    {
        $penginapan = Penginapan::select('*')->where('id', $id)->first();

        return view('penginapan.detail', compact('penginapan'));
    }

    public function tambah()
    {
        return view('penginapan.tambah');
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
           'nama.required' => 'Masukkan nama penginapan!',
           'lokasi.required' => 'Lokasi kontrakan harus diisi!',
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

            $input = new Penginapan([
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
                return redirect('pemilik/penginapan/'.Auth::user()->id)->with('sukses', 'Data penginapan berhasil diinput');
            } else {
                return back();
            }
        }
    }
    public function pesan(Request $request){
        // Durasi sewa dalam hitungan malam
        $durasi = Carbon::parse($request->mulai_sewa)->diffInDays($request->akhir_sewa);
        $harga_total = $request->biaya_sewa * $durasi;

        $penginapan = Penginapan::findOrFail($request->id_penginapan);
        if($penginapan->jumlah_kamar > 0){
            $penginapan->jumlah_kamar = $penginapan->jumlah_kamar-1;
        }else{
            $penginapan->status = 'full';
        }
        $penginapan->update();

        $transaksi = new Transaksi([
            'id_pencari' => $request->id_pencari,
            'id_penginapan' => $request->id_penginapan,
            'biaya_sewa' => $harga_total,
            'mulai_sewa' => $request->mulai_sewa,
            'akhir_sewa' => $request->akhir_sewa,
            'status' => 'pending'
        ]);

        if($transaksi->save()){
            return redirect('/')->with('sukses','Terima kasih sudah memesan. Silahkan melakukan pembayaran sesuai nominal!');
        }else{
            return back('penginapan/show')->with('failed','Maaf transaksi gagal!');
        }
    }

    // public function batal($id){
    //     $transaksi = Transaksi::findOrFail($id);
        
    //     if($transaksi->delete()){
    //         $penginapan = Penginapan::find($transaksi->id_penginapan);
    //         $penginapan->jumlah_kamar++;
    //         if($kos->jumlah_kamar > 0){
    //             $penginapan->status = null;
    //         }
            
    //         if($kos->update()){
    //             return redirect('/')->with('sukses','Pesanan berhasil dibatalkan');
    //         }else{
    //             return back('penginapan/show')->with('failed','Maaf pesanan gagal dibatalkan!');
    //         }
    //     }
    // }
}
