@extends('layouts.admin')
@section('content')
<center><h1>Penggajian Karyawan</h1></center>
        <table class="table table-striped table-bordered table-hover">

                    <div class="table-responsive ">
                    <div class="table-responsive ">
                        <table class="table">

                 <a href="{{url('/penggajian/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>
                            <thead >
                                <tr class="success">
                                    <th>Nama Pegawai</th>
                                    <th>Tunjangan Pegawai</th>
                                    <th>NIP Pegawai</th>
                                    <th colspan="3"><center>Aksi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($penggajian as $data)
                                <tr>
                                    <td>{{$users->name}}</td>
        <td><center><?php echo 'Rp.' . number_format($tunjangan->besaran_uang,2,',','.') ?></center></td>
                                    <td>{{$pegawai->nip}}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<!-- @extends('layouts/admin')
@section('content')
<center><h1>Penggajian Karyawan</h1></center>
        <table class="table table-striped table-bordered table-hover">

            <a href="{{url('/penggajian/create')}}"class="btn btn-primary form-control">Tambah Data</a><br><br>

    <thead>
        <tr class="success">
        <th><center>No</center></th>
        <th><center>Jumlah Uang Tunjangan</center></th>
        <th><center>Nama Karyawan</center></th>
        <th><center>Jumlah Jam Lembur</center></th>
        <th><center>Jumlah Uang Lembur</center></th>
        <th><center>Gaji Pokok</center></th>
        <th><center>Total Gaji</center></th>
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
            <td><center>{{$penggajians->tunjangan_pegawaiModel->besaran_uang}}</center></td>
            <td><center>{{$penggajians->jumlah_jam_lembur}}</center></td>
            <td><center>{{$penggajians->jumlah_uang_lembur}}</center></td>
            <td><center>{{$penggajians->gaji_pokok}}</center></td>
            <td><center>{{$penggajians->total_gaji}}</center></td>
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
 -->