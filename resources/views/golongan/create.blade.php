@extends('layouts.admin')
@section('content')

<center><h1>Tambah Golongan</h1></center>
        <table class="table table-striped table-bordered table-hover">

                     {!! Form::open(['url' => 'golongan']) !!}
                    <div class="col-md-6">
                        {!! Form::label('kode golongan', 'kode golongan') !!}
                        {!! Form::text('kode_golongan',null,['class'=>'form-control']) !!}

                        @if ($errors->has('kode_golongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_golongan') }}</strong>
                                    </span>
                                @endif

                    </div>
                    <div class="col-md-6">
                        {!! Form::label('Nama golongan', 'Nama golongan') !!}
                        {!! Form::text('nama_golongan',null,['class'=>'form-control']) !!}
                        @if ($errors->has('nama_golongan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_golongan') }}</strong>
                                    </span>
                                @endif
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
