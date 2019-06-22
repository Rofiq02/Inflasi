<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MGlobal extends Model
{
    public static function Get_Row_Empty($table){
        $columns = DB::select('show columns from '.$table);
        foreach($columns as $col){
            $column[$col->Field]="";
        }
        return $column;
    }

    public static function Get_Kategori($kd_kategori){
        $kategori = DB::table('tb_kategori')->where('kd_kategori',$kd_kategori)->first();
        if($kategori!=""){
            $nama_kategori = $kategori->nama_kategori;
        } else{
            $nama_kategori = "-";
        }

        return $nama_kategori;
    }

    public static function Get_Bulan($kd_bulan){
        $bulan = DB::table('tb_bulan')->where('kd_bulan',$kd_bulan)->first();
        if($bulan!=""){
            $nama_bulan = $bulan->nama_bulan;
        } else{
            $nama_bulan = "-";
        }

        return $nama_bulan;
    }

    public static function Get_Bulan2($id){
        $bulan2 = DB::table('tb_bulan2')->where('id',$id)->first();
        if($bulan2!=""){
            $nama_bulan = $bulan2->nama_bulan;
        } else{
            $nama_bulan = "-";
        }

        return $nama_bulan;
    }

    public static function Get_Item($kd_item){
        $item = DB::table('tb_item')->where('kd_item',$kd_item)->first();
        if($item!=""){
            $nama = $item->nama_item;
        } else{
            $nama = "-";
        }

        return $nama;
    }


}
