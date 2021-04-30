<?php

namespace App\Http\Controllers;

use App\Models\Kontrakan;
use App\Models\Transaksi;
use Auth;
use Illuminate\Http\Request;

use Carbon\Carbon;

class KontrakanController extends Controller
{
    public function show()
    {
        $show_all = Kontrakan::select('*')->where('status',null)->paginate(4);

        return view('kontrakan.show', compact('show_all'));
    }

    public function cari(Request $request)
    {
        $show_all = Kontrakan::select('*')
        ->where('lokasi', 'like', '%'.$request->cari.'%')
        ->paginate(4);

        return view('kontrakan.show', compact('show_all'));
    }

    public function filter_tipe(Request $request){
        $show_all = Kontrakan::select('*')
        ->where('status',null)
        ->where('tipe',$request->putra)
        ->orWhere('tipe',$request->putri)
        ->orWhere('tipe',$request->campur)
        ->paginate(4);

        return view('kontrakan.show', compact('show_all'));
    }

    public function detail($id)
    {
        $kontrakan = Kontrakan::select('*')->where('id', $id)->first();

        return view('kontrakan.detail', compact('kontrakan'));
    }

    public function tambah()
    {
        return view('kontrakan.tambah');
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
           'nama.required' => 'Masukkan nama kontrakan!',
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

            $input = new Kontrakan([
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
                return redirect('pemilik/kontrakan/'.Auth::user()->id)->with('sukses', 'Data kontrakan berhasil diinput');
            } else {
                return back();
            }
        }
    }

    public function pesan(Request $request){
        // Durasi sewa dalam hitungan tahun
        $durasi = Carbon::parse($request->mulai_sewa)->diffInYears($request->akhir_sewa);
        $harga_total = $request->biaya_sewa * $durasi;
        
        $kontrakan = Kontrakan::findOrFail($request->id_kontrakan);
        $kontrakan->status = 'tersewa';
        $kontrakan->update();

        
        $transaksi = new Transaksi([
            'id_pencari' => $request->id_pencari,
            'id_kontrakan' => $request->id_kontrakan,
            'biaya_sewa' => $harga_total,
            'mulai_sewa' => $request->mulai_sewa,
            'akhir_sewa' => $request->akhir_sewa,
            'status' => 'pending'
        ]);

        if($transaksi->save()){
            return redirect('/')->with('sukses','Terima kasih sudah memesan. Silahkan melakukan pembayaran sesuai nominal!');
        }else{
            return back('kontrakan/show')->with('failed','Maaf transaksi gagal!');
        }
    }
    
    // public function batal($id){
    //     $transaksi = Transaksi::findOrFail($id);
        
    //     if($transaksi->delete()){
    //         $kontrakan = Kontrakan::find($transaksi->id_kontrakan);
    //         $kontrakan->status = null;
            
    //         if($kos->update()){
    //             return redirect('/')->with('sukses','Pesanan berhasil dibatalkan');
    //         }else{
    //             return back('kontrakan/show')->with('failed','Maaf pesanan gagal dibatalkan!');
    //         }
    //     }
    // }
}
