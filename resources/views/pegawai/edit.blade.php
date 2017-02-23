@extends('layouts.admin')

@section('content')

        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><center>Update</center></h3> </div>
                    <div class="panel-body">
                     {!! Form::model($pegawai,['method'=>'PATCH','route'=>['pegawai.update' ,$pegawai->id]]) !!}
                            <div class="col-md-6">
                                <label for="name" >Nama Pegawai</label>
                                <input id="name" value="{{$user->name}}" type="text" class="form-control" name="name" required autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label for="email" >E-MAIL</label>
                                <input id="email" value="{{$user->email}}" type="email" class="form-control" name="email" required autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label >Type User Lama</label>
                                   <input type="text" class="form-control" value="{{$user->permision}}" readonly>
                            </div>

                             <div class="col-md-6">
                                <label >Type User Baru</label>
                                   <select name="permision" class="col-md-12 form-control" required>
                                       <option>Admin</option>
                                       <option>HRD</option>
                                       <option>Bagian Administrasi</option>
                                       <option>Pegawai</option>
                                   </select>
                            </div>

                            <div class="col-md-6">
                                <label >Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required autofocus>

                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                            </div>

                            <div class="col-md-6">
                                <label >Confirm Password</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autofocus>
                            </div>
                        </div>
                    </div>
                <div>
            </div>
        </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3><center>Update Data Pegawai</center></h3> </div>
                        <div class="panel-body">

                            <div class="col-md-12">
                                <label for="nip" >NIP Pegawai</label>
                                <input id="nip" value="{{$pegawai->nip}}" type="text" class="form-control" name="nip" required autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                            </div>

                            <div class="col-md-6">
                                <label>Jabatan Lama</label>
                                @foreach($jabatan as $datajabatan)
                                    @if($datajabatan->id == $pegawai->jabatan_id)
                                    <input type="text" class ="form-control" value="{{$datajabatan->nama_jabatan}}" readonly>
                                    @endif
                                @endforeach
                            </div>

                            <div class="col-md-6">
                                <label>Golongan Lama</label>
                                @foreach($golongan as $datagolongan)
                                    @if($datagolongan->id == $pegawai->golongan_id)
                                    <input type="text" class ="form-control" value="{{$datagolongan->nama_golongan}}" readonly>
                                    @endif
                                @endforeach
                            </div>

                            <div class="col-md-6">
                                <label for="Jabatan">Jabatan</label>
                                    <select class="col-md-6 form-control" name="nama_jabatan">
                                        @foreach($jabatan as $datajabatan)
                                            <option  value="{{$datajabatan->id}}" >{{$datajabatan->nama_jabatan}}</option>
                                        @endforeach
                                    </select>
                                    <span>{{$errors->first('nama_jabatan')}}</span>
                            </div>

                            <div class="col-md-6">
                                <label for="Jabatan">Golongan</label>
                                    <select class="col-md-6 form-control" name="nama_golongan">
                                        @foreach($golongan as $datagolongan)
                                            <option  value="{{$datagolongan->id}}" >{{$datagolongan->nama_golongan}}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">
                                        {{$errors->first('nama_golongan')}}
                                    </span>
                            </div>

                            <div class="col-md-12">
                                <label >Foto Pegawai</label>
                                      <input type="file" name="foto" value="{{ old('foto') }}" required ></input>

                                    @if ($errors->has('foto'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('foto') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="col-md-6"></div>

                            <div class="col-md-12" >
                                <button type="submit" class="btn btn-primary form-control">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>

@endsection
