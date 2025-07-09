@extends('sb-admin/app')
@section('title', 'Tag Berita')
@section('tag_berita', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tag Berita</h1>

    <form action="/tag_berita/{{$tag_berita->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="tag_berita_name">Tag Berita</label>
            <input type="text" class="form-control" id="tag_berita_name" name="tag_berita_name" value="{{$tag_berita->tag_berita_name}}">
            @error('tag_berita_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/tag_berita" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection