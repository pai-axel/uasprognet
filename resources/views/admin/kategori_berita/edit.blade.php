@extends('sb-admin/app')
@section('title', 'Kategori Berita')
@section('kategori berita', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kategori Berita</h1>

    <form action="/kategori_berita/{{$kategori_berita->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="kategori_berita_name">Kategori Berita</label>
            <input type="text" class="form-control" id="kategori_berita_name" name="kategori_berita_name" value="{{$kategori_berita->kategori_berita_name}}">
            @error('kategori_berita_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/kategori_berita" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection