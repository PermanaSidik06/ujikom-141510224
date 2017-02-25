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
       $gajian = penggajianModel::paginate(3);
        return view('penggajian.index',compact('gajian'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       $gaji = tunjangan_pegawaiModel::paginate(10);
        return view('penggajian.create',compact('gaji')); 
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
        
        $i_gaji=Input::all();
        $tunjangan_pegawai=tunjangan_pegawaiModel::where('id',$i_gaji['tunjangan_pegawai_id'])->first();
        $WPenggajian=penggajianModel::where('tunjangan_pegawai_id',$tunjangan_pegawai->id)->first();
        $tunjangan=tunjanganModel::where('id',$tunjangan_pegawai->kode_tunjangan_id)->first();
        $pegawai=pegawaiModel::where('id',$tunjangan_pegawai->pegawai_id)->first();
        $kategori_lembur=kategori_lemburModel::where('jabatan_id',$pegawai->jabatan_id)->where('golongan_id',$pegawai->golongan_id)->first();
        $lembur_pegawai=lembur_pegawaiModel::where('pegawai_id',$pegawai->id)->first();
        $jabatan=jabatanModel::where('id',$pegawai->jabatan_id)->first();
        $golongan=golonganModel::where('id',$pegawai->golongan_id)->first();
       

       $gaji = new penggajianModel ;

       if (isset($WPenggajian)) {
           $error=true ;
           $tunjangan=tunjangan_pegawaiModel::paginate(10);
           return view('penggajian.create',compact('tunjangan','error'));
       }
       elseif (!isset($lembur_pegawai)) {
            $nol = 0;
            $gaji->jumlah_jam_lembur= $nol;
            $gaji->jumlah_uang_lembur = $nol;
            $gaji->gaji_pokok=$jabatan->besaran_uang+$golongan->besaran_uang;
            $gaji->total_gaji=($tunjangan->jumlah_anak*$tunjangan->besaran_uang)+($jabatan->besaran_uang+$golongan->besaran_uang);
            $gaji->tanggal_pengambilan = date('d-m-y');
            $gaji->status_pengambilan = Input::get('status_pengambilan');
            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
            $gaji->petugas_penerimaan = Auth::user()->name;
            $gaji->save();
        }
        elseif(!isset($lembur_pegawai) || !isset($kategori_lembur))
        {
            $nol = 0;
            $gaji->jumlah_jam_lembur= $nol;
            $gaji->jumlah_uang_lembur = $nol;
            $gaji->gaji_pokok=$jabatan->besaran_uang+$golongan->besaran_uang;
            $gaji->total_gaji = ($tunjangan->jumlah_anak*$tunjangan->besaran_uang)+($jabatan->besaran_uang+$golongan->besaran_uang);
            $gaji->tanggal_pengambilan = date('d-m-y');
            $gaji->status_pengambilan = Input::get('status_pengambilan');
            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
            $gaji->petugas_penerimaan = Auth::user()->name;
            $gaji->save();
        }
        else
        {
            $gaji->jumlah_jam_lembur=$lembur_pegawai->jumlah_jam;
            $gaji->jumlah_uang_lembur =($lembur_pegawai->jumlah_jam)*($kategori_lembur->besaran_uang);
            $gaji->gaji_pokok=$jabatan->besaran_uang+$golongan->besaran_uang;
            $gaji->total_gaji = ($lembur_pegawai->jumlah_jam*$kategori_lembur->besaran_uang)+($tunjangan->jumlah_anak*$tunjangan->besaran_uang)+($jabatan->besaran_uang+$golongan->besaran_uang);
            $gaji->tanggal_pengambilan = date('d-m-y');
            $gaji->status_pengambilan = Input::get('status_pengambilan');
            $gaji->tunjangan_pegawai_id = Input::get('tunjangan_pegawai_id');
            $gaji->petugas_penerimaan = Auth::user()->name;
            $gaji->save();
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
        penggajianModel::find($id)->delete();
        return redirect('penggajian');
    }
}
