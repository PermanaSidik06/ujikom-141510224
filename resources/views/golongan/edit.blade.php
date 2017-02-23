@extends('layouts.admin')
@section('content')
<center><h1>Edit Golongan</h1></center>
        <table class="table table-striped table-bordered table-hover">

                     {!! Form::model($golongan,['method'=>'PATCH','route'=>['golongan.update',$golongan->id]]) !!}
                    <div class="col-md-6">
                    <label>Kode Golongan</label>
                        <input type="text" name="kode_golongan" class="form-control" value="{{$golongan->kode_golongan}}">
                        <span>
                            {{$errors->first('kode_golongan')}}
                        </span>
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('Nama golongan', 'Nama golongan') !!}
                        <input type="text" name="nama_golongan" class="form-control" value="{{$golongan->nama_golongan}}">
                        <span>
                            {{$errors->first('nama_golongan')}}
                        </span>
                    </div>
                    <div class="col-md-12">
                        {!! Form::label('besaran uang', 'besaran uang') !!}
                        <input type="text" name="besaran_uang" class="form-control" value="{{$golongan->besaran_uang}}">
                        <span>
                            {{$errors->first('besaran_uang')}}
                        </span>
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
