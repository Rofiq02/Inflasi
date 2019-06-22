<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemReq;
use Illuminate\Support\Facades\DB;
use App\MGlobal;
use App\MItem;
use App\MKategori;

class ItemControl extends Controller
{
    //
    function index(){
        /*$item = DB::select('SELECT tb_item.kd_item,tb_kategori.nama_kategori,tb_item.nama_item FROM tb_item,tb_kategori WHERE tb_item.kd_item = tb_kategori.kd_kategori');*/

        $item = MItem::all();

        return view('data.data_item',compact('item'));
    }

    function add(){
        $item = MGlobal::Get_Row_Empty('tb_item');
        $kategori = MKategori::all();
        return view('form.frm_item',compact('item','kategori'));
    }

    function save(ItemReq $req){


        if($req->get('kd_item')==""){
        //menciptakan kode anggota
        $newid = DB::select('SHOW TABLE STATUS LIKE "tb_item"');
        $noitem = "A".sprintf('%04d',$newid[0]->Auto_increment).date('mY');

        //Proses Simpan Ke Dalam Tabel
        $item = new MItem([
            'kd_item' => $req->get('kd_item'),
            'kd_kategori' => $req->get('kategori'),
            'nama_item' => $req->get('nama_item'),
            
        ]);
        $item->save();
        } else {
            $item = MItem::where("kd_item",$req->get('kd_item'));
            $item->update([
                'kd_item' => $req->get('kd_item'),
                'kd_kategori' => $req->get('kategori'),
                'nama_item' => $req->get('nama_item'),
                ]);
        }
        return redirect('item');
    }

   function edit($id){
        $item = MItem::where("kd_item",$id)->first();
        $kategori = MKategori::all();

        return view('form.frm_item',compact('item','kategori'));
   }

   	

    function hapus($id){
        //menghapus data berdasarkan id yang dipilih
        DB::table('tb_item')->where('kd_item',$id)->delete();

        return redirect('/item');
    }

}
