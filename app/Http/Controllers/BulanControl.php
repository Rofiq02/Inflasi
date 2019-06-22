<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MGlobal;
Use App\MBulan;

class BulanControl extends Controller
{
    //
    function index(){
        $bulan = DB::table('tb_bulan')->get();

        return view('data.data_bulan',compact('bulan'));
    }

    function add(){
        $bulan = MGlobal::Get_Row_Empty('tb_bulan');
        return view('form.frm_bulan',compact('bulan'));
    }

    function save(Request $req){


        if($req->get('kd_bulan')==""){
        //menciptakan kode anggota
        $newid = DB::select('SHOW TABLE STATUS LIKE "tb_bulan"');
        $nobulan = "A".sprintf('%04d',$newid[0]->Auto_increment).date('mY');

        //Proses Simpan Ke Dalam Tabel
        $bulan = new MBulan([
            'nama_bulan' => $req->get('nama_bulan')
        ]);
        $bulan->save();
        } else {
            $bulan = MBulan::where("kd_bulan",$req->get('kd_bulan'));
            $bulan->update([
                'nama_bulan' => $req->get('nama_bulan')
                ]);
        }
        return redirect('bulan');
    }

   function edit($id){
        $bulan = MBulan::where("kd_bulan",$id)->first();

        return view('form.frm_bulan',compact("bulan"));
   }

   	

    function hapus($id){
        //menghapus data berdasarkan id yang dipilih
        DB::table('tb_bulan')->where('kd_bulan',$id)->delete();

        return redirect('/bulan');
    }

}