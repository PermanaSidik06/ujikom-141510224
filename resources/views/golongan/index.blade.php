@extends('layouts/admin')
@section('content')

<center><h1>Data Golongan</h1></center>
		<table class="table table-striped table-bordered table-hover">

			<a href="{{url('/golongan/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
			{{$golongan->links()}}
			
	<thead>
		<tr class="bg-info">
		<th>No</th>
		<th><center>kode golongan</center></th>
		<th><center>nama golongan</center></th>
		<th><center>besaran uang</center></th>
		
		<th colspan="3">Action</th>
			
		</tr>
	</thead>
	<tbody>
		@php
		$no=1;
		@endphp
		@foreach($golongan as $golongans)
		<tr>
			<td>{{$no++}}</td>
			<td>{{$golongans->kode_golongan}}</td>
			<td>{{$golongans->nama_golongan}}</td>
			<td><center><?php echo 'Rp.' . number_format($golongans->besaran_uang,2,',','.') ?></center></td>
			
		<td><a href="{{route('golongan.edit',$golongans->id)}}" class="btn btn-warning">Update</a></td>	
		</td>
		<th>
                                    {!!Form::open(['method'=>'DELETE','route'=>['golongan.destroy',$golongans->id]])!!}
                                    {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                                    {!!Form::close()!!}
                                </th>
		</tr>
		
		@endforeach

	</tbody>
</table>




@endsection