<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\InkatReq;
use App\MGlobal;
use App\MInflasiKategori;
use App\MKategori;
use App\MBulan;

class InflasiKategoriControl extends Controller
{
    //
    function index(){
        /*$inflasi_kategori = DB::select('SELECT tb_bulan.nama_bulan,tb_inflasi_kategori.tahun,tb_kategori.nama_kategori,tb_inflasi_kategori.nilai_inflasi FROM tb_inflasi_kategori,tb_kategori,tb_bulan WHERE tb_inflasi_kategori.kd_kategori = tb_kategori.kd_kategori and tb_inflasi_kategori.kd_bulan = tb_bulan.kd_bulan');*/

        $inflasi_kategori = MInflasiKategori::All();

        return view('data.data_inflasi_kategori',compact('inflasi_kategori'));
    }

    function add(){
        $inflasi_kategori = MGlobal::Get_Row_Empty('tb_inflasi_kategori');
        $kategori = MKategori::all();
        $bulan = MBulan::all();
        $mess = '';
        $thsek = date('Y');
        $tahun = [];
        for($i=$thsek; $i>=2008; $i--){
            $tahun[] = array('tahun'=>$i);
        }
        return view('form.frm_inflasi_kategori',compact('inflasi_kategori','kategori','bulan','mess','tahun'));
    }

    function save(InkatReq $req){

        $result = DB::table('tb_inflasi_kategori')
            ->where('tahun', '=', $req->tahun)
            ->where('kd_bulan', '=', $req->bulan)
            ->where('kd_kategori', '=', $req->kategori)->first() != null;

        if($result){
            $mess = 'data sudah ada';
            $inflasi_kategori = MInflasiKategori::all();

            $inflasi_kategori = (array)$req->all();
            $bulan = MBulan::all();
            $kategori = MKategori::all();
            $thsek = date('Y');
            $tahun = [];
            for($i=$thsek; $i>=2008; $i--){
                $tahun[] = array('tahun'=>$i);
            }

            return view('form.frm_inflasi_kategori',compact('inflasi_kategori','bulan','kategori', 'mess','tahun'));
        }else{


            if($req->get('id')==""){
                //menciptakan kode anggota
                $newid = DB::select('SHOW TABLE STATUS LIKE "tb_inflasi_kategori"');
                $nokategori = "A".sprintf('%04d',$newid[0]->Auto_increment).date('mY');
        
                //Proses Simpan Ke Dalam Tabel
                $inflasi_kategori = new MInflasiKategori([
                    'kd_bulan' => $req->get('kd_bulan'),
                    'tahun' => $req->get('tahun'),
                    'kd_kategori' => $req->get('kd_kategori'),
                    'nilai_inflasi' => $req->get('nilai_inflasi')
        
                    
                ]);
                $inflasi_kategori->save();
                echo $req->get('kd_bulan');
                } else {
                    $inflasi_kategori = MInflasiKategori::where("id",$req->get('id'));
                    $inflasi_kategori->update([
                        'kd_bulan' => $req->get('kd_bulan'),
                        'tahun' => $req->get('tahun'),
                        'kd_kategori' => $req->get('kd_kategori'),
                        'nilai_inflasi' => $req->get('nilai_inflasi')
                        ]);
                        echo $req->get('kd_bulan');
                }
                return redirect('inflasi_kategori');
        }
    }

   function edit($id){
        $inflasi_kategori = MInflasiKategori::where("id",$id)->first();
        $kategori = MKategori::all();
        $bulan = MBulan::all();
        $mess = '';
        $thsek = date('Y');
        $tahun = [];
        for($i=$thsek; $i>=2008; $i--){
            $tahun[] = array('tahun'=>$i);
        }

        return view('form.frm_inflasi_kategori',compact('inflasi_kategori','kategori','bulan','mess','tahun'));
   }

   	

    function hapus($id){
        //menghapus data berdasarkan id yang dipilih
        DB::table('tb_inflasi_kategori')->where('id',$id)->delete();

        return redirect('/inflasi_kategori');
    }

}
