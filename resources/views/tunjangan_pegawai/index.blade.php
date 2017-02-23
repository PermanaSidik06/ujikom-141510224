@extends('layouts/admin')
@section('content')
<center><h1>Data Tunjangan Karyawan</h1></center>
        <table class="table table-striped table-bordered table-hover">

<a href="{{url('/tunjangan_pegawai/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>

	<thead>
		<tr class="bg-info">
		<th><center>No</center></th>
		<th><center>Kode Tunjangan</center></th>
		<th><center>Nama pegawai</center></th>
        <th><center>Jabatan</center></th>
        <th><center>Golongan</center></th>
        <th><center>Besaran Uang</center></th>
        <th colspan="3"><center>Action</center></th>
			
		</tr>
	</thead>
	<tbody>
		@php
		$no=1;
		@endphp
		@foreach($tunjangan_pegawai as $tunjangan_pegawais)
		<tr>
			<td><center>{{$no++}}</center></td>
			<td><center>{{$tunjangan_pegawais->tunjanganModel->kode_tunjangan}}</center></td>
			<td><center>{{$tunjangan_pegawais->pegawaiModel->User->name}}</center></td>
            <td><center>{{$tunjangan_pegawais->tunjanganModel->jabatanModel->nama_jabatan}}</center></td>
            <td><center>{{$tunjangan_pegawais->tunjanganModel->golonganModel->nama_golongan}}</center></td>
            <td><center><?php echo 'Rp.' . number_format($tunjangan_pegawais->tunjanganModel->besaran_uang,2,',','.') ?></center></td>
		<td><center><a href="{{route('tunjangan_pegawai.edit',$tunjangan_pegawais->id)}}" class="btn btn-warning">Update</center></a></td>	
		</td>
		<td><center>
		{!!Form::open(['method'=>'DELETE','route'=>['tunjangan_pegawai.destroy',$tunjangan_pegawais->id]])!!}
		
		<input type="submit" class="btn btn-danger" onclick="return confirm('anda yakin akan menghapus data?');"value="Delete"> 
		{!!Form::close()!!}
		</center></td>
		</tr>
		
		@endforeach

	</tbody>
</table>




@endsection