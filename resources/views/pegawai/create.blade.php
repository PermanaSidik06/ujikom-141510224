@extends('layouts.admin')

@section('content')
<center><h1></h1></center>
        <table class="table table-striped table-bordered table-hover">

                <div class="panel panel-default">
                    <div class="panel-heading"><h3><center>Register</center></h3> </div>
                    <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="{{ route('pegawai.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                            <div class="col-md-6">
                                <label for="name" >Nama Pegawai</label>
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="email" >E-MAIL</label>
                                <input id="email" type="email" class="form-control" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                             <div class="col-md-12">
                                <label >Type User</label>
                                   <select name="permision" class="col-md-12 form-control" required>
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

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"required autofocus>
                                 @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                    </div>
                <div>
            </div>
        </div>

        <center><h1></h1></center>
        <table class="table table-striped table-bordered table-hover">

                    <div class="panel panel-default">
                        <div class="panel-heading"><h3><center>Tambah Data Pegawai</center></h3> </div>
                        <div class="panel-body">

                            <div class="col-md-12">
                                <label for="nip" >NIP Pegawai</label>
                                <input id="nip" type="text" class="form-control" name="nip" required autofocus>
                                 @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="Jabatan">Jabatan</label>
                                    <select class="col-md-6 form-control" name="jabatan_id" required>
                                        @foreach($jabatan as $datajabatan)
                                            <option  value="{{$datajabatan->id}}" >{{$datajabatan->nama_jabatan}}</option>
                                        @endforeach
                                    </select>
                                     @if ($errors->has('jabatan_id'))
                                    <span>{{$errors->first('jabatan_id')}}</span>
                                    @endif
                            </div>

                            <div class="col-md-6">
                                <label for="Jabatan">Golongan</label>
                                    <select class="col-md-6 form-control" name="golongan_id" required>
                                        @foreach($golongan as $datagolongan)
                                            <option  value="{{$datagolongan->id}}" >{{$datagolongan->nama_golongan}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('golongan_id'))
                                    <span class="help-block">
                                        {{$errors->first('golongan_id')}}
                                    </span>
                                    @endif
                            </div>

                            <div class="col-md-12">
                                <label >Foto Pegawai</label>
                                    <input type="file" class="form-control" name="foto" required autofocus>

                                    @if ($errors->has('foto'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('foto') }}</strong>
                                        </span>
                                    @endif
                            </div>

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
