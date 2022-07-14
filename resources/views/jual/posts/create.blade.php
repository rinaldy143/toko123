@extends('jual.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Jual Barang</h1>
</div>

<div class="col-lg-8">
<form method="post" action="/jual/posts" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="namaBarang">Post</label>
      <input type="text" class="form-control @error('namaBarang')
      is-invalid
  @enderror" id="namaBarang" name="namaBarang" required autofocus value="{{ old('namaBarang') }}">
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
  @enderror" id="harga" name="harga" required autofocus value="{{ old('harga') }}">
      @error('harga')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly required value="{{ old('slug') }}" >
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
        @if (old('kategori_id') == $kategori->id)
        <option value="{{$kategori->id}}" selected>{{$kategori->nama}}</option>
        @else
        <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
        @endif
        @endforeach
      </select>
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
        <img class="img-preview img-fluid mb-3 col-sm-5" src="" alt="">
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
      <input id="descBarang" type="hidden" name="descBarang" value="{{old('descBarang')}}">
      <trix-editor input="descBarang"></trix-editor>
    </div>
    <button type="submit" class="btn btn-primary">Jual Barang</button>
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
