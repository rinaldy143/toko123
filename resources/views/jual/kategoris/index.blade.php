@extends('jual.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Kategoris
    </h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
{{ session('success') }}
</div>
@endif
<div class="table-responsive col-lg-6 ">
    <a href="/jual/kategoris/create" class="btn btn-primary mb-3">create new kategori</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Kategori Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($kategoris as $kategori)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kategori ->nama }}</td>
                <td>
                <a  href="/jual/kategoris/{{ $kategori->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a  href="/jual/kategoris/{{ $kategori->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/jual/kategoris/{{ $kategori->slug }}" method="post" class="d-inline">
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
