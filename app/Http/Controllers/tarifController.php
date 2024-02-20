<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class tarifController extends Controller
{
    public function tariftambah()
    {
     	return view('Admin.Tarif.AddTarifMobil');
    }

    public function actiontarif(Request $request)
    {

        $this->validate($request,[
            'jenis_mobil' => 'required',
            'harga_sewa' => 'required|numeric',
            
            'tahun_mobil' => 'required|numeric',
            'waktu_sewa' => 'required',
        ]);
       
       
        DB::table('tarif')->insert([
            'jenis_mobil' => $request->jenis_mobil,
            
            'tahun_mobil' => $request->tahun_mobil,
            'harga_sewa' => $request->harga_sewa,
            'waktu_sewa' => $request->waktu_sewa,

        ]);

        return redirect('/Admin/Tarif')->withSuccess('Berhasil menambahkan Tarif baru!');
    }

    public function tarifupdate($id)
    {
        $tarif = DB::table('tarif')
        ->where('id_tarif',$id)->get();
     	return view('Admin.Tarif.UpdateTarifMobil',['tarif' => $tarif]);
    }
    
    public function actiontarifupdate(Request $request)
    {
        $this->validate($request,[
            'jenis_mobil' => 'required',
            'harga_sewa' => 'required|numeric',
            
            'tahun_mobil' => 'required|numeric',
            'waktu_sewa' => 'required',
        ]);
       
        DB::table('tarif')->where('id_tarif', $request->id)->update([
            'jenis_mobil' => $request->jenis_mobil,
            'harga_sewa' => $request->harga_sewa,
            
            'tahun_mobil' => $request->tahun_mobil,
            'waktu_sewa' => $request->waktu_sewa,
        ]);

        return redirect('/Admin/Tarif')->withSuccess('Berhasil Mengubah data Tarif!');
    }

    public function deletetarif($id)
	{
    DB::table('pengembalian')
    ->join('penyewaan',"penyewaan.id_sewa","pengembalian.id_sewa")
    ->join('mobil',"penyewaan.id_mobil","mobil.id_mobil")
    ->join('tarif',"tarif.id_tarif","mobil.id_tarif")
    ->where('mobil.id_tarif',$id)->delete();

    DB::table('pembayaran')->join('penyewaan',"penyewaan.id_sewa","pembayaran.id_sewa")
    ->join('mobil',"penyewaan.id_mobil","mobil.id_mobil")
    ->join('tarif',"tarif.id_tarif","mobil.id_tarif")
    ->where('mobil.id_tarif',$id)->delete();

    DB::table('penyewaan')->join('mobil',"penyewaan.id_mobil","mobil.id_mobil")
    ->join('tarif',"tarif.id_tarif","mobil.id_tarif")
    ->where('mobil.id_tarif',$id)->delete();

    DB::table('mobil')->join('tarif',"tarif.id_tarif","mobil.id_tarif")
    ->where('mobil.id_tarif',$id)->delete();
    
	DB::table('tarif')->where('id_tarif',$id)->delete();	
	return redirect('/Admin/Tarif')->withSuccess('Berhasil Menghapus Tarif!');
	}
}
