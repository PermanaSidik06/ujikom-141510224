@extends('layouts/app')
@section('content')
<div class="col-md-3 ">
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


                <div class="panel-body" align="center">
                    
                    <a class="btn btn-primary form-control" href="{{url('jabatan')}}">Jabatan</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('golongan')}}">Golongan</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('pegawai')}}">Pegawai</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('kategori_lembur')}}">Kategori Lembur</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('lembur_pegawai')}}">Lembur Pegawai</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('tunjangan')}}">Tunjangan</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('tunjangan_pegawai')}}">Tunjangan Karyawan</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('penggajian')}}">Penggajian Karyawan</a><hr>  
  

                </div>
            </center>
        </div>
    </div>
</div>

<center><h1>Data Penggajian Karyawan</h1></center>
<hr>
<div class="col-md-9 ">
<table class="table table-striped table-bordered table-hover">
<!-- <table class="table table-default"> -->
<tr class="danger">

            <a href="{{url('/penggajian/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>

    <thead>
        <tr class="bg-info">
        <th><center>No</center></th>
        <th><center>Kode Tunjangan Karyawan</center></th>
        <th><center>Nip</center></th>
        <th><center>Nama Karyawan</center></th>
        <th><center>Jumlah Jam Lembur</center></th>
        <th><center>Jumlah Uang Lembur</center></th>
        <th><center>Gaji Pokok</center></th>
        <th><center>Total Gaji</center></th>
        <th><center>Tanggal Pengambilan</center></th>
        <th><center>Status Pengambilan</center></th>
        <th><center>Petugas Penerima</center></th>
        <th><center>Besaran Uang</center></th>
        <th colspan="3"><center>Action</center></th>
            
        </tr>
    </thead>
    <tbody>
        @php
        $no=1;
        @endphp
        @foreach($penggajian as $penggajians)
        <tr>
            <td><center>{{$no++}}</center></td>
            <td><center>{{$penggajians->tunjangan_pegawaiModel->kode_tunjangan}}</center></td>
            <td><center>{{$penggajians->jumlah_jam_lembur}}</center></td>
            <td><center>{{$penggajians->jumlah_uang_lembur}}</center></td>
            <td><center>{{$penggajians->gaji_pokok}}</center></td>
            <td><center>{{$penggajians->total_gaji}}</center></td>
            <td><center>{{$penggajians->tanggal_pengambilan}}</center></td>
            <td><center>{{$penggajians->status_pengambilan}}</center></td>
            <td><center>{{$penggajians->petugas_penerima}}</center></td>
            <td><center><?php echo 'Rp.' . number_format($penggajians->besaran_uang,2,',','.') ?></center></td>
        <td><center><a href="{{route('penggajian.edit',$penggajians->id)}}" class="btn btn-warning">Update</center></a></td>  
        </td>
        <td><center>
        {!!Form::open(['method'=>'DELETE','route'=>['penggajian.destroy',$penggajians->id]])!!}
        
        <input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
        {!!Form::close()!!}
        </center></td>
        </tr>
        
        @endforeach

    </tbody>
</table>
@endsection
