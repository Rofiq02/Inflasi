<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobileControl extends Controller
{
		//
		function get_inflasi(){
			header ("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Headers: Authorization, Content-Type');

			$kategori = DB::Select('select tb_kategori.nama_kategori, tb_inflasi_kategori.nilai_inflasi from tb_kategori,tb_inflasi_kategori where tb_kategori.kd_kategori = tb_inflasi_kategori.kd_kategori order by nilai_inflasi desc limit 5');

			echo json_encode($kategori);
	
		}

		function get_inflasi_terkini(){
			header ("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Headers: Authorization, Content-Type');

			$terkini = DB::Select('select besar_inflasi from tb_inflasi_bulanan where tahun=year(curdate()) and kd_bulan=month(curdate())');

			echo json_encode($terkini);
		}

		function get_bulanan($tahuna){
			header ("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Headers: Authorization, Content-Type');

			$bulanan = DB::Select('Select tb_inflasi_bulanan.besar_inflasi,tb_bulan.nama_bulan from tb_inflasi_bulanan,tb_bulan where  tb_inflasi_bulanan.kd_bulan = tb_bulan.kd_bulan and tb_inflasi_bulanan.tahun = "'.$tahuna.'"');

			echo json_encode($bulanan);
		}

		function get_kalender($tahun){
			header ("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Headers: Authorization, Content-Type');

			$kalender = DB::Select('select tb_tahun_kalender.besar_inflasi,tb_bulan.nama_bulan from tb_tahun_kalender,tb_bulan where tb_bulan.kd_bulan = tb_tahun_kalender.kd_bulan and tahun = "'.$tahun.'"');

			echo json_encode($kalender);
		}


		function limit_kalender(){
			header ("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Headers: Authorization, Content-Type');

			$kalender = DB::Select('select tb_tahun_kalender.besar_inflasi,tb_bulan.nama_bulan from tb_tahun_kalender,tb_bulan where tb_tahun_kalender.kd_bulan = tb_bulan.kd_bulan and tahun = (curdate()) limit 5');

			echo json_encode($kalender);
		}

		function get_inflasi_kategori(){
			header ("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Headers: Authorization, Content-Type');

			$inflasi_kategori = DB::Select(' select tb_kategori.nama_kategori, tb_inflasi_kategori.nilai_inflasi from tb_kategori,tb_inflasi_kategori where tb_kategori.kd_kategori = tb_inflasi_kategori.kd_kategori order by nilai_inflasi desc limit 5');

			echo json_encode($inflasi_kategori);
		}
		
		function get_inflasi_item(){
			header ("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Headers: Authorization, Content-Type');

			$inflasi_item = DB::Select('select tb_item.nama_item,tb_detail_item.besar_inflasi,tb_bulan.nama_bulan,tb_detail_item.tahun from tb_item,tb_bulan,tb_detail_item where tb_item.kd_item = tb_detail_item.kd_item and tb_bulan.kd_bulan = tb_detail_item.kd_bulan order by besar_inflasi desc limit 5');

			echo json_encode($inflasi_item);
		}

		function get_inflasi_komoditas($kd_bulan,$tahun){
			header ("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Headers: Authorization, Content-Type');

			$inflasi_komoditas = DB::Select('select tb_item.nama_item,tb_detail_item.besar_inflasi from tb_item,tb_bulan,tb_detail_item where tb_item.kd_item = tb_detail_item.kd_item and tb_bulan.kd_bulan = tb_detail_item.kd_bulan
			and tb_detail_item.kd_bulan = "'.$kd_bulan.'" and tb_detail_item.tahun = "'.$tahun.'" order by besar_inflasi');

			echo json_encode($inflasi_komoditas);
		}

		function get_inflasi_yoy($tahun){
			header ("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Headers: Authorization, Content-Type');

			$inflasi_yoy = DB::Select('select tb_bulan.nama_bulan,tb_yoy.tahun,tb_bulan2.nama_bulan,tb_yoy.tahun2,tb_yoy.besar_inflasi from tb_bulan,tb_yoy,tb_bulan2 where tb_bulan.kd_bulan = tb_yoy.kd_bulan and tb_bulan2.id = tb_yoy.id and tahun= "'.$tahun.'"');

			echo json_encode($inflasi_yoy);
		}

		function get_kategori($tahun){
			header ("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Headers: Authorization, Content-Type');

			$kategori = DB::Select('select tb_kategori.nama_kategori,tb_inflasi_kategori.nilai_inflasi,tb_bulan.nama_bulan from tb_inflasi_kategori,tb_kategori,tb_bulan where tb_kategori.kd_kategori = tb_inflasi_kategori.kd_kategori and tb_bulan.kd_bulan = tb_inflasi_kategori.kd_kategori and tahun = "'.$tahun.'"');

			echo json_encode($kategori);
		}
		

    function save_member(Request $req){
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Headers: Authorization, Content-Type' );
		try {
			$data = $req->json()->all();
			if($data['users']==null){
			
				$newid = DB::select('SHOW TABLE STATUS LIKE "tb_anggota"');
				$nousers = "A".sprintf('%04d',$newid[0]->Auto_increment).date("mY");

				// Simpan Ke Tabel Anggota
				$res = DB::table('users')->insert([
                    'name' => $data['name'],
                    'alamat' => $data['alamat'],
                    'jk' => $data['jk'],
										'telp' => $data['telp'],
										'pekerjaan' => $data['pekerjaan'],
										'instansi' => $data['instansi'],
                    'email' => $data['email'],
			    	'status'=>1
				]);		

			} else {
				$res = DB::table('users')->where("email",$data['email'])->update([
					'name' => $data['name'],
                    'alamat' => $data['alamat'],
                    'jk' => $data['jk'],
										'telp' => $data['telp'], 
										'pekerjaan' => $data['pekerjaan'],
										'instansi' => $data['instansi'],
				]);	
			}

			$success = 1;
		} catch (\Exception $e){
			$success = 0;
		}
		
		if($success == 1){
			$profile = DB::select('SELECT * from users WHERE users.email="'.$data['email'].'"');

			// Save Base64 to Im
			$image = $data['foto'];  // your base64 encoded
			$image = str_replace('data:image/jpeg;base64,', '', $image);
			$image = str_replace(' ', '+', $image);
			$imageName = str_random(10).'.'.'png';
			\File::put(public_path(). '/img' . $imageName, base64_decode($image));

			echo json_encode(["type"=>"success","profile"=>$profile[0],"g"=>$data['foto']]);
		} else {
			echo json_encode(["type"=>"error","mess"=>"Error disimpan !"]);
		}		
	}
}
