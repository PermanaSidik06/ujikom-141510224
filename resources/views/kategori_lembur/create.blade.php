
@extends('layouts.admin')
@section('content')
<center><h1>Tambah Kategori Lembur</h1></center>
        <table class="table table-striped table-bordered table-hover">

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
