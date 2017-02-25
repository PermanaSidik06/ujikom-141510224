<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model. untuk nama model sesuaikan dengan nama model kalian
use App\User;
use App\jabatanModel;
use App\golonganModel;
use App\pegawaiModel;
use App\tunjanganModel;
use App\tunjangan_pegawaiModel;
use App\kategori_lemburModel;
use App\lembur_pegawaiModel;
use App\penggajianModel;

use Auth;
use DB;
use Hash;
use JWTAuth;

class ApiController extends Controller
{
    // public function register(Request $request)
    // {        
    // 	$input = $request->all();
    // 	$input['password'] = Hash::make($input['password']);
    // 	User::create($input);
    //     return response()->json(['result'=>true]);
    // }
    

    public function login(Request $request)
    {
        // $user = User::where('id', Auth::user()->id)->get();
        $response = array("error" => FALSE);
    	$input = $request->all();
    	if (!$token = JWTAuth::attempt($input)) {
            $response["error"] = TRUE;
            $response["error_msg"] = "Email or password yang anda masukan salah. Silahkan Coba Lagi!";
            // return response()->json(['result' => 'wrong email or password.']);
            return ($response);
        }

        $user = JWTAuth::toUser($token);

        // Detail user & Pegawai Json
        // Bisa diakses lewat postman & Android Login
        $detail = $user::select('users.id as uid', 
                                'users.name as name', 
                                'users.email as email', 
                                'users.created_at as created_at', 
                                'users.permision as permision', 
                                'pegawai.nip as nip',
                                'pegawai.foto as foto', 
                                'jabatan.nama_jabatan as jabatan', 
                                'jabatan.besaran_uang as uangjabatan',
                                'golongan.nama_golongan as golongan',
                                'golongan.besaran_uang as uanggolongan',
                                DB::raw('(jabatan.besaran_uang + golongan.besaran_uang) as gaji'))
                    ->join('pegawai', 'pegawai.user_id', '=', 'users.id')
                    ->join('jabatan', 'pegawai.jabatan_id', '=', 'jabatan.id')
                    ->join('golongan', 'pegawai.golongan_id', '=', 'golongan.id')
                    // ->join('tunjangan_pegawais' , 'tunjangan_pegawais.kode_tunjangan_id', '=', 'tunjangans.id')
                    // ->join('tunjangans', 'tunjangans.id', '=', 'tunjangan_pegawais.kode_tunjangan_id')
                    ->where('users.id', $user->id)
                    ->firstorFail();

        // Get Photo
        $img = asset("profile/".$detail->foto);

        // JSON Output
        $response["error"] = FALSE;
        $response["uid"] = $detail["uid"];
        $response["user"]["foto"] = $img;
        $response["user"]["name"] = $detail["name"];
        $response["user"]["email"] = $detail["email"];
        $response["user"]["permision"] = $detail["permision"];
        $response["user"]["nip"] = $detail["nip"];
        $response["user"]["created_at"] = $detail["created_at"];
        $response["user"]["detail"]["jabatan"] = $detail["jabatan"];
        $response["user"]["detail"]["golongan"] = $detail["golongan"];
        $response["user"]["keuangan"]["uang jabatan"] = $detail["uangjabatan"];
        $response["user"]["keuangan"]["uang golongan"] = $detail["uanggolongan"];
        $response["user"]["keuangan"]["gaji pokok"] = $detail["gaji"];


        // echo json_encode($response);
        // return response()->json(['result' =>  $response]);
        return ($response);
    }
    
    // public function get_user_details(Request $request)
    // {
    // 	$input = $request->all();
    // 	$user = JWTAuth::toUser($input['token']);
    //     return response()->json(['result' => $user]);
    // }
}
