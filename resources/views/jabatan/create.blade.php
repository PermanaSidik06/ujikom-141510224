@extends('layouts.admin')
@section('content')

<center><h1>Tambah Jabatan</h1></center>
    <table class="table table-striped table-bordered table-hover">
        <table class="table table-hover table-striped ">
            <tr class="danger">

                     {!! Form::open(['url' => 'jabatan']) !!}
                    <div class="col-md-6">
                        {!! Form::label('kode jabatan', 'kode jabatan') !!}
                        {!! Form::text('kode_jabatan',null,['class'=>'form-control']) !!}
                         @if ($errors->has('kode_jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_jabatan') }}</strong>
                                    </span>
                                @endif


                    </div>
                    <div class="col-md-6 ">
                        {!! Form::label('Nama jabatan', 'Nama jabatan') !!}
                        {!! Form::text('nama_jabatan',null,['class'=>'form-control']) !!}
                         @if ($errors->has('nama_jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_jabatan') }}</strong>
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
