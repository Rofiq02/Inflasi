<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\YoYReq;
use App\MGlobal;
use App\MYoY;
use App\MBulan;
use App\MBulan2;
use RealRashid\SweetAlert\Facades\Alert;

class InflasiYoYControl extends Controller
{
    //
    function index(){
        /*$inflasi_YoY = DB::select('select tb_bulan.nama_bulan,tb_yoy.tahun,tb_yoy.besar_inflasi from tb_bulan,tb_yoy where tb_yoy.kd_bulan = tb_bulan.kd_bulan');*/

        $inflasi_YoY = MYoY::All();

        return view('data.data_inflasi_YoY',compact('inflasi_YoY'));
    }

    function add(){
        $inflasi_YoY = MGlobal::Get_Row_Empty('tb_yoy');
        $bulan = MBulan::all();
        $bulan2 = MBulan2::all();
        $thsek = date('Y');
        $tahun = [];
        for($i=$thsek; $i>=2008; $i--){
            $tahun[] = array('tahun'=>$i);
        }
        $thsek2 = date('Y');
        $tahun2 = [];
        for($i=$thsek2; $i>=2008; $i--){
            $tahun2[] = array('tahun2'=>$i);
        }
        return view('form.frm_inflasi_YoY',compact('inflasi_YoY','bulan','bulan2','tahun','tahun2'));
    }

    function save(YoYReq $req){


        if($req->get('kd_YoY')==""){
        //menciptakan kode anggota
        $newid = DB::select('SHOW TABLE STATUS LIKE "tb_yoy"');
        $YoY = "A".sprintf('%04d',$newid[0]->Auto_increment).date('mY');

        //Proses Simpan Ke Dalam Tabel
        $inflasi_YoY = new MYoY([
            'kd_bulan' => $req->get('kd_bulan'),
            'tahun' => $req->get('tahun'),
            'id' => $req->get('id'),
            'tahun2' => $req->get('tahun2'),
            'besar_inflasi' => $req->get('besar_inflasi')

        ]);
        $inflasi_YoY->save();
        } else {
            $inflasi_YoY = MYoY::where("kd_YoY",$req->get('kd_YoY'));
            $inflasi_YoY->update([
                'kd_bulan' => $req->get('kd_bulan'),
                'tahun' => $req->get('tahun'),
                'id' => $req->get('id'),
                'tahun2' => $req->get('tahun2'),
                'besar_inflasi' => $req->get('besar_inflasi')
                ]);
        }
        return redirect('inflasi_YoY');
    }

   function edit($id){
        $inflasi_YoY = MYoY::where("kd_YoY",$id)->first();
        $bulan = MBulan::all();
        $bulan2 = MBulan2::all();
        $thsek = date('Y');
        $tahun = [];
        for($i=$thsek; $i>=2008; $i--){
            $tahun[] = array('tahun'=>$i);
        }
        $thsek2 = date('Y');
        $tahun2 = [];
        for($i=$thsek2; $i>=2008; $i--){
            $tahun2[] = array('tahun2'=>$i);
        }

        return view('form.frm_inflasi_YoY',compact('inflasi_YoY','bulan','bulan2','tahun','tahun2'));
   }

   	

    function hapus($id){
        //menghapus data berdasarkan id yang dipilih
        DB::table('tb_yoy')->where('kd_YoY',$id)->delete();

        return redirect('/inflasi_YoY');
    }

}
