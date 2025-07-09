@extends('sb-admin/app')
@section('title', 'Berita')
@section('berita', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Berita</h1>

    <form action="/berita" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="berita_title">Berita Title</label>
            <input type="text" class="form-control" id="berita_title" name="berita_title" value="{{old('berita_title')}}">
            @error('berita_title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="berita_sampul_1">Berita Sampul 1</label>
            <input type="file" class="form-control" id="berita_sampul_1" name="berita_sampul_1">
            @error('berita_sampul_1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="berita_sampul_2">Berita Sampul 2</label>
            <input type="file" class="form-control" id="berita_sampul_2" name="berita_sampul_2">
            @error('berita_sampul_2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="berita_sampul_3">Berita Sampul 1</label>
            <input type="file" class="form-control" id="berita_sampul_3" name="berita_sampul_3">
            @error('berita_sampul_3')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="kategori_berita">Kategori_berita Berita</label>
            <select class="form-control" id="kategori_berita" name="kategori_berita">
                <option selected disabled>Pilih Kategori Berita</option>
                @foreach ($kategori_berita as $row)
                    <option value="{{$row->id}}">{{$row->kategori_berita_name}}</option>
                @endforeach
            </select>
            @error('kategori_berita')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="tag_berita">Tag Berita</label>
            <select multiple class="form-control" id="tag_berita" name="tag_berita[]">
                @foreach ($tag_berita as $row)
                    <option value="{{$row->id}}">{{$row->tag_berita_name}}</option>
                @endforeach
            </select>
            @error('tag_berita')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">Berita Konten 1</label>
            <textarea class="form-control"  rows="10" name="berita_konten_1">{{old('berita_konten_1')}}</textarea>
            @error('berita_konten_1')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="editor">Berita Konten 2</label>
            <textarea class="form-control" id="editor" rows="10" name="berita_konten_2">{{old('berita_konten_2')}}</textarea>
            @error('berita_konten_2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/berita" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    @include('ckeditor/setting')
@endsection