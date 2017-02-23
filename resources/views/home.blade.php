@extends('layouts.admin')

@section('content')
<center>
                <h3>MY APPLICATION</h3>
                    <h5>SELAMAT DATANG {{auth::user()->name }}</h5>
                </div>
            </div>
        </div>
</center>
@endsection