<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DetailItemReq;
use App\MGlobal;
use App\MDetailItem;
use App\MBulan;
use App\MItem;

class DetailItemControl extends Controller
{
    //
    function index(){
        /*$detail_item = DB::select('select tb_bulan.nama_bulan,tb_detail_item.tahun,tb_item.nama_item from tb_bulan,tb_detail_item,tb_item where tb_detail_item.kd_bulan = tb_bulan.kd_bulan and tb_detail_item.kd_item = tb_item.kd_item');*/

        $detail_item = MDetailItem::all();
        

        return view('data.data_detail_item',compact('detail_item'));
    }

    function add(){
        $detail_item = MGlobal::Get_Row_Empty('tb_detail_item');
        $bulan = MBulan::all();
        $item = MItem::all();
        $mess = '';
        $thsek = date('Y');
        $tahun = [];
        for($i=$thsek; $i>=2008; $i--){
            $tahun[] = array('tahun'=>$i);
        }
        return view('form.frm_detail_item',compact('detail_item','bulan','item', 'mess','tahun'));
    }

    function save(DetailItemReq $req){

        $result = DB::table('tb_detail_item')
            ->where('tahun', '=', $req->tahun)
            ->where('kd_bulan', '=', $req->bulan)
            ->where('kd_item', '=', $req->item)->first() != null;

        if($result){
            $mess = 'data sudah ada';
            $detail_item = MDetailItem::all();

            $detail_item = (array)$req->all();
            $bulan = MBulan::all();
            $item = MItem::all();
            $thsek = date('Y');
            $tahun = [];
            for($i=$thsek; $i>=2008; $i--){
                $tahun[] = array('tahun'=>$i);
            }

            return view('form.frm_detail_item',compact('detail_item','bulan','item', 'mess','tahun'));
        }else{


            if($req->get('id')==""){
                //menciptakan kode anggota
                $newid = DB::select('SHOW TABLE STATUS LIKE "tb_detail_item"');
                $noitem = "A".sprintf('%04d',$newid[0]->Auto_increment).date('mY');
        
                //Proses Simpan Ke Dalam Tabel
                $detail_item = new MDetailItem([
                    'kd_bulan' => $req->get('kd_bulan'),
                    'tahun' => $req->get('tahun'),
                    'kd_item' => $req->get('kd_item'),
                    'besar_inflasi' => $req->get('besar_inflasi')
        
                    
                ]);
                $detail_item->save();
                } else {
                    $detail_item = MDetailItem::where("id",$req->get('id'));
                    $detail_item->update([
                        'kd_bulan' => $req->get('kd_bulan'),
                        'tahun' => $req->get('tahun'),
                        'kd_item' => $req->get('kd_item'),
                        'besar_inflasi' => $req->get('besar_inflasi')
                        ]);
                }
                return redirect('detail_item');
        }
    }

   function edit($id){
        $detail_item = MDetailItem::where("id",$id)->first();
        $bulan = MBulan::all();
        $item = MItem::all();
        $mess = '';
        $thsek = date('Y');
        $tahun = [];
        for($i=$thsek; $i>=2008; $i--){
            $tahun[] = array('tahun'=>$i);
        }

        return view('form.frm_detail_item',compact('detail_item','bulan','item','mess','tahun'));
   }    

   	

    function hapus($id){
       
        DB::table('tb_detail_item')->where('id',$id)->delete();

        return redirect('/detail_item');
    }

}
