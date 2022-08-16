
@extends('layouts.main')

@section('container')


    <div class="container" >
        <div class="fix mt-4">
            <a href="/post" class="text-decoration-none btn btn-primary btn">Kembali</a>
            <a href="/beli" class="text-decoration-none btn btn-primary btn">Beli</a>

        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-3">{{$posts->namaBarang}}</h2>
                <p>By. <a href="/post?user={{$posts->user->username}}" class="text-decoration-none" >{{$posts->user->name}}</a> in <a href="/post?kategori={{$posts->kategori->slug}}">{{$posts->kategori->nama}}</a></p>
                @if ($posts->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{asset('storage/' . $posts->image)}}" alt="{{$posts->kategori->nama}}" class="img-fluid">
                </div>
                @else
                <img src="https://source.unsplash.com/1200x400?{{$posts->kategori->nama}}" alt="{{$posts->kategori->nama}}" class="img-fluid">
                @endif
                <h3 class="mb-3">Rp {{number_format($posts->harga)}}</h3>
                <article class="my-3 fs-5">
                    {!!$posts->descBarang!!}
                </article>

            </div>
        </div>

    </div>


        {{-- <h5>{{$posts['penjual']}}</h5> --}}
        {{-- <img src="../img/{{$posts["gambarBarang"]}}" alt= {{$posts["namaBarang"]}} width="200" mb-5> --}}



@endsection
<style>
    .fix
{
   position:fixed;
   left:250px;
}
</style>
