@extends('layouts.admin')
@section('content')
<center><h1>Tambah Tunjangan</h1></center>
        <table class="table table-striped table-bordered table-hover">

                     {!! Form::open(['url' => 'tunjangan']) !!}

                     <div class="col-md-12">

                                <label>Kode Tunjangan</label>
                                <input type="text" class="form-control" name="kode_tunjangan" required autofocus>

                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_tunjangan') }}</strong>
                                    </span>
                    </div>

                    <div class="col-md-6">
                                <label for="Jabatan">Jabatan</label>
                                    <select class="col-md-6 form-control" name="jabatan_id">
                                        @foreach($jabatan as $datajabatan)
                                            <option  value="{{$datajabatan->id}}" >{{$datajabatan->nama_jabatan}}</option>
                                        @endforeach
                                    </select>
                                    <span>{{$errors->first('jabatan_id')}}</span>
                    </div>

                    <div class="col-md-6">
                                <label for="Golongan">Golongan</label>
                                    <select class="col-md-6 form-control" name="golongan_id">
                                        @foreach($golongan as $datagolongan)
                                            <option  value="{{$datagolongan->id}}" >{{$datagolongan->nama_golongan}}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">
                                        {{$errors->first('golongan_id')}}
                                    </span>
                    </div>

                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-12 control-label">Status</label>

                            <div class="col-md-6">
                                <select name="status" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Duda">Duda</option>
                                    <option value="Janda">Janda</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <div class="col-md-12">
                        {!! Form::label('jumlah anak', 'jumlah anak') !!}
                        {!! Form::text('jumlah_anak',null,['class'=>'form-control','required']) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Form::label('besaran uang', 'besaran uang') !!}
                        {!! Form::text('besaran_uang',null,['class'=>'form-control','required']) !!}
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
