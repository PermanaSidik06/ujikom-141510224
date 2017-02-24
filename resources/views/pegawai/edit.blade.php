@extends('layouts.admin')

@section('content')

        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><center>Update</center></h3> </div>
                    <div class="panel-body">
                     {!! Form::model($pegawai,['method'=>'PATCH','route'=>['pegawai.update' ,$pegawai->id]]) !!}
                        
                        <div class="col-md-12">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-6 control-label">Name</label>

                            <div class="col-md-12">
                                <input id="name" type="name" class="form-control" name="name" value="{{$pegawai->user->name}}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-6 control-label">E-Mail Address</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control"  name="email" value="{{$pegawai->user->email}}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            <div class="col-md-6">
                                <label >Type User Lama</label>
                                   <input type="text" class="form-control" value="{{$user->permision}}" readonly>
                            </div>
                            
                            <div class="col-md-6">
                                <label >Type User</label>
                                   <select name="permision" class="col-md-6 form-control" required>
                                       <option value="">Pilih Type User</option>
                                       <option value="Admin">Admin</option>
                                       <option value="HRD">HRD</option>
                                       <option value="Bagian Administrasi">Bagian Administrasi</option>
                                       <option value="Pegawai">Pegawai</option>
                                   </select>
                                    @if ($errors->has('permision'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('permision') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="col-md-6">
                                <label >Password</label>
                                    <input id="password" type="password" class="form-control" name="password" required autofocus>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
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
                            <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="control-label">NIP</label>

                           
                                <input id="nip" type="text" class="form-control" name="nip" value="{{ $pegawai->nip }}"  autofocus>

                                @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                            </div>
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
                                    @if ($errors->has('nama_golongan'))
                                    <span class="help-block">
                                        {{$errors->first('nama_golongan')}}
                                    </span>
                                    @endif
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
