<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardControl extends Controller
{
    //
    function grafik(){
        $bulanan = DB::Select('select tb_bulan.nama_bulan, tb_inflasi_bulanan.besar_inflasi as bi  from tb_bulan,tb_inflasi_bulanan where tb_inflasi_bulanan.kd_bulan = tb_bulan.kd_bulan and tahun=year(curdate()) and nama_bulan <= month(curdate())');
        $bulananKemarin = DB::Select('select besar_inflasi as bk  from tb_inflasi_bulanan where tahun=year(curdate()-interval 1 year)');
        $kalender = DB::Select('select besar_inflasi as k  from tb_tahun_kalender where tahun=year(curdate()) and kd_bulan <= month(curdate())');
        $kalenderKemarin = DB::Select('select besar_inflasi as kk  from tb_tahun_kalender where tahun=year(curdate()-interval 1 year)');
        $YoY = DB::Select('select besar_inflasi as Yo from tb_yoy where tahun=curdate()');
        $yoyo = DB::Select('select besar_inflasi as YY from tb_yoy where tahun=curdate()-INTERVAL 1 YEAR');
        $bulanin = DB::Select('select tb_bulan.nama_bulan as bl  from tb_bulan where kd_bulan <= month(curdate())');
        $kategori = DB::Select('select tb_kategori.nama_kategori, tb_inflasi_kategori.nilai_inflasi from tb_kategori,tb_inflasi_kategori where tb_kategori.kd_kategori = tb_inflasi_kategori.kd_kategori order by nilai_inflasi desc limit 5');

        $blnn = DB::Select('select besar_inflasi as jumlah from tb_inflasi_bulanan order by besar_inflasi desc limit 1');
        $jumlahblnn = $blnn[0]->jumlah;
        $kmd = DB::Select('select besar_inflasi as jumlah from tb_detail_item order by besar_inflasi desc limit 1');
        $jumlahkmd = $kmd[0]->jumlah;
        $yof = DB::Select('select besar_inflasi as jumlah from tb_yoy order by besar_inflasi desc limit 1');
        $jumlahyof = $yof[0]->jumlah;
        $tk = DB::Select('select besar_inflasi as jumlah from tb_tahun_kalender order by besar_inflasi desc limit 1');
        $jumlahtk = $tk[0]->jumlah;
        // dd($bulanan);
        
        for($i =1;$i <= 5 ;$i++){
            $month[] = date("M",strtotime(date('Y-m-01')."-$i month"));
        }
       // echo date("Y-m-d");
       return view('dashboard', compact('month','bulanan','bulananKemarin','kalender','kalenderKemarin','YoY','yoyo','bulanin','kategori','jumlahblnn','jumlahkmd','jumlahyof','jumlahtk'));

     }
}
