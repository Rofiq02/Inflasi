<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session; 




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

			$kalender = DB::Select('select tb_tahun_kalender.besar_inflasi,tb_bulan.nama_bulan from tb_tahun_kalender,tb_bulan where tb_tahun_kalender.kd_bulan = tb_bulan.kd_bulan and tahun = (curdate()) limit 4');

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

		function get_inflasi_kemarin(){
			header ("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Headers: Authorization, Content-Type');

			$inflasikemarin = DB::Select('select tb_inflasi_bulanan.besar_inflasi,tb_bulan.nama_bulan,tb_inflasi_bulanan.tahun from tb_inflasi_bulanan,tb_bulan where tb_bulan.kd_bulan = tb_inflasi_bulanan.kd_bulan order by besar_inflasi desc limit 1');

			echo json_encode($inflasikemarin);
		}

		function get_kalender_terkini(){
			header ("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Headers: Authorization, Content-Type');

			$kalenderterkini = DB::Select('select besar_inflasi from tb_tahun_kalender where tahun=year(curdate()) and kd_bulan=month(curdate())');

			echo json_encode($kalenderterkini);
		}

		function get_kategori_sekarang(){
			header ("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Headers: Authorization, Content-Type');

			$kategorisekarang = DB::Select('select tb_kategori.nama_kategori, tb_inflasi_kategori.nilai_inflasi from tb_kategori,tb_inflasi_kategori where tb_kategori.kd_kategori = tb_inflasi_kategori.kd_kategori and tahun=year(curdate()) and kd_bulan=month(curdate())');

			echo json_encode($kategorisekarang);
		}

		function get_yoy_limit(){
			header ("Access-Control-Allow-Origin: *");
			header('Access-Control-Allow-Headers: Authorization, Content-Type');
			
			$yoylimit = DB::Select('select tb_bulan.nama_bulan,tb_yoy.tahun,tb_bulan2.nama_bulan,tb_yoy.tahun2,tb_yoy.besar_inflasi from tb_bulan,tb_yoy,tb_bulan2 where tb_bulan.kd_bulan = tb_yoy.kd_bulan and tb_bulan2.id = tb_yoy.id and tahun = year(curdate()) and tb_bulan.nama_bulan <= month(curdate()) limit 4');

			echo json_encode($yoylimit);
		}
		
		function register(Request $req){
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Headers: Authorization, Content-Type' );

			

			$new = $req->all(); // get data dari ionic

			$token = csrf_token(); 
			$user = new User([
				"name"=>$new['name'],
				"alamat"=>$new['alamat'],
				"telp"=>$new['telp'],
				"email"=>$new['email'],
				"password"=>Hash::make($new['password']),
				"level"=>3,
				"remember_token"=>$token
			]);
			
			// Nilai balik
			if($user->save()){
				echo json_encode(["type"=>"success","msg"=>$new]);			
			} else {
				echo json_encode(["type"=>"error","msg"=>"Data Gagal Disimpan ! "]);
			}
		}

		function login(Request $req){
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Headers: Authorization, Content-Type' );
	
			$login = $req->all();
	
			// Cek Email
			$ceklogin = DB::table('users')->where('email',$login['email'])->first();
			if($ceklogin){
				if(Hash::check($login["password"],$ceklogin->password)){
					$profile = DB::select('SELECT id,name,alamat,jk,telp,pekerjaan,instansi,email,level,avatar from users WHERE users.email="'.$login['email'].'"');
					echo json_encode(["type"=>"success","profile"=>$profile[0]]);
				} else {
					echo json_encode(["type"=>"error pass","msg"=>"Password Invalid !"]);
				}
			} else {
				echo json_encode(["type"=>"error email","msg"=>"Email Invalid !"]);
			}
	
		}

    function save_member(Request $req){
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Headers: Authorization, Content-Type' );
		
		try {

			$req = $req->json()->all();
			if($req['id']==null){
			
				// $newid = DB::select('SHOW TABLE STATUS LIKE "tb_anggota"');
				// $nousers = "A".sprintf('%04d',$newid[0]->Auto_increment).date("mY");
				$rek = "add";
				// Simpan Ke Tabel Anggota
				$res = DB::table('users')->insert([
                    'name' => $req['name'],
                    'alamat' => $req['alamat'],
                    'jk' => $req['jk'],
					'telp' => $req['telp'],
					'pekerjaan' => $req['pekerjaan'],
					'instansi' => $req['instansi'],
                    'email' => $req['email'],
			    	'level'=>1
				]);		

			} else {
				$rek ="edit";
				$res = DB::table('users')->where("email",$req['email'])->update([
					'name' => $req['name'],
                    'alamat' => $req['alamat'],
                    'jk' => $req['jk'],
					'telp' => $req['telp'], 
					'pekerjaan' => $req['pekerjaan'],
					'instansi' => $req['instansi'],
					'email' => $req['email'],
				]);	
			}

			$success = 1;
		} catch (\Exception $e){
			$success = 0;
			// $messg = $e;
		    // echo json_encode(["type"=>"error ","message"=>$req,"rek"=>$rek]);
		}
		
		if($success == 1){
			// $profile = DB::select('SELECT * from users WHERE users.email="'.$req['email'].'"');
			// dd($profile); 
			// // Save Base64 to Im
			// $image = $req['avatar'];  // your base64 encoded
			// $image = str_replace('data:image/jpeg;base64,', '', $image);
			// $image = str_replace(' ', '+', $image);
			// $imageName = str_random(10).'.'.'png';
			// \File::put(public_path(). '/img' . $imageName, base64_decode($image));

			

			echo json_encode(["type"=>"success","profile"=>$req]);
		} else {
		    echo json_encode(["type"=>"error ","message"=>$messg]);
		}		
	}
}
