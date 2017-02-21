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
                    <a class="btn btn-primary form-control" href="{{url('lembur_pegawai')}}">Lembur Pegawai</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('tunjangan')}}">Tunjangan</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('tunjanganpegawai')}}">Tunjangan Karyawan</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('penggajian')}}">Penggajian Karyawan</a><hr>  

                </div>
            </div>
        </div>

         <div class="container">
        <div class="row">
            <div class="col-md-8 ">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3><center>Udpate Lembur Pegawai</center></h3> </div>
                    <div class="panel-body">
                        {!! Form::model($lembur_pegawai,['method'=>'PATCH','route'=>['lembur_pegawai.update',$lembur_pegawai->id]])!!}
                    
                    <div class="col-md-12">
                        {!! Form::label('Kode Lembur', 'Kode Lembur') !!}
                        {!! Form::text('kode_lembur_id',null,['class'=>'form-control','required']) !!}
                    </div>

                      <div class="col-md-6">
                                <label>NIP Sebelumnya</label>
                                @foreach($pegawai as $datap)
                                    @if($datap->id == $lembur_pegawai->pegawai_id)
                                    <input type="text" class ="form-control" value="{{$datap->nip}}" readonly>
                                    @endif
                                @endforeach
                            </div>

                            <div class="col-md-6">
                                <label>Pegawai Sebelumnya</label>
                                @foreach($pegawai as $datapp)
                                    @if($datapp->id == $lembur_pegawai->pegawai_id)
                                    <input type="text" class ="form-control" value="{{$datapp->User->name}}" readonly>
                                    @endif
                                @endforeach
                            </div>

                    <div class="col-md-12">
                        {!! Form::label('Nip Dan Nama Pegawai ', 'Nip Dan Nama Pegawai ') !!}
                                    <select class="form-control" name="pegawai_id">
                                    <option>Pilih Nip dan Pegawai Baru</option>
                                        @foreach($pegawai as $pegawais)
                                            <option  value="{{$pegawais->id}}" >
                                            {{$pegawais->nip}} {{$pegawais->User->name}}
                                                </option>
                                        @endforeach
                                    </select>

                    </div>

                    <div class="col-md-12">
                        {!! Form::label('jumlah jam', 'jumlah jam') !!}
                        {!! Form::text('jumlah_jam',null,['class'=>'form-control','required']) !!}
                    </div>
                    &nbsp;
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
