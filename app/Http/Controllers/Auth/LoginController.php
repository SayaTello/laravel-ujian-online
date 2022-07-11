<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', ['title' => 'Login']);
    }

    public function authentikasi(Request $request)
    {
        $kredensial = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login Gagal !');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }

    public function signup()
    {
        return view('auth.regist');
    }

    public function register(Request $request) 
    { 
    $data = $request->validate([ 
    'name' => ['required', 'min:3', 'max:255', 'unique:users'], 
    'email' => 'required|email|unique:users', 
    'password' => 'required|min:5|max:255', 
    ]); 
    // enkripsi password, 2 cara berikut sama
    //$data['password'] = bcrypt($data['password']);
    $data['password'] = Hash::make($data['password']); 
    $tambah = DB::table('users')->insert($data); 
    if ($tambah) { 
    // $request->session()->flash('success', 'Registration Successfull!, Please Login');
    // return redirect('/login');
    // atau
    return redirect('/login')->with('success', 'Registration Successfull!, Please Login'); 
    } 
    }
}
