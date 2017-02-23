@extends('layouts.admin')

@section('content')
<center><h1>Tambah Tunjangan Karyawan</h1></center>
        <table class="table table-striped table-bordered table-hover">
                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/tunjangan_pegawai') }}">
                        {{ csrf_field() }}

                         <div class="col-md-12">
                                <label>Kode Tunjangan</label>
                                <select name="kode_tunjangan" class="form-control">
                                @foreach($tunjangan as $datatunjangan)
                                    <option value="{{$datatunjangan->id}}">
                                        {{$datatunjangan->kode_tunjangan}}
                                    </option>
                                @endforeach
                                </select>
                                <span class="help-block">
                                        <strong>{{ $errors->first('kode_tunjangan') }}</strong>
                                    </span>
                            </div>

                        <div class="col-md-12">
                                <label>Nama Pegawai</label>
                                <select name="pegawai_id" class="form-control">
                                <option>Pilih Nama Pegawai</option>
                                @foreach($pegawai as $datapegawai)
                                    <option value="{{$datapegawai->id}}">
                                        {{$datapegawai->User->name}}
                                    </option>
                                @endforeach
                                </select>
                                <span class="help-block">
                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
                                    </span>
                            </div>
                        
                           <div class="col-md-12">
                            <button type="submit" class="btn btn-primary form-control">Tambah</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection
