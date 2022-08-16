@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit barang</h1>
</div>

<div class="col-lg-8">
<form method="post" action="/jual/posts/{{$post->slug}}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="namaBarang">Post</label>
      <input type="text" class="form-control @error('namaBarang')
      is-invalid
  @enderror" id="namaBarang" name="namaBarang" required autofocus value="{{ old('namaBarang', $post->namaBarang )}}">
      @error('namaBarang')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="harga">Harga</label>
        <input type="number" class="form-control @error('harga')
        is-invalid
    @enderror" id="harga" name="harga" required autofocus value="{{ old('harga', $post->harga) }}">
        @error('harga')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
        @enderror
      </div>
    <div class="mb-3">
      <label for="slug">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly required value="{{ old('slug', $post->slug )}}" >
      @error('slug')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="kategori" class="form-label">Kategori</label>
      <select class="custom-select" name="kategori_id">
        @foreach ($kategoris as $kategori)
        @if (old('kategori_id', $post->kategori_id)  == $kategori->id)
        <option value="{{$kategori->id}}" selected>{{$kategori->nama}}</option>
        @else
        <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
        @endif
        @endforeach
      </select>
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="hidden" name="oldImage" value="{{ $post->image}}">
        @if ($post->image)
        <img src="{{ asset('storage/' . $post->image )}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        @else
        <img class="img-preview img-fluid mb-3 col-sm-5">
        @endif
        <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
        @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
      @enderror
      </div>

    <div class="mb-3">
      <label for="descBarang" class="form-label">Body</label>
      @error('descBarang')
      <p class="text-danger"> {{$message}} </p>
      @enderror
      <input id="descBarang" type="hidden" name="descBarang" value="{{old('descBarang', $post->descBarang)}}">
      <trix-editor input="descBarang"></trix-editor>
    </div>
    <a href="/jual/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Batal</a>
    <button type="submit" class="btn btn-primary">Update Barang</button>

  </form>
</div>

<script>
    const namaBarang = document.querySelector('#namaBarang');
    const slug = document.querySelector('#slug');

    namaBarang.addEventListener('change', function () {
        fetch('/jual/posts/checkSlug?namaBarang=' + namaBarang.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug);

    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImage() {
        const Image= document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
  @endsection
