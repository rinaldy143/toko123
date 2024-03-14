@extends('layouts.main')
@section('container')

{{-- <h1 class="mb-5">Kategori barang</h1> --}}

@section('container')
<section style="min-height: 75vh">
    <h1 class="mb-5">Post Kategoris</h1>

    <div class="container">
        <div class="row pb-5">
            @foreach ($kategoris as $kategori)

            <div class="col-md-4">
                <a href="/post?kategori={{$kategori->slug}}">
                    <div class="card bg-dark text-white">
                        <img src="https://source.unsplash.com/500x500?{{$kategori->nama}}" class="card-img" alt="{{$kategori->nama}}}}">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">{{$kategori->nama}}</h5>
                        </div>
                    </div>
                </a>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endsection

