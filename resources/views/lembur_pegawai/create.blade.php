@extends('layouts.admin')
@section('content')
<center><h1>Tambah Lembur Pegawai</h1></center>
        <table class="table table-striped table-bordered table-hover">


                     {!! Form::open(['url' => 'lembur_pegawai']) !!}
                    <div class="form-group">
                        {!! Form::label('kode lembur ', 'kode lembur') !!}
                        {!! Form::text('kode_lembur_id',null,['class'=>'form-control','required']) !!}
                    </div>
                        
                    <div class="form-group">
                        {!! Form::label('Nip Dan Nama Pegawai ', 'Nip Dan Nama Pegawai ') !!}
                                    <select class="form-control" name="pegawai_id">
                                    <option>Pilih NIP dan Nama Pegawai</option>
                                        @foreach($pegawai as $pegawais)
                                            <option  value="{{$pegawais->id}}" >
                                            {{$pegawais->nip}} {{$pegawais->User->name}}
                                                </option>
                                        @endforeach
                                    </select>

                    </div>   
                                
                    <div class="form-group">
                        {!! Form::label('jumlah jam', 'jumlah jam') !!}
                        {!! Form::text('jumlah_jam',null,['class'=>'form-control','required']) !!}
                    </div>
                
                    <div class="form-group">
                        {!! Form::submit('SAVE', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
