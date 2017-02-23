@extends('layouts.admin')

@section('content')
<center><h1>Update Tunjangan Pegawai</h1></center>
        <table class="table table-striped table-bordered table-hover">
                     {!! Form::model($tunjangan_pegawai,['method'=>'PATCH','route'=>['tunjangan_pegawai.update',$tunjangan_pegawai->id]])!!}

                        <div class="col-md-6">
                                <label>Kode Tunjangan Sebelumnya</label>
                                @foreach($tunjangan as $datap)
                                    @if($datap->id == $tunjangan_pegawai->kode_tunjangan)
                                    <input type="text" class ="form-control" value="{{$datap->kode_tunjangan}}" readonly>
                                    @endif
                                @endforeach
                        </div>

                        <div class="col-md-6">
                                <label>Pegawai Sebelumnya</label>
                                @foreach($pegawai as $datapp)
                                    @if($datapp->id == $tunjangan_pegawai->pegawai_id)
                                    <input type="text" class ="form-control" value="{{$datapp->User->name}}" readonly>
                                    @endif
                                @endforeach
                        </div>
                        
                        <div class="col-md-6">
                                <label>Kode Tunjangan</label>
                                <select name="kode_tunjangan" class="form-control">
                                <option>Pilih Kode Baru</option>
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

                        <div class="col-md-6">
                                <label>Nama Pegawai</label>
                                <select name="pegawai_id" class="form-control">
                                <option>Pilih Pegawai Baru</option>
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
                            <button type="submit" class="btn btn-primary form-control">Update</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection