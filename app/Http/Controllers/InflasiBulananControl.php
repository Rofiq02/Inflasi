<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BulananReq;
use Illuminate\Support\Facades\DB;
use App\MGlobal;
use App\MBulanan;
use App\MBulan;
use RealRashid\SweetAlert\Facades\Alert;


class InflasiBulananControl extends Controller
{
    //
    function index(){
        /*$inflasi = DB::select('select tb_bulan.nama_bulan,tb_inflasi_bulanan.besar_inflasi,tb_inflasi_bulanan.tahun from tb_bulan,tb_inflasi_bulanan where tb_inflasi_bulanan.kd_bulan = tb_bulan.kd_bulan');*/

        $inflasi = MBulanan::all();

        return view('data.data_inflasi_bulanan',compact('inflasi'));
    }

    function add(){
        $inflasi = MGlobal::Get_Row_Empty('tb_inflasi_bulanan');
        $bulan = MBulan::all();
        $mess = '';
        $thsek = date('Y');
        $tahun = [];
        for($i=$thsek; $i>=2008; $i--){
            $tahun[] = array('tahun'=>$i);
        }

        return view('form.frm_inflasi_bulanan',compact('inflasi','bulan','mess','tahun'));
    }

    // function tahunCreate(){
    //     $thsek = date('Y');
    //     $tahun = [];
    //     for($i=$thsek; $i>=2008; $i--){
    //         $tahun[] = array('tahun'=>$i);
    //     }
    //     return $tahun;
    // }

    function save(BulananReq $req){

        $result = DB::table('tb_inflasi_bulanan')
        ->where('kd_bulan', '=', $req->kd_bulan)
        ->where('tahun', '=', $req->tahun)->first() != null;

    if($result){
        $mess = 'data sudah ada';
        $inflasi = MBulanan::all();

        $inflasi = (array)$req->all();
        $bulan = MBulan::all();
        $thsek = date('Y');
        $tahun = [];
        for($i=$thsek; $i>=2008; $i--){
            $tahun[] = array('tahun'=>$i);
        }

        return view('form.frm_inflasi_bulanan',compact('inflasi','bulan','mess','tahun'));
    }else{

        if($req->get('kd_inflasi')==""){
        //menciptakan kode anggota
        $newid = DB::select('SHOW TABLE STATUS LIKE "tb_inflasi_bulanan"');
        $inflasi = "A".sprintf('%04d',$newid[0]->Auto_increment).date('mY');

        //Proses Simpan Ke Dalam Tabel
        $inflasi = new MBulanan([
            'kd_bulan' => $req->get('kd_bulan'),
            'besar_inflasi' => $req->get('besar_inflasi'),
            'tahun' => $req->get('tahun')

        ]);
        $inflasi->save();
        } else {
            $inflasi= MBulanan::where("kd_inflasi",$req->get('kd_inflasi'));
            $inflasi->update([
                'kd_bulan' => $req->get('kd_bulan'),
                'besar_inflasi' => $req->get('besar_inflasi'),
                'tahun' => $req->get('tahun')
                ]);
        }

        return redirect('inflasi_bulanan');
    }

}

   function edit($id){
        $inflasi = MBulanan::where("kd_inflasi",$id)->first();
        $bulan = MBulan::all();
        $mess = '';
        $thsek = date('Y');
        $tahun = [];
        for($i=$thsek; $i>=2008; $i--){
            $tahun[] = array('tahun'=>$i);
        }

        return view('form.frm_inflasi_bulanan',compact('inflasi','bulan','mess','tahun'));
   }


   	

    function hapus($id){
        //menghapus data berdasarkan id yang dipilih
        DB::table('tb_inflasi_bulanan')->where('kd_inflasi',$id)->delete();

        return redirect('/inflasi_bulanan');
    }

}
