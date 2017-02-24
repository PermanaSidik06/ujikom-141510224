<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\lembur_pegawaiModel;
use App\tunjangan_pegawaiModel;
use App\pegawaiModel;
use App\tunjanganModel;
use App\penggajianModel;
use App\jabatanModel;
use App\kategori_lemburModel;
use App\golonganModel;
use App\User;
use Carbon\Carbon;
use Input;
use Auth;


class penggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $penggajian = penggajianModel::with('tunjangan_pegawaiModel')->get();
        $tunjangan_pegawai = tunjangan_pegawaiModel::with('tunjanganModel')->first();

        $tunjangan = tunjanganModel::where('id',$tunjangan_pegawai->kode_tunjangan)->first();
        $pegawai = pegawaiModel::with('User')->first();
        $users = User::where('id',$pegawai['user_id'])->first();
        $penggajian = penggajianModel::all();
        return view('penggajian.index', compact('penggajian', 'tunjangan_pegawai', '$pegawai', 'tunjangan', 'users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pegawai = pegawaiModel::with('User')->get();
     return view('penggajian.create',compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $penggajian = Request::all();

        $now = Carbon::now();
            $kode_tunjangan_id = tunjangan_pegawaiModel::where('pegawai_id', $penggajian['pegawai_id'])->first();
            $tunjangan_pegawai = tunjangan_pegawaiModel::where('pegawai_id',$penggajian['pegawai_id'])->first();
    if($tunjangan_pegawai==null)
        {
            $missing_count=true;

            $pegawai = pegawaiModel::with('User')->get();
            return view('penggajian.create',compact('missing_count','pegawai'));
        }
        else
        {
            $penggajian1 = penggajianModel::where('tunjangan_pegawai_id', $kode_tunjangan_id->id)->first();
            if(isset($penggajian1->id))
        {
            if($penggajian1->created_at->month==$now->month)
            {
                return redirect('penggajian/create'.'?errors_match');
            }
         }
        $user = $penggajian['pegawai_id'];
        $jumlah_jam_lembur = DB::table('lembur_pegawai')
        ->where('lembur_pegawai.pegawai_id', '=', $user)
        ->sum('lembur_pegawai.jumlah_jam');
        
        
        
        $pegawai = pegawaiModel::where('id',$penggajian['pegawai_id'])->first();
        $kategori_lembur = kategori_lemburModel::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();
        $jabatan = jabatanModel::where('id',$pegawai->jabatan_id)->first();
        $golongan = golonganModel::where('id',$pegawai->golongan_id)->first();
        $lembur_pegawai = lembur_pegawaiModel::where('pegawai_id',$penggajian['pegawai_id'])->first();
        $gaji_pokok = jabatanModel::where('besaran_uang')->first();
        $tunjangan = tunjanganModel::where('id',$tunjangan_pegawai->kode_tunjangan_id)->first();
        $penggajian['tunjangan_pegawai_id']= $tunjangan_pegawai->id;
        $penggajian['jumlah_jam_lembur']= (int)$jumlah_jam_lembur;
        $penggajian['jumlah_uang_lembur']= $kategori_lembur['besaran_uang']*(int)$jumlah_jam_lembur;
        $penggajian['gaji_pokok']= $jabatan->besaran_uang+$golongan->besaran_uang;
        $penggajian['total_gaji']= $penggajian['gaji_pokok']+$penggajian['jumlah_uang_lembur']+$tunjangan['besaran_uang'];
        $penggajian['status_pengambilan']= Input::get('status_pengambilan');
        $penggajian['tanggal_pengambilan']= date('d-m-y');
        //$penggajian['petugas_penerimaan']= Auth::user()->name;
        penggajianModel::create($penggajian);
        }
        return redirect('penggajian');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
