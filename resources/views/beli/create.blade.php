@extends('layouts.main')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Checkout example · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/checkout/">



    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="/css/form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">

      <div class="text-center">
        <h2>Checkout form</h2>
      </div>
<div class="flex-container">
  <div class="row">
      <form action="{{ route('beli.store') }}" class="mb-5" enctype="multipart/form-data" method="post">
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
        @csrf
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="namaLengkap">Nama Lengkap</label>
          <input type="text" class="form-control @error('namaLengkap')
          is-invalid
          @enderror" id="namaLengkap" name="namaLengkap" required autofocus value="{{ old('namaLengkap') }}">
          @error('namaLengkap')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
          </div>
        </div>

        <div class="mb-3">
          <label for="alamat">alamat</label>
              <input type="text" class="form-control @error('alamat')
              is-invalid
          @enderror" id="alamat" name="alamat" required autofocus value="{{ old('alamat') }}">
              @error('alamat')
                  <div class="invalid-feedback">
                  {{ $message }}
                  </div>
              @enderror
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
              <label for="inputLocations" class="text-color-light">Country</label>
              <input type="text" class="form-control @error('country')
              is-invalid
              @enderror" id="country" name="country" required autofocus value="{{ old('country') }}">
              @error('country')
                  <div class="invalid-feedback">
                  {{ $message }}
                  </div>
              @enderror
            </div>
          <div class="col-md-5 mb-3">
            <label for="state">state</label>
              <input type="text" class="form-control @error('state')
              is-invalid
              @enderror" id="state" name="state" required autofocus value="{{ old('state') }}">
              @error('state')
                  <div class="invalid-feedback">
                  {{ $message }}
                  </div>
              @enderror
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">zip</label>
              <input type="number" class="form-control @error('zip')
              is-invalid
              @enderror" id="zip" name="zip" required autofocus value="{{ old('zip') }}">
              @error('zip')
                  <div class="invalid-feedback">
                  {{ $message }}
                  </div>
              @enderror
          </div>
        </div>
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="save-info" required>
            <label class="custom-control-label" for="save-info">Dengan ini saya menyetujui syarat dan ketentuan yang berlaku pada website ini</label>
            </div>
        <hr class="mb-4">

        <h4 class="mb-3">Pembayaran</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Bukti Pembayaran</label>
            <input type="file" class="form-control-file @error('upload_file') is-invalid @enderror" id="upload_file" name="upload_file" required>
            @error('upload_file')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
          </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 pt-5 mb-3">
        <button class="btn btn-primary btn-lg" type="submit">Beli Sekarang</button>
        <a href="/post" class="btn btn-primary btn-lg">kembali</a>
    </div>
  </div>
</form>

</div>
<hr class="mb-4">

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2022 Toko123</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="/js/form-validation.js"></script>
  </body>
</html>

