@extends('sb-admin/app')
@section('title', 'Struktur Organisasi')
@section('struktur organisasi', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Struktur Organisasi</h1>

    <form action="/struktur_organisasi" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_anggota">Nama Anggota</label>
            <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="{{old('nama_anggota')}}">
            @error('nama_anggota')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="image_anggota">Image Anggota</label>
            <input type="file" class="form-control" id="image_anggota" name="image_anggota">
            @error('image_anggota')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="posisi">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi" value="{{old('posisi')}}">
            @error('posisi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/struktur_organisasi" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    @include('ckeditor/setting')
@endsection
