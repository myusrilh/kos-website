<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Kontrakan;
use App\Models\Kos;
use App\Models\Penginapan;
use App\Models\User;

class PemilikController extends Controller
{
    public function home(){
        $user = Auth::user();

        $kos = Kos::select('*')->where('id_pemilik',Auth::user()->id)->get();
        $kontrakan = Kontrakan::select('*')->where('id_pemilik',Auth::user()->id)->get();
        $penginapan = Penginapan::select('*')->where('id_pemilik',Auth::user()->id)->get();

        return view('auth.pemilik.dashboard',compact('user','kos','kontrakan','penginapan'));
    }
    
    public function profile(){
        $user = Auth::user();
        return view('auth.pemilik.profile',compact('user'));
    }

    public function edit_profile(Request $request){
        $validate = $request->validate([
            'password' => 'min:6|required|same:password2',
            'password2' => 'min:6'
        ]);
        if($validate){
            $user = User::findOrFail(Auth::user()->id);
            $user->password = bcrypt($request->password);
            if($request->nama_depan != '' && $request->nama_belakang != ''){
                $user->nama = trim($request->nama_depan)." ".trim($request->nama_belakang);
            }
            if($request->email != null || $request->email != ''){
                $user->email = $request->email;
            }
            if($request->nomor != null || $request->nomor != ''){
                $user->nomor = $request->nomor;
            }
            if($request->email != null || $request->email != ''){
                $user->email = $request->email;
            }
            if($request->alamat != null || $request->alamat != ''){
                $user->alamat = $request->alamat;
            }

            if($user->update()){
                return redirect('pemilik/home')->with('sukses','Data diri berhasil diupdate');
            }else{
                return back()->with('failed','Data diri gagal diupdate!');
            }

        }else{
            return back()->with('failed','Password dan password konfirmasi anda tidak cocok!');
        }
    }

    public function kos($id){
        $kos = Kos::select('*')->where('id_pemilik',$id)->paginate(4);
        

        return view('auth.pemilik.kos',compact('kos'));
    }

    public function kontrakan($id){
        $kontrakan = Kontrakan::select('*')->where('id_pemilik',$id)->paginate(4);
        
        return view('auth.pemilik.kontrakan',compact('kontrakan'));
    }

    public function penginapan($id){
        $penginapan = Penginapan::select('*')->where('id_pemilik',$id)->paginate(4);

        return view('auth.pemilik.penginapan',compact('penginapan'));
    }

}
