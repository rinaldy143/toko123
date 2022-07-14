@extends('layouts.main')
@section('container')

<h1 class="mb-3 text-center">{{$title}}</h1>
<div class="container">
    <div class="row mb-3 justify-content-center">
        <div class="col-md-6">
            <form action="/post">

                @if (request('kategori'))
                <input type="hidden", name="kategori", value="{{request('kategori')}}">
                @endif
                @if (request('user'))
                <input type="hidden", name="user", value="{{request('user')}}">
                @endif


                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="cari" name="cari" value="{{request('cari')}}">
                    <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" id="">cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@if ($post->count())
<div class="card mb-3">
    @if ($post[0]->image)
    <div style="max-height: 400px; overflow:hidden;">
        <img src="{{asset('storage/' . $post[0]->image)}}" alt="{{$post[0]->kategori->nama}}" class="img-fluid">
    </div>
    @else
        <img src="https://source.unsplash.com/1200x400?{{$post[0]->kategori->nama}}" alt="{{$post[0]->kategori->nama}}" class="card-img-top">
    @endif
    <div class="card-body text-center">
      <h3 class="card-title"><a href="/post/{{$post[0]->slug}}"
        class="text-decoration-none text-dark">{{$post[0]->namaBarang}}</a></h3>
      <p>
        <small class="text-muted">
            dijual oleh <a href="/post?user={{ $post[0]->user->username}}" class="text-decoration-none" >{{$post[0]->user->name}}</a> in <a href="/post?kategori={{$post[0]->kategori->slug}}"class="text-decoration-none">{{$post[0]->kategori->nama}} </a> {{$post[0] ->created_at->diffForHumans() }}
        </small>
    </p>
      <p class="card-text">{{$post[0] ->excerpt}}</p>
        <a href="/post/{{$post[0]->slug}}" class="text-decoration-none btn btn-primary">Beli</a>

    </div>
  </div>


<div class="container">
    <div class="row">
        @foreach ($post->skip(1) as $posts)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute bg-dark px-3 py-2 " style="background-color: rgba(0, 0, 0, 0.7)"><a href="/post?kategori={{$posts->kategori->slug}}" class="text-white text-decoration-none"> {{$posts->kategori->nama}}</a></div>
                    @if ($posts->image)
                        <img src="{{asset('storage/' . $posts->image)}}" alt="{{$posts->kategori->nama}}" class="img-fluid mt-3">
                    @else
                        <img src="https://source.unsplash.com/500x400?{{ $posts->kategori->nama}}" class="card-img-top" alt="{{$posts->kategori->nama}}">
                    @endif
                    <div class="card-body">
                    <h5 class="card-title">{{$posts->namaBarang}}</h5>
                    <p>
                        <small class="text-muted">
                            dijual oleh <a href="/post?user={{ $posts->user->username}}" class="text-decoration-none" >{{$posts->user->name}}</a> {{$posts->created_at->diffForHumans() }}
                        </small>
                    </p>
                    <p class="card-text">{{$posts->excerpt}}</p>
                    <a href="/post/{{ $posts->slug }}" class="btn btn-primary">Beli</a>
                    @can('admin')
                    <form action="/post/{{ $posts->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger border-0" onclick="return confirm('yakin?')">Hapus</button>
                    </form>
                    @endcan
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
@else
  <p class="text-center fs-4">no post found</p>
@endif
<div class="d-flex justify-content-end">
{{$post->links()}}
</div>
@endsection
