@extends('jual.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Penjualan</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
{{ session('success') }}
</div>
@endif
<div class="table-responsive col-lg-9">
    <a href="/jual/posts/create" class="btn btn-primary mb-3">jual Barang</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Kategori</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->namaBarang }}</td>
                <td>{{ $post->kategori->nama }}</td>
                <td>
                <a  href="/jual/posts/{{ $post->slug }}" class="badge bg-info text-dark"><span data-feather="eye"></span></a>
                <a  href="/jual/posts/{{ $post->slug }}/edit" class="badge bg-warning text-dark"><span data-feather="edit"></span></a>
                <form action="/jual/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('yakin?')"><span data-feather="x-circle"></span></button>
                </form>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
