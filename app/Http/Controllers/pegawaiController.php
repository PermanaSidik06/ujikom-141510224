<?php

namespace App\Http\Controllers;

use App\pegawaiModel;
use App\User;
use App\golonganModel;
use App\jabatanModel;
use Input;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Request;



class pegawaiController extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
         $pegawai=pegawaiModel::paginate(5);
         $searchuser=User::where('name',request('name'))->paginate(5);
        if(request()->has ('name'))
        {
         $searchuser=User::where('name',request('name'))->paginate(5);
 
        }
        else
        {
            $searchuser=User::paginate(5);
        }
        return view('pegawai.index',compact('pegawai','searchuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       $user=User::all();
            $jabatan=jabatanModel::all();
            $golongan=golonganModel::all();
            $pegawai=pegawaiModel::all();
        return view('pegawai.create',compact('pegawai','golongan','jabatan'));
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
         $roles=[
            'nip'=>'required|unique:pegawai',
            'jabatan_id'=>'required',
            'golongan_id'=>'required',
            'foto'=>'required',
            'name' => 'required|max:255',
            'permision' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
 $sms=[
            'nip.required'=>'jangan kosong',
            'nip.unique'=>'jangan sama',
            'jabatan_id.required'=>'jangan kosong',
            'golongan_id.required'=>'jangan kosong',
            'foto.required'=>'jangan kosong',
            'name.required'=>'jangan kosong',
            'name.max'=>'max 255',
            'permision.required'=>'jangan kosong',
            'email.required'=>'jangan kosong',
            'email.email'=>'harus berbentuk email',
            'email.max'=>'max 255',
            'email.unique'=>'Email Sudah Terdaftar, Masukkan Lagi',
            'password.required'=>'jangan kosong',
            'password.min'=>'min 6',
            'password.confirmed'=>'belum kompirmasi',
        ];
        $validasi=Validator::make(Input::all(),$roles,$sms);
        if($validasi->fails()){
            return redirect()->back()
                ->WithErrors($validasi)
                ->WithInput();
        }



           $akun=new User ;
         $akun->name=Input::get('name');
         $akun->email=Input::get('email');
         $akun->password=bcrypt(Input::get('password'));
         $akun->permision=Input::get('permision');
         $akun->save();

        $file = Input::file('foto');
        $destinationPath = public_path().'/assets/image/';
        $filename = $file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);

        if(Input::hasFile('foto')){
         $pegawai=new pegawaiModel ;
         $pegawai->nip=Input::get('nip');
         $pegawai->foto = $filename;
         //$pegawai->foto=Input::get('foto');
         $pegawai->jabatan_id=Input::get('jabatan_id');
         $pegawai->golongan_id=Input::get('golongan_id');
         $pegawai->user_id=$akun->id;
         $pegawai->save();
         
        }
        return redirect('pegawai');

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
        // dd($id);
        $jabatan=jabatanModel::all();
        $golongan=golonganModel::all();
        $pegawai=pegawaiModel::find($id);
        $user=User::find($id);
        // $user=User::where('id',$pegawai->user_id)->first();
        //dd($pegawai);
        return view('pegawai.edit',compact('pegawai','jabatan','golongan','user'));
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
        $pegawai=pegawaiModel::where('id',$id)->first();
        $user=User::where('id',$pegawai->user_id)->first();
        if($pegawai['nip'] != Request('nip') || $user['email'] != Request('email')){
            $roles=[
            'nip'=>'required|unique:pegawai',
            'jabatan_id'=>'required',
            'golongan_id'=>'required',
            'foto'=>'required',
            'name' => 'required|max:255',
            'permision' => 'required',
            'email' => 'required|email|max:255|unique:users',
        ];
        }
        else{
            $roles=[
            'nip'=>'required',
            'jabatan_id'=>'required',
            'golongan_id'=>'required',
            'foto'=>'required',
            'name' => 'required|max:255',
            'permision' => 'required',
            'email' => 'required|email|max:255',
        ];
        }
        $sms=[
            'nip.required'=>'jangan kosong',
            'nip.unique'=>'jangan sama',
            'jabatan_id.required'=>'jangan kosong',
            'golongan_id.required'=>'jangan kosong',
            'foto.required'=>'jangan kosong',
            'name.required'=>'jangan kosong',
            'name.max'=>'max 255',
            'permision.required'=>'jangan kosong',
            'email.required'=>'jangan kosong',
            'email.email'=>'harus berbentuk email',
            'email.max'=>'max 255',
            'email.unique'=>'sudah ada',
            
        ];
        $validasi=Validator::make(Input::all(),$roles,$sms);
        if($validasi->fails()){
            return redirect()->back('pegawai')
                ->WithErrors($validasi)
                ->WithInput();
        }
        
        $user=User::find($pegawai->user_id);
        $user->name = Request('name');
        $user->permision = Request('permision');
        $akun->password=bcrypt(Input::get('password'));
        $user->email = Request('email');
        $user->save();

         $file= Input::file('foto');
        $destination= '/assets/image/';
        $filename=$file->getClientOriginalName();
        $uploadsuccess=$file->move($destination,$filename);
        if($uploadsuccess){

        
            $pegawai =pegawaiModel::find($id);
            $pegawai->nip = Request('nip');
            $pegawai->user_id = $user->id;
            $pegawai->jabatan_id = Request('jabatan_id');
            $pegawai->golongan_id = Request('golongan_id');
            $pegawai->foto=$filename;
            $pegawai->update();

             return redirect('pegawai');
        }
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
         pegawaiModel::find($id)->delete();
        return redirect('pegawai');
    }
}
