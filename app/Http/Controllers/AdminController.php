<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Transaksi;

class AdminController extends Controller
{
    public function home(){
        $user = Auth::user();
        $pemilik = Auth::user()->where('level','pemilik')->get();
        $pencari = Auth::user()->where('level','pencari')->get();

        return view('auth.admin.dashboard',compact('pemilik','pencari','user'));
    }

    public function login(){
        return view('auth.admin.login');
    }
    public function proses(Request $request){
        
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ],
        [
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
            'email.unique' => 'Email sudah terdaftar',
        ]);

        if($validate){
            if (Auth::attempt($request->only('email', 'password'))) {
                if(Auth::user()->level =='admin'){
                    return redirect('/admin/home')->with('sukses','Selamat datang '.Auth::user()->nama);
                }else{
                    Auth::logout();
                    return back()->with('failed','Status otoritas anda salah (anda bukan pemilik)!');
                }
            }else{
                Auth::logout();
                return back()->with('failed','Password anda salah!');
            }
        }else{
            return back()->with('failed','Email atau password anda salah!');
        }
    }

    public function logout() {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect('auth/admin');
    }

    public function profile(){
        $user = Auth::user();
        return view('auth.admin.profile',compact('user'));
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
                return redirect('admin/home')->with('sukses','Data diri berhasil diupdate');
            }else{
                return back()->with('failed','Data diri gagal diupdate!');
            }

        }else{
            return back()->with('failed','Password dan password konfirmasi anda tidak cocok!');
        }
    }

    public function list_user(){
        $all_user = User::select('*')->where('level','!=','admin')->get();
        return view('auth.admin.user',compact('all_user'));
    }

    public function list_pesanan(){
        $all_pesanan = Transaksi::select('*')->get();
        return view('auth.admin.pesanan',compact('all_pesanan'));
    }

    public function verifikasi_pesanan($id,$verifikasi){
        $pesanan = Transaksi::findOrFail($id);
        $pesanan->status = $verifikasi;
        if($pesanan->update()){
            return redirect('admin/pesanan')->with('sukses','pesanan '.$verifikasi);
        }else{
            return redirect('admin/pesanan')->with('failed','pesanan gagal diverifikasi');
        }
    }

    public function edit($id){
        $user = User::select('*')->where('id',$id)->first();
        return view('auth.admin.edit',compact('user'));
    }

    public function update(Request $request, $id){
        if($request->password === $request->password2){
            $user = User::find($id);
            $user->nama = trim($request->nama_depan)." ".trim($request->nama_belakang);
            $user->alamat = $request->alamat;
            $user->nomor = $request->nomor;
            $user->email = $request->email;
            if ($request->password != null) {
                $user->password = bcrypt($request['password']);
            } else {
                $input['password'] = $user->password;
            }

            if($user->update()){
                return redirect('admin/user')->with('sukses','Data User berhasil diperbarui');
            }else{
                return redirect('admin/user')->with('failed','Data User gagal diperbarui');
            }
        }else{
            return back()->with('failed','Password verifikasi salah!');
        }

    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('admin\user')->with('sukses', 'Data Berhasil dihapus');
    }
}
