@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
<div class="col-md-4">
    @if(session()->has('sukses'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('sukses')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('loginError')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <h1 class="h3 mb-3 font-weight-normal text-center">Please Login</h1>
<form class="form-signin" action="/login" method="post">
    @csrf
    {{-- <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> --}}
    <input type="email" id="email" name="email" class="form-control  @error ('email') is-invalid @enderror" placeholder="ad@mail" required value="{{ old('email') }}" autofocus>
    <label for="email" class="sr-only">nama</label>
    @error('email')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
  </form>
  <small class="d-block text-center">belum daftar? <a href="/daftar">daftar sekarang</a></small>
</div>
</div>
<small class="d-block text-center text-muted">&copy; 2022</small>
  @endsection
