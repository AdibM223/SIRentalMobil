<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function indexpengembalian()
{
    $dpm = DB::table('pengembalian')
        ->join('penyewaan', 'penyewaan.id_sewa', '=', 'pengembalian.id_sewa')
        ->join('mobil', 'penyewaan.id_mobil', '=', 'mobil.id_mobil')
        ->join('users', 'penyewaan.id_pelanggan', '=', 'users.id')
        ->get();
    return view('Admin.DetailSewa.DetailPengembalian', ['pengembalian'=> $dpm]);
}

    public function indexpenyewaan()
    {
    	$dpp = DB::table('penyewaan')
        ->join('mobil', 'penyewaan.id_mobil', '=', 'mobil.id_mobil')
        ->join('users', 'penyewaan.id_pelanggan', '=', 'users.id')
        ->get();
    	return view('Admin.DetailSewa.DetailPenyewaan',['penyewaan' => $dpp]);
    }
    public function indexpembayaran()
    {
    	$dpy = DB::table('pembayaran')
        ->join('penyewaan', 'penyewaan.id_sewa', '=', 'pembayaran.id_sewa')
        ->join('mobil', 'penyewaan.id_mobil', '=', 'mobil.id_mobil')
        ->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')
        ->join('users', 'penyewaan.id_pelanggan', '=', 'users.id')
        ->get();
    	return view('Admin.DetailSewa.DetailPembayaran',['pembayaran' => $dpy]);
    }

    public function LapTransaksi()
    {
    	$dpm = DB::table('pengembalian')->join('penyewaan', 'penyewaan.id_sewa', '=', 'pengembalian.id_sewa')->join('mobil', 'penyewaan.id_mobil', '=', 'mobil.id_mobil')
        ->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')
        ->join('users', 'penyewaan.id_pelanggan', '=', 'users.id')
        ->get();
    	return view('Admin.Laporan.LaporanTransaksi',['pengembalian' => $dpm]);
    }

    public function cetakLap(Request $request)
    {
        if($request->search2 == "All")
        {
            $dpm = DB::table('pengembalian')->join('penyewaan', 'penyewaan.id_sewa', '=', 'pengembalian.id_sewa')->join('mobil', 'penyewaan.id_mobil', '=', 'mobil.id_mobil')
            ->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')
            ->join('users', 'penyewaan.id_pelanggan', '=', 'users.id')
            ->get();
        }
        else{
            $dpm = DB::table('pengembalian')->join('penyewaan', 'penyewaan.id_sewa', '=', 'pengembalian.id_sewa')->join('mobil', 'penyewaan.id_mobil', '=', 'mobil.id_mobil')
        ->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')
        ->join('users', 'penyewaan.id_pelanggan', '=', 'users.id')
        ->whereMonth('pengembalian.tgl_ambil','=',$request->search2)
        ->get();
        }
        
    	return view('Admin.Laporan.cetakLaporan',['pengembalian' => $dpm]);
    }

    public function cetakLapMobil(Request $request)
    {
        if ($request->search == "All")
        {
            $mbl = DB::table('mobil')->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')->get();
        }
        else{
            $mbl = DB::table('mobil')->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')
            ->where('mobil.status_sewa',$request->search)->get();
        }
        
    	return view('Admin.Laporan.cetakLaporanMobil',['mobil' => $mbl]);
    }

    public function indexsearchlaporantransaksi(Request $request)
    {

    	if($request->ajax())
    {

        $output="";
        if($request->search2 == "All")
        {
            $mobil=DB::table('pengembalian')->join('penyewaan', 'penyewaan.id_sewa', '=', 'pengembalian.id_sewa')->join('mobil', 'penyewaan.id_mobil', '=', 'mobil.id_mobil')
        ->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')
        ->join('users', 'penyewaan.id_pelanggan', '=', 'users.id')
        ->get();
        }
        else{
            $mobil=DB::table('pengembalian')->join('penyewaan', 'penyewaan.id_sewa', '=', 'pengembalian.id_sewa')->join('mobil', 'penyewaan.id_mobil', '=', 'mobil.id_mobil')
            ->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')
            ->join('users', 'penyewaan.id_pelanggan', '=', 'users.id')
            ->whereMonth('pengembalian.tgl_ambil','=',$request->search2)
            ->get();
        }
        
        if($mobil)
        {
        $no =0;
            foreach ($mobil as $key => $mobil) {
                $output .= '<tr>' .
                    '<td>' . $mobil->id_pengembalian . '</td>' .
                    '<td>' . $mobil->nik . '</td>' .
                    '<td>' . $mobil->name . '</td>' .
                    '<td>' . $mobil->nama_mobil . '</td>' .
                    '<td>' . $mobil->no_pol . '</td>' .
                    '<td>' . $mobil->tgl_ambil . '</td>' .
                    '<td>' . $mobil->tgl_kembali . '</td>' .
                    '<td>' . $mobil->denda . '</td>' .
                    '<td>' . $mobil->total_bayar . '</td>' .
                    '<td>' . $mobil->status_pengembalian . '</td>' .
                    // '<td>{{"' .$mobil->status_pengembalian.'" == "2" ? "tersedia" : "disewa" }} </td>' .
                    
                    '</tr>';
            }
           
           
        return Response($output);

       }}
    }



    public function loginuser()
    {
    	
    	return view('loginview.loginAdmin');
    }


    public function DashboardAdmin()
    {

        $count =  DB::table('pelanggan')->count();
        $count2 =  DB::table('mobil')->count();
        $count3 =  DB::table('penyewaan')->count();

        return view('Admin.Dashboard',
        ['countpelanggan' => $count, 
        'countmobil' => $count2,
        'countsewa'=> $count3]);
    }
    
}
