<?php

namespace App\Http\Controllers;
use App\tunjangan_pegawaiModel;
use App\pegawaiModel;
use App\tunjanganModel;
use App\jabatanModel;
use App\golonganModel;
use Request;

class tunjangan_pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjangan_pegawai=tunjangan_pegawaiModel::all();
        $pegawai=pegawaiModel::all();
        $tunjangan=tunjanganModel::all();
        $jabatan=jabatanModel::all();
        $golongan=golonganModel::all();
        return view('tunjangan_pegawai.index',compact('tunjangan_pegawai', 'pegawai', 'tunjangan', 'jabatan', 'golongan'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tunjangan_pegawai=tunjangan_pegawaiModel::all();
        $tunjangan=tunjanganModel::all();
        $pegawai=pegawaiModel::all();
        return view('tunjangan_pegawai.create',compact('tunjangan_pegawai', 'pegawai', 'tunjangan'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $tunjangan_pegawai=Request::all();
       $jabatan=jabatanModel::all();
       $golongan=golonganModel::all();
       tunjangan_pegawaiModel::create($tunjangan_pegawai);
        return redirect('tunjangan_pegawai');
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
        $tunjangan_pegawai=tunjangan_pegawaiModel::all();
        return view('tunjangan_pegawai.edit',compact('tunjangan_pegawai'));
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
        $Update=Request::all();
        $tunjangan_pegawai=tunjangan_pegawaiModel::find($id);
        $tunjangan_pegawai->update($Update);
        return redirect('tunjangan_pegawai');
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
        tunjangan_pegawaiModel::find($id)->delete();
        return redirect('tunjangan_pegawai');
    }
}
