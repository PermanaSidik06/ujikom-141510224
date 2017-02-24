@extends('layouts.admin')
@section('content')
<center><h1>Penggajian Karyawan</h1></center>
        <table class="table table-striped table-bordered table-hover">
				<form class="form-horizontal" action="{{route('penggajian.store')}}" method="POST">
                    <div class="form-group{{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
                            <label for="pegawai_id" class="col-md-4 control-label"> Pegawai :</label>
                                <div class="col-md-6">
                                    <select type="text" name="pegawai_id" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach($pegawai as $data)
                                        <option value="{!! $data->id !!}">{!! $data->nip !!}_{!! $data->User->name !!}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('pegawai_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pegawai_id') }}</strong>
                                    </span>
                                @endif
                                @if (isset($_GET['errors_match']))
                            <span class="help-block">
                                    <strong>Pegawai sudah melakukan penggajian bulan ini</strong>
                            </span>
                            @endif
                            @if (isset($missing_count))
                            <div style="width: 100%;color: red;text-align: center;">
                                Tunjangan Pegawai InI Tidak Ada <a href="{{url('tunjangan_pegawai/create')}}">disini</a>
                            </div>
                            @endif
                                </div>
                    </div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4" >
							<button type="submit" class="btn btn-primary">
								Simpan
							</button>
						</div>
					</div>
				</form>
		</div>
	</div>
</div>
@endsection