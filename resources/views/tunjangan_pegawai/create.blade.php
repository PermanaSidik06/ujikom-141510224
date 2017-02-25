@extends('layouts.app')
@section('content')
<style type="text/css">
    th,td{
        text-align: center;
    }
</style>
<div class="col-md-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <center>
                <h3>Payroll Application</h3>
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


                <div class="panel-body" align="center">
                    
                    <a class="btn btn-primary form-control" href="{{url('jabatan')}}">Jabatan</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('golongan')}}">Golongan</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('pegawai')}}">Pegawai</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('kategori_lembur')}}">Kategori Lembur</a><hr> 

                </div>
            </center>
        </div>
    </div>
</div>


<center>
        <div class="col-md-8">
            <div class="panel panel-default">
                    <div class="panel-heading"><h3><center>Tambah Tunjangan Karyawan</center></h3> </div>
                    <div class="panel-body">
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/tunjangan_pegawai') }}">
                        {{ csrf_field() }}

                         <div class="col-md-12">
                                <label>Kode Tunjangan</label>
                                <select name="kode_tunjangan_id" class="form-control">
                                @foreach($tunjangan as $datatunjangan)
                                    <option value="{{$datatunjangan->id}}">
                                        {{$datatunjangan->kode_tunjangan}}
                                    </option>
                                @endforeach
                                </select>
                                <span class="help-block">
                                        <strong>{{ $errors->first('kode_tunjangan') }}</strong>
                                    </span>
                            </div>

                        <div class="col-md-12">
                                <label>Nama Pegawai</label>
                                <select name="pegawai_id" class="form-control">
                                <option>Pilih Nama Pegawai</option>
                                @foreach($pegawai as $datapegawai)
                                    <option value="{{$datapegawai->id}}">
                                        {{$datapegawai->User->name}}
                                    </option>
                                @endforeach
                                </select>
                                <span class="help-block">
                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
                                    </span>
                            </div>
                        
                           <div class="col-md-12">
                            <button type="submit" class="btn btn-primary form-control">Tambah</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
            <style type="text/css">
    th,td{
        text-align: center;
    }
</style>
<div class="col-md-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <center>
                <h3>Payroll Application</h3>
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


                <div class="panel-body" align="center">
                    <a class="btn btn-primary form-control" href="{{url('lembur_pegawai')}}">Lembur Pegawai</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('tunjangan')}}">Tunjangan</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('tunjangan_pegawai')}}">TunjanganKaryawan</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('penggajian')}}">PenggajianKaryawan</a><hr>  

                </div>
            </center>
        </div>
    </div>
</div>

@endsection
