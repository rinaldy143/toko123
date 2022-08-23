
@extends('layouts.main')

@section('container')


    <div class="flex-container" >
        {{-- <div class="fix mt-4">
            <a href="/post" class="text-decoration-none btn btn-primary btn">Kembali</a>
            <a href="/beli" class="text-decoration-none btn btn-primary btn">Beli</a>
        </div> --}}

        <div class="row mb-5 col-md-6 px-5">
            <div class="">
                <h2 class="mb-3">{{$posts->namaBarang}}</h2>
                <p>categorized in <a href="/post?kategori={{$posts->kategori->slug}}">{{$posts->kategori->nama}}</a></p>
                {{-- <p>By. <a href="/post?user={{$posts->user->name}}" class="text-decoration-none" >{{$posts->user->name}}</a> in <a href="/post?kategori={{$posts->kategori->slug}}">{{$posts->kategori->nama}}</a></p> --}}
                @if ($posts->image)
                <div style="max-height: 400px; overflow:hidden;">
                    <img src="{{asset('storage/' . $posts->image)}}" alt="{{$posts->kategori->nama}}" class="img-fluid">
                </div>
                @else
                <img src="https://source.unsplash.com/400x400?{{$posts->kategori->nama}}" alt="{{$posts->kategori->nama}}" class="img-fluid">
                @endif
                <h3 class="mb-3">Rp {{number_format($posts->harga)}}</h3>
            </div>
        </div>
        <div class="row mt-5 col-md-6 px-5">
            <div class="">
                <article class="my-3 fs-5">
                    {!! Str::limit($posts->descBarang, 350) !!}
                    {{-- {{ Str::limit($posts->descBarang, 50) }} --}}
                </article>
            </div>
        </div>

    </div>
@include('beli.create')

        {{-- <h5>{{$posts['penjual']}}</h5> --}}
        {{-- <img src="../img/{{$posts["gambarBarang"]}}" alt= {{$posts["namaBarang"]}} width="200" mb-5> --}}



@endsection
<style>
    .fix
{
   position:fixed;
   left:250px;
}
.flex-container {
  display: flex;
}

</style>
