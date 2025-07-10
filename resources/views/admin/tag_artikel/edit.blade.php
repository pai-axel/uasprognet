@extends('sb-admin/app')
@section('title', 'Tag Artikel')
@section('tag artikel', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tag Artikel</h1>

    <form action="/tag_artikel/{{$tag_artikel->id}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="tag_artikel_name">Tag Artikel</label>
            <input type="text" class="form-control" id="tag_artikel_name" name="tag_artikel_name" value="{{$tag_artikel->tag_artikel_name}}">
            @error('tag_artikel_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/tag_artikel" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection