@extends('layouts.admin')

@section('content')
<center>
                    <font><h1>Selamat datang {{auth::user()->name }}</h1></font>
                    <font><h1>Login Sebagai : {{auth::user()->permision }}</h1></font>
                    <font><h1>Alamat Email Anda : {{auth::user()->email }}</h1></font>
                
</center>
@endsection