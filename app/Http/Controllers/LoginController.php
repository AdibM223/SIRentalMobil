<?php

namespace App\Http\Controllers;
use Auth;
use Auth2;
use AuthenticatesUsers;
use Session;
use Illuminate\Support\Facades\DB;
use Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function preloadakun()
    {
     	return view('preload');
    }

    public function actionpreload(Request $request)
    {
        $admin = DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Admin'
            
        ]);

        return redirect('/')->withSuccess('Berhasil menambahkan Admin baru!');
    }
    
    
    
    
    public function loginadmin()
    {
        
        if (Auth::check()) {
            return redirect('dashboardPelanggan');
        }else{
            return view('loginview.loginAdmin');
        }

        
    }


    public function loginpelanggan()
    {
        
        if (Auth::check()) {
            return redirect('dashboardPelanggan');
        }else{
            return view('loginview.loginPelanggan');
        }

        
    }


    
    protected $redirectTo;
    public function redirectTo()
    {
        
    } 

    public function actionloginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            switch(Auth::user()->role){
                case 'Admin':
                    return redirect('/Admin/dashboard');
                    break;
                case 'Pelanggan':
                    return redirect('/Pelanggan/dashboard');
                    break;
                default:
                
                return redirect('/');
            }
             }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogoutAdmin()
    {
        Auth::logout();
        return redirect('/');
    }

    public function actionlogoutPelanggan()
    {
        Auth::logout();
        return redirect('/');
    }

}
