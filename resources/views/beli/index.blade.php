@extends('layouts.main')

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>
        Toko
    </title>
    <!-- my-dashboard -->
    {{-- <link rel="stylesheet" href="{{asset('vendor/my-dashboard/css/dashboard.css')}}">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" > --}}
    <!-- fontawesome -->
    {{-- <script src="{{asset('vendor/fontawesome-free/css/all.min.css')}}"></script> --}}
    {{--    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">--}}
    <!-- icon flag -->
    {{-- <link rel="stylesheet" href="{{asset('vendor/flag-icon-css/css/flag-icon.min.css')}}"> --}}
</head>

<div class="container">
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>CMS beli Form</h2>
            </div>
        </div>

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show my-1" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <table class="table table-bordered">
        <tr>
            <th class="col-1">No</th>
            <th class="col-2">Name</th>
            {{-- <th class="col-2">nama Barang</th> --}}
            {{-- <th class="col-1">harga</th> --}}
            <th class="col-2">alamat</th>
            <th class="col-1">Country</th>
            <th class="col-1">lokasi</th>
            <th class="col-1">kode pos</th>
            <th class="col-2">image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($beli as $contact)
        {{-- @foreach ($beli as $contact) --}}
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $contact->namaLengkap }}</td>
            {{-- <td>{{ $contact->namaBarang }}</td> --}}
            {{-- <td>{{ $contact->harga }}</td> --}}
            <td>{{ $contact->alamat }}</td>
            <td>{{ $contact->country }}</td>
            <td>{{ $contact->state }}</td>
            <td>{{ $contact->zip }}</td>
            <td>
            @if ($contact->upload_file)
                <img src="/img/bukti-bayar/{{$contact->upload_file}}" width="150">
            @else
                <p>Tidak ada bukti Pembayaran</p>
            @endif
            </td>

            <td>
                <form action="{{route('beli.destroy', ($contact->id))}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-success">Selesai Transaksi</button>
                </form>
                </td>
            </tr>
            @endforeach
            {{-- @endforeach --}}
        </table>
        {{-- <div class="d-flex justify-content-center">
            {!! livewire->links() !!}
        </div> --}}
    </div>
</div>


{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<!-- jquery -->
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
<!-- my-dashboard -->
{{-- <script src="{{asset('vendor/my-dashboard/js/dashboard.js')}}"></script> --}}
