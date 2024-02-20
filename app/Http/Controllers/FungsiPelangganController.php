<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FungsiPelangganController extends Controller
{
    public function dashboardpelanggan()
    {
    	$mbl = DB::table('mobil')->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')
        ->where('status_sewa','=','tersedia')->orwhere('status_sewa','=','dipesan')->get();
        $mblcount = DB::table('mobil')->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')->count();
    	return view('Pelanggan.Dashboardpelanggan',['mobil' => $mbl, 'cmobil' => $mblcount]);
    }

    public function daftarmobilpelanggan()
    {
    	$mbl = DB::table('mobil')->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')
        ->where('status_sewa','=','tersedia')->orwhere('status_sewa','=','dipesan')->get();
        $mblcount = DB::table('mobil')->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')->count();
    	return view('Pelanggan.DaftarMobil',['mobil' => $mbl, 'cmobil' => $mblcount]);
    }

    public function detailpesanan($id)
    {
    	$mbl = DB::table('penyewaan')
        ->join('mobil', 'mobil.id_mobil', '=', 'penyewaan.id_mobil')
        ->join('users', 'penyewaan.id_pelanggan', '=', 'users.id')
        ->where('id_pelanggan',$id)
        ->get();
        
    	return view('Pelanggan.DetailPenyewaan',['penyewaan' => $mbl]);
    }


    public function pelanggan()
    {
        
    	$mbl = DB::table('mobil')->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')->get();
        $mblcount = DB::table('mobil')->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')->count();
    	return view('Pelanggan.DaftarMobil',['mobil' => $mbl, 'cmobil' => $mblcount]);
    }

    public function pelanggansewamobil($id,$idku)
    {
        $pelanggan = DB::table('pelanggan')->join('users','users.email','pelanggan.email')->where('users.id',$idku)->get();
        $mobil = DB::table('mobil')->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')->where('id_mobil',$id)->get();
     	return view('Pelanggan.pesanDaftarMobil',['mobil' => $mobil,'langganan' => $pelanggan]);
    }

    public function actionsewamobil(Request $request)
    {

         
        $this->validate($request,[
            'id_mobil' => 'required',
            'id_pelanggan' => 'required',
            'total_sewa' => 'required|numeric',
            'nik' => 'required',
            'tgl_ambil' => 'required',
            'tgl_kembali' => 'required',
        ]);



        DB::table('mobil')->where('id_mobil',$request->id_mobil)->update([
            'status_sewa' => 'dipesan'
        ]);

        $sewa = DB::table('penyewaan')->insert([
            'id_mobil' => $request->id_mobil,
            'id_pelanggan' => $request->id_pelanggan,
            'tgl_ambil' => $request->tgl_ambil,
            'tgl_kembali' => $request->tgl_kembali,
            'total_sewa' => $request->total_sewa,
            'nik'   => $request->nik,
            'status_penyewaan' => '1'
        ]);


        return redirect('/Pelanggan/daftarmobil')->withSuccess('Berhasil menambahkan wilayah baru!');
    }



    public function pelangganupdatesewa($id)
    {
        $updatesewa = DB::table('penyewaan')->join('mobil', 'mobil.id_mobil', '=', 'penyewaan.id_mobil')->join('tarif', 'tarif.id_tarif', '=', 'mobil.id_tarif')->where('id_sewa',$id)->get();
     	return view('Admin.DetailSewa.KonfirmasiSewa',['updatesewa' => $updatesewa]);
    }

    public function updateinfosewa(Request $request)
    {
        DB::table('mobil')->where('id_mobil',$request->id_mobil)->update([
            'status_sewa' => 'disewa'
        ]);

        DB::table('penyewaan')->where('id_sewa',$request->id_sewa)->update([
            'status_penyewaan' => '2'
        ]);


        DB::table('pengembalian')->insert([
            'id_sewa' => $request->id_sewa,
            'total_bayar' => $request->total_bayar,
            'tgl_ambil' => $request->tgl_ambil,
            'tgl_kembali' => $request->tgl_kembali,
            'status_pengembalian' => '1'

        ]);

        DB::table('pembayaran')->insert([
            'id_sewa' => $request->id_sewa,
            'total' => $request->total_bayar,
            'status_pembayaran' => '1'

        ]);

      

        return redirect('/Admin/Penyewaan')->withSuccess('Berhasil menambahkan wilayah baru!');
    }

    public function batalinfosewa(Request $request)
    {
        DB::table('penyewaan')->where('id_sewa',$request->id_sewa)->update([
            'status_penyewaan' => '3'
        ]);

        DB::table('mobil')->where('id_mobil',$request->id_mobil)->update([
            'status_sewa' => 'tersedia'
        ]);


        return redirect('/Admin/Penyewaan')->withSuccess('Berhasil menambahkan wilayah baru!');
    }

    public function pelangganupdatekembali($id)
    {
        $updatesewa = DB::table('pengembalian')->where('id_pengembalian',$id)->get();
        $mobil = DB::table('pengembalian')->where('id_pengembalian',$id)->join('penyewaan','penyewaan.id_sewa','pengembalian.id_sewa')->get();
     	return view('Admin.DetailSewa.KonfirmasiPengembalian',['updatesewa' => $updatesewa,'mobil' => $mobil]);
    }

    public function updateinfokembali(Request $request)
    {

       DB::table('pengembalian')->where('id_pengembalian',$request->id_pengembalian)->update([
            'total_bayar' => $request-> total_bayar,
            'denda' => $request->denda,
            'status_pengembalian' => '2'

        ]);

        DB::table('mobil')->where('id_mobil',$request->id_mobil)->update([
            'status_sewa' => 'tersedia'
        ]);

        return redirect('/Admin/Pengembalian')->withSuccess('Berhasil menambahkan wilayah baru!');
    }


    public function pelangganupdatebayar($id)
    {
        $updatesewa = DB::table('pembayaran')->where('id_pembayaran',$id)->get();
     	return view('Admin.DetailSewa.KonfirmasiPembayaran',['updatesewa' => $updatesewa]);
    }

    public function updateinfobayar(Request $request)
    {

        DB::table('pembayaran')->where('id_pembayaran',$request->id_pembayaran)->update([
            'tgl_pembayaran' => now(),
            'status_pembayaran' => '2'

        ]);

        return redirect('/Admin/Pembayaran')->withSuccess('Berhasil menambahkan wilayah baru!');
    }

}