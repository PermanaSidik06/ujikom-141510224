
@extends('layouts.app')
@section('content')
<div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                <center>
                <h3>MY APPLICATION</h3>
                    <h5>HALAMAN WEB</h5>
                    <div class="collapse navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-center">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a class="" href="{{ url('/login') }}">Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                </div>

                <div class="panel-body" align="center">
                    <a class="btn btn-primary form-control" href="{{url('jabatan')}}">Jabatan</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('golongan')}}">Golongan</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('pegawai')}}">Pegawai</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('kategori_lembur')}}">Kategori Lembur</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('lemburpegawai')}}">Lembur Pegawai</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('tunjangan')}}">Tunjangan</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('tunjangan_pegawai')}}">Tunjangan Karyawan</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('penggajian')}}">Penggajian Karyawan</a><hr>  

                </div>
            </div>
        </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 ">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><center>Tambah Kategori Lembur</center></h3> </div>
                    <div class="panel-body">

                     {!! Form::open(['url' => 'kategori_lembur']) !!}
                    <div class="col-md-12">
                        {!! Form::label('kode lembur', 'kode lembur') !!}
                        {!! Form::text('kode_lembur',null,['class'=>'form-control']) !!}
                          @if ($errors->has('kode_lembur'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_lembur') }}</strong>
                                    </span>
                            @endif
                    </div>

                     <div class="col-md-6 col-sm-6 col-xs-12">
                     {!!Form::label('jabatan','jabatan')!!}

                        <select class="form-control" col-md-7 col-sx-12 name="jabatan_id">
                            @foreach ($jabatan as $jabatans)
                            <option value="{{$jabatans->id}}">{{ $jabatans->nama_jabatan}}</option>
                            @endforeach
                        </select>
                    </div>
                    

                      <div class="col-md-6 col-sm-6 col-xs-12">
                      {!!Form::label('golongan','golongan')!!}
                        <select class="form-control" col-md-7 col-sx-12 name="golongan_id">
                            @foreach ($golongan as $jabatans)
                            <option value="{{$jabatans->id}}">{{ $jabatans->nama_golongan}}</option>
                            @endforeach
                        </select>
                    </div>                    
                    <div class="col-md-12">
                        {!! Form::label('besaran uang', 'besaran uang') !!}
                        {!! Form::text('besaran_uang',null,['class'=>'form-control']) !!}
                    @if ($errors->has('besaran_uang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
                                    </span>
                    @endif
                    </div>
                    &nbsp
                    <div class="col-md-12">
                        {!! Form::submit('SAVE', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
