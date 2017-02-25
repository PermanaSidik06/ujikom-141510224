@extends('layouts.app')
@section('content')

<style type="text/css">
    th,td{
        text-align: center;
    }
</style>
<div class="col-md-2 ">
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

        <div class="col-md-8">
<center><h1>Data Karyawan</center></h1>
<a href="{{url('/pegawai/create')}}"class="btn btn-primary form-control">Tambah Data</a>
 <table class="table table-striped table-bordered table-hover">
&nbsp;
    <thead>
     
     <tr class="bg-info">
		<th>No</th>
		<th><center>Nip</center></th>
		<th><center>Nama</center></th>
		<th><center>Email</center></th>
		<th><center>permision</center></th>
		<th colspan="2"><center>Jabatan dan golongan</center></th>
		<th><center>Foto</center></th>
		<th colspan="3"><center>Action</center></th>
			
		</tr>
	</thead>
	<tbody>
		@php
		$no=1;
		@endphp

		@foreach($pegawai as $pegawais)
	<tr>
			<td><center>{{$no++}}</center></td>
			<td><center>{{$pegawais->nip}}</center></td>
			<td><center>{{$pegawais->User->name}}</center></td>
			<td><center>{{$pegawais->User->email}}</center></td>
			<td><center>{{$pegawais->User->permision}}</center></td>
			<td><center>{{$pegawais->jabatanModel->nama_jabatan}}</center></td>
			<td><center>{{$pegawais->golonganModel->nama_golongan}}</center></td>
			
	   <th>
            <img  width="50px" height="50px" class="img-circle" src="assets/image/{{$pegawais->foto}}">
       </th>

		<td>
            <a href="{{route('pegawai.edit',$pegawais->id)}}"class="btn btn-warning">edit</a>
        </td>

		<td>
		    {!!Form::open(['method'=>'DELETE','route'=>['pegawai.destroy',$pegawais->id]])!!}
		
		    <input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		    {!!Form::close()!!}
		</td>
	</tr>
		</div>
		@endforeach

	</tbody>
</table>
</table>
</div>
<center>{{$searchuser->links()}}</center>
<style type="text/css">
    th,td{
        text-align: center;
    }
</style>
<div class="col-md-2 ">
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
                    <a class="btn btn-primary form-control" href="{{url('tunjangan_pegawai')}}">Tunjangan Karyawan</a><hr>
                    <a class="btn btn-primary form-control" href="{{url('penggajian')}}">Penggajian Karyawan</a><hr>  

                </div>
            </center>
        </div>
    </div>
</div>

@endsection