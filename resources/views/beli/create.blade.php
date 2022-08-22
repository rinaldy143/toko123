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

<div class="container">
  <div class="py-5 text-center">
    <h2>Checkout form</h2>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Keranjang</span>
        {{-- <span class="badge badge-secondary badge-pill">3</span> --}}
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Product name</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$12</span>
        </li>

        <li class="list-group-item d-flex justify-content-between">
          <span>Total (IDR)</span>
          <strong>Rp 20</strong>
        </li>
      </ul>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
        <form action="{{ route('beli.store') }}" class="mb-5" enctype="multipart/form-data" method="post">
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

        {{-- <div class="mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="username" placeholder="Username" required>
          </div>
        </div> --}}

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
              {{-- <label for="inputLocations" class="text-color-light">select Country</label>
              <select class="form-select" aria-label="Country" id="country_id"
                  name="country_id">
                  <option selected="true" disabled="disabled">Select Country</option>
                  @foreach ($country as $countries)
                  <option value="{{ $countries->id }}">{{$countries->nama}}</option>
                  @endforeach
              </select> --}}
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
        {{-- <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div> --}}
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
        {{-- <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" required>
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div> --}}
        <hr class="mb-4">
        <a href="/post" class="btn btn-primary btn-lg">kembali</a>
        <button class="btn btn-primary btn-lg" type="submit">Beli Sekarang</button>
        </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2022 Toko123</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="/js/form-validation.js"></script>
  </body>
</html>

