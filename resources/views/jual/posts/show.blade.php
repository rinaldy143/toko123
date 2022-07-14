@extends('jual.layouts.main')

@section('container')
<div class="container" >
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3">{{$post->namaBarang}}</h2>
            <a href="/jual/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
            <a href="/jual/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/jual/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('yakin?')"><span data-feather="x-circle"></span> Delete</button>
            </form>

            @if ($post->image)
            <div style="max-height: 350px; overflow:hidden;">
                <img src="{{asset('storage/' . $post->image)}}" alt="{{$post->kategori->nama}}" class="img-fluid mt-3">
            </div>
                @else
                <img src="https://source.unsplash.com/1200x400?{{$post->kategori->nama}}" alt="{{$post->kategori->nama}}" class="img-fluid mt-3">
                @endif
                <h3 class="mb-3">Rp {{$post->harga}}</h3>
            <article class="my-3 fs-5">
                {!!$post->descBarang!!}
            </article>
        </div>
    </div>
</div>

@endsection
