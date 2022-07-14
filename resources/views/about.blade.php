@extends('layouts.main')

@section('container')
    <h1>Tentang Saya</h1>
    <h3> {{$nama}} </h3>
    <h3>{{$tempat}}</h3>
    <h3> {{$email}}</h3>
    <img src="img/{{$image}}" alt= {{$nama}} width="200" class="img-thumbnail rounded-circle">
@endsection
