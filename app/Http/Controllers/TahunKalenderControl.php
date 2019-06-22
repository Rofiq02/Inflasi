<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\KalenderReq;
use App\MGlobal;
use App\MTahunKalender;
use App\MBulan;

class TahunKalenderControl extends Controller
{
    //
    function index(){
        /*$tahun_kalender = DB::select('select tb_bulan.nama_bulan,tb_tahun_kalender.tahun,tb_tahun_kalender.besar_inflasi from tb_bulan,tb_tahun_kalender where tb_tahun_kalender.kd_bulan = tb_bulan.kd_bulan');*/

        $tahun_kalender = MTahunKalender::all();

        return view('data.data_tahun_kalender',compact('tahun_kalender'));
    }

    function add(){
        $tahun_kalender = MGlobal::Get_Row_Empty('tb_tahun_kalender');
        $bulan = MBulan::all();
        $mess = '';
        $thsek = date('Y');
        $tahun = [];
        for($i=$thsek; $i>=2008; $i--){
            $tahun[] = array('tahun'=>$i);
        }
        return view('form.frm_tahun_kalender',compact('tahun_kalender','bulan','mess','tahun'));
    }


function save(KalenderReq $req){

    $result = DB::table('tb_tahun_kalender')
        ->where('kd_bulan', '=', $req->kd_bulan)
        ->where('tahun', '=', $req->tahun)->first() != null;

    if($result){
        $mess = 'data sudah ada';
        $tahun_kalender = MTahunKalender::all();

        $tahun_kalender = (array)$req->all();
        $bulan = MBulan::all();
        $thsek = date('Y');
        $tahun = [];
        for($i=$thsek; $i>=2008; $i--){
            $tahun[] = array('tahun'=>$i);
        }

        return view('form.frm_tahun_kalender',compact('mess','tahun_kalender','bulan','tahun'));
    }else{


        if($req->get('id')==""){
            //menciptakan kode anggota
            $newid = DB::select('SHOW TABLE STATUS LIKE "tb_detail_item"');
            $nokalender = "A".sprintf('%04d',$newid[0]->Auto_increment).date('mY');
    
          //Proses Simpan Ke Dalam Tabel
        $tahun_kalender = new MTahunKalender([
            'kd_bulan' => $req->get('kd_bulan'),
            'tahun' => $req->get('tahun'),
            'besar_inflasi' => $req->get('besar_inflasi')

        ]);
        $tahun_kalender->save();
        } else {
            $tahun_kalender= MTahunKalender::where("kd_kalender",$req->get('kd_kalender'));
            $tahun_kalender->update([
                'kd_bulan' => $req->get('kd_bulan'),
                'tahun' => $req->get('tahun'),
                'besar_inflasi' => $req->get('besar_inflasi')
                ]);
        }
        return redirect('tahun_kalender');
    }
}

   function edit($id){
        $tahun_kalender = MTahunKalender::where("kd_kalender",$id)->first();
        $bulan = MBulan::all();
        $mess = '';
        $thsek = date('Y');
        $tahun = [];
        for($i=$thsek; $i>=2008; $i--){
            $tahun[] = array('tahun'=>$i);
        }

        return view('form.frm_tahun_kalender',compact('tahun_kalender','bulan','mess','tahun'));
   }

   	

    function hapus($id){
        //menghapus data berdasarkan id yang dipilih
        DB::table('tb_tahun_kalender')->where('kd_kalender',$id)->delete();

        return redirect('/tahun_kalender');
    }

}
