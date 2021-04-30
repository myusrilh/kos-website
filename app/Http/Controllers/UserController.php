<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class UserController extends Controller
{
    public function register_pemilik()
    {
        return view('register.pemilik');
    }

    public function insert_pemilik(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users',
            'nomor' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:6',
        ],
        [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'nomor.required' => 'Nomor Telepon harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
            'email.unique' => 'Email sudah terdaftar',
        ]);

        if ($validate) {
            $user = new User([
                'nama' => $request->nama,
                'email' => $request->email,
                'nomor' => $request->nomor,
                'alamat' => $request->alamat,
                'level' => 'pemilik',
                'password' => bcrypt($request->password),
            ]);

            if ($user->save()) {
                return redirect('/')->with('sukses', 'Terima kasih sudah mendaftar sebagai pemilik!')->with('user',$user);
            }
        } else {
            return back();
        }
    }

    public function register_pencari()
    {
        return view('register.pencari');
    }

    public function insert_pencari(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users',
            'nomor' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:6',
        ],
        [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'nomor.required' => 'Nomor Telepon harus diisi',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
            'email.unique' => 'Email sudah terdaftar',
        ]);

        if ($validate) {
            $user = new User([
                'nama' => $request->nama,
                'email' => $request->email,
                'nomor' => $request->nomor,
                'alamat' => $request->alamat,
                'level' => 'pencari',
                'password' => bcrypt($request->password),
            ]);

            if ($user->save()) {
                return redirect('/')->with('sukses', 'Terima kasih sudah mendaftar sebagai pencari!')->with('user',$user);
            }
        } else {
            return back();
        }
    }

    public function login_pemilik(){
        return view('auth.pemilik.login');
    }
    public function login_pencari(){
        return view('auth.pencari.login');
    }

    public function proses_login_pemilik(Request $request){
        
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
            // $user = User::select('id','nama','email','level','nomor','alamat')->where([['email',$request->email],['level','pemilik']])->first();

            // if(!empty($user)) {
            //     return redirect('/')->with('user',$user)->with('sukses','Selamat datang '.$user->nama);
            // }else{
            //     return back()->with('failed','Password anda salah!');
            // }
            if (Auth::attempt($request->only('email', 'password'))) {
                if(Auth::user()->level =='pemilik'){
                    return redirect('/pemilik/home')->with('sukses','Selamat datang '.Auth::user()->nama);
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
    public function proses_login_pencari(Request $request){
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
            // $user = User::select('id','nama','email','level','nomor','alamat')->where([['email',$request->email],['level','pencari']])->first();
            // if(!empty($user)) {
            //     return redirect('/')->with('user',$user)->with('sukses','Selamat datang '.$user->nama);
            // }else{
            //     return back()->with('failed','Password anda salah!');
            // }
            if (Auth::attempt($request->only('email', 'password'))) {
                if(Auth::user()->level == 'pencari'){
                    return redirect('/')->with('sukses','Selamat datang '.Auth::user()->nama);
                }else{
                    Auth::logout();
                    return back()->with('failed','Status otoritas anda salah (anda bukan pencari)!');
                }
            }else{
                Auth::logout();
                return back()->with('failed','Password anda salah!');
            }
        }else{
            return back()->with('failed','Email anda salah!');
        }
    }

    public function logout_pemilik(Request $request) {
        Auth::logout();
        
        session()->invalidate();

        session()->regenerateToken();
        
        return redirect('auth/pemilik/login');
    }
    public function logout_pencari() {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect('auth/pencari/login');
    }

    public function profile(){
        $user = Auth::user();
        return view('auth.pencari.profile',compact('user'));
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
                return redirect('/')->with('sukses','Data diri berhasil diupdate');
            }else{
                return back()->with('failed','Data diri gagal diupdate!');
            }

        }else{
            return back()->with('failed','Password dan password konfirmasi anda tidak cocok!');
        }
    }
}
