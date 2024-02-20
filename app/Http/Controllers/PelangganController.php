<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Hash;

class PelangganController extends Controller
{
    public function indexpelanggan()
    {
    	$plgn = DB::table('pelanggan')->get();
    	return view('Admin.Pelanggan.MasterPelanggan',['pelanggan' => $plgn]);
    }

    public function indexadmin()
    {
    	$admin = DB::table('users')->where('role','=','Admin')->get();
    	return view('Admin.Admins.MasterAdmin',['admin' => $admin]);
    }

public function pelanggantambah()
    {
        return view('Admin.Pelanggan.AddMasterPelanggan');
    }
    
    public function actionpelanggan(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|regex:/^([^0-9]*)$/',
            'nik' => 'required|min:16|max:16',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
        ]);

        $pelanggan = DB::table('pelanggan')->insert([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'no_hp' => $request->no_hp,
            
        ]);

        $admin = DB::table('users')->insert([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Pelanggan'
            
        ]);

        return redirect('/Admin/Pelanggan')->withSuccess('Berhasil menambahkan Pelanggan baru!');
    }

    public function pelangganupdate($id)
    {
        $pelanggan = DB::table('pelanggan')->where('id_pelanggan',$id)->get();
     	return view('Admin.Pelanggan.UpdateMasterPelanggan',['pelanggan' => $pelanggan]);
    }
    
    public function actionpelangganupdate(Request $request)
    {

        $this->validate($request,[
            'nama' => 'required|alpha',
            'nik' => 'required|min:16|max:16',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
        ]);
        
        $pelanggan = DB::table('pelanggan')->where('id_pelanggan', $request->id)->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'no_hp' => $request->no_hp,
        ]);

        return redirect('/Admin/Pelanggan')->withSuccess('Berhasil Mengubah data Pelanggan!');
    }


    public function pelanggandelete($id)
	{
	DB::table('pelanggan')->where('id_pelanggan',$id)->delete();	
	return redirect('/Admin/Pelanggan')->withSuccess('Berhasil Menghapus Pelanggan!');
	}

    public function admindelete($id)
	{
	DB::table('users')->where('id',$id)->delete();	
	return redirect('/Admin/Admins')->withSuccess('Berhasil Menghapus Admin!');
	}
}
