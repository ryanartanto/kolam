<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\User;
 
 
class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('login');
    }
 
    public function login(Request $request)
    {
        $rules = [
            'username'                 => 'required|string',
            'password'              => 'required|string'
        ];
 
        $messages = [
            'username.required'        => 'username wajib diisi',
            'username.string'           => 'username tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $data = [
            'username'     => $request->input('username'),
            'password'  => $request->input('password'),
        ];
 
        Auth::attempt($data);
 
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
 
        } else { // false
 
            //Login Fail
            Session::flash('error', 'username atau password salah');
            return redirect()->route('login');
        }
 
    }
 
    public function showFormRegister()
    {
        return view('register');
    }
 
    public function register(Request $request)
    {
        $rules = [
            'username'                  => 'required|min:3|max:35|unique:users',
            'password'              => 'required|confirmed'
        ];
 
        $messages = [
            'username.required'         => 'Nama Lengkap wajib diisi',
            'username.min'              => 'Nama lengkap minimal 3 karakter',
            'username.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.unique'          => 'Username sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $user = new User;
        $user->username = ucwords(strtolower($request->username));
        $user->password = Hash::make($request->password);
        $simpan = $user->save();
 
        if($simpan){
            Session::flash('success', 'Register berhasil!');
            return redirect('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
 
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
 
 
}
