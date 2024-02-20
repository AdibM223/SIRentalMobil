<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use hash;
class MobilController extends Controller
{
    public function indexmobil()
    {
    	$mbl = DB::table('mobil')->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')->get();
    	return view('Admin.Mobil.MasterMobil',['mobil' => $mbl]);
    }

    public function indexlaporanmobil()
    {

    	$mbl = DB::table('mobil')->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')->get();
    	return view('Admin.Laporan.LaporanMobilTersedia',['mobil' => $mbl]);
    }

    public function indexsearchlaporanmobil(Request $request)
    {

if($request->ajax())
    {

        $output="";
        if($request->search == "All")
        {
            $mobil=DB::table('mobil')->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')
            ->get();
        }
        else
        {
            $mobil=DB::table('mobil')->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')
            ->where('status_sewa','LIKE','%'.$request->search."%")
            ->get();
        }
        
        if($mobil)
        {
        $no =0;
            foreach ($mobil as $key => $mobil) {
                $output .= '<tr>' .
                    '<td>' . $mobil->id_mobil . '</td>' .
                    '<td>' . $mobil->nama_mobil . '</td>' .
                    '<td>' . $mobil->warna . '</td>' .
                    '<td>' . $mobil->tahun_mobil . '</td>' .
                    '<td>' . $mobil->kapasitas_penumpang . '</td>' .
                    '<td>' . $mobil->harga_sewa . '</td>' .
                    '<td>' . $mobil->no_pol . '</td>' .
                    '<td>' . $mobil->status_sewa . '</td>' .
                    '</tr>';

                    
            }
           

        return Response($output);

       }
    }
    }

    

    public function mobiltambah()
    {
        $tarif = DB::table('tarif')->get();
     	return view('Admin.Mobil.AddMasterMobil',['mobil' => $tarif]);
    }

    public function actionmobil(Request $request)
    {

        $this->validate($request,[
            'id_tarif' => 'required',
            'nama_mobil' => 'required',
            'warna' => 'required',
            'kapasitas_mesin' => 'required',
            'gambar_mobil' => 'required',

            'no_pol' => 'required|min:5|max:12',
            'kapasitas_penumpang' => 'required|numeric',
        ]);

        $file = $request->file('gambar_mobil');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/mobil/files', $fileName);
        $wilkerku = DB::table('mobil')->insert([
            'id_tarif' => $request->id_tarif,
            'nama_mobil' => $request->nama_mobil,
            'warna' => $request->warna,
            'no_pol' => $request->no_pol,
            'kapasitas_penumpang' => $request->kapasitas_penumpang,
            'kapasitas_mesin' => $request->kapasitas_mesin,
            'gambar_mobil' => $fileName,

        ]);

        return redirect('/Admin/Mobil')->withSuccess('Berhasil menambahkan Mobil baru!');
    }

    public function mobilupdate($id)
    {
        $mobil = DB::table('mobil')
        ->join('tarif', 'mobil.id_tarif', '=', 'tarif.id_tarif')->where('id_mobil',$id)->get();
     	return view('Admin.Mobil.UpdateMasterMobil',['mobil' => $mobil]);
    }
    
    public function actionmobilupdate(Request $request)
    {
        $this->validate($request,[
            'id_tarif' => 'required',
            'nama_mobil' => 'required',
            'warna' => 'required',
            'kapasitas_mesin' => 'required',
            'gambar_mobil' => 'required',

            'no_pol' => 'required|min:5|max:12',
            'kapasitas_penumpang' => 'required|numeric',
        ]);
        
        $file = $request->file('gambar_mobil');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/mobil/files', $fileName);
        $pelanggan = DB::table('mobil')->where('id_mobil', $request->id)->update([
            'id_tarif' => $request->id_tarif,
            'nama_mobil' => $request->nama_mobil,
            'warna' => $request->warna,
            'no_pol' => $request->no_pol,
            'kapasitas_penumpang' => $request->kapasitas_penumpang,
            'kapasitas_mesin' => $request->kapasitas_mesin,
            'gambar_mobil' => $fileName,
        ]);

        return redirect('/Admin/Mobil')->withSuccess('Berhasil Mengubah data Mobil!');
    }

    public function deletemobil($id)
	{
        DB::table('pengembalian')
    ->join('penyewaan',"penyewaan.id_sewa","pengembalian.id_sewa")
    ->join('mobil',"penyewaan.id_mobil","mobil.id_mobil")
    ->where('mobil.id_mobil',$id)->delete();

    DB::table('pembayaran')->join('penyewaan',"penyewaan.id_sewa","pembayaran.id_sewa")
    ->join('mobil',"penyewaan.id_mobil","mobil.id_mobil")
    ->where('mobil.id_mobil',$id)->delete();

    DB::table('penyewaan')->join('mobil',"penyewaan.id_mobil","mobil.id_mobil")
    ->where('mobil.id_mobil',$id)->delete();

	DB::table('mobil')->where('id_mobil',$id)->delete();	
	return redirect('/Admin/Mobil')->withSuccess('Berhasil Menghapus Mobil!');
	}

    public function indextarif()
    {
        $data = DB::table('tarif')->select('id_tarif','tahun_mobil','waktu_sewa','harga_sewa','jenis_mobil')->get();

        return view('Admin.Tarif.MasterTarif',compact('data'));
    }
}
