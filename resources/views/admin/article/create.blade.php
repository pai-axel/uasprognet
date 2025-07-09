@extends('sb-admin/app')
@section('title', 'Artikel')
@section('artikel', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Artikel</h1>

    <form action="/article" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="artikel_title">Judul Artikel</label>
            <input type="text" class="form-control" id="artikel_title" name="artikel_title" value="{{ old('artikel_title') }}">
            @error('artikel_title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="artikel_sampul">Sampul Artikel</label>
            <input type="file" class="form-control" id="artikel_sampul" name="artikel_sampul">
            @error('artikel_sampul')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="tag_artikel">Tag Artikel</label>
            <select multiple class="form-control" id="tag_artikel" name="tag_artikel[]">
                @foreach ($tag_article as $row)
                    <option value="{{ $row->id }}">{{ $row->tag_artikel_name }}</option>
                @endforeach
            </select>
            @error('tag_artikel')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="artikel_konten">Konten Artikel</label>
            <textarea class="form-control" id="artikel_konten" rows="10" name="artikel_konten">{{ old('artikel_konten') }}</textarea>
            @error('artikel_konten')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        <a href="/article" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    @include('ckeditor/setting')
@endsection
