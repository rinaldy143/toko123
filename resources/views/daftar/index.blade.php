@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
<div class="col-lg-5">
    <h1 class="h3 mb-3 font-weight-normal text-center">form pendaftaran akun</h1>
        <form class="form-pendaftaran" action="/daftar" method="post">
            @csrf
            <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top @error('name')is-invalid @enderror" id="name" placeholder="Nama" required value="{{old('name')}}" autofocus>
                <label for="name" class="sr-only">nama</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <input type="text" name="username" id="username" class="form-control @error('username')is-invalid @enderror" placeholder="username" required value="{{old('username')}}">
            <label for="username" class="sr-only">username</label>
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <input type="email" name="email" id="email" class="form-control @error('email')is-invalid @enderror" placeholder="Email address" required value="{{old('email')}}">
            <label for="email" class="sr-only">Email address</label>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <input type="password" name="password" id="inputPassword" class="form-control rounded-bottom @error('password')is-invalid @enderror" placeholder="Password" required>
            <label for="inputPassword" class="sr-only">Password</label>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">daftar</button>
        </form>
  <small class="d-block text-center">sudah daftar? <a href="/login">Login</a></small>
</div>
</div>
<small class="d-block text-center text-muted">&copy; 2022</small>
  @endsection
