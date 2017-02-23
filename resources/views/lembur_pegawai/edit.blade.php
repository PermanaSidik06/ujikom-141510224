@extends('layouts.admin')
@section('content')
<center><h1>Edit Lembur Pegawai</h1></center>
        <table class="table table-striped table-bordered table-hover">
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
