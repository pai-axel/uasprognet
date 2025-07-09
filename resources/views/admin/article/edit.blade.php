@extends('sb-admin/app')
@section('title', 'Artikel')
@section('artikel', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Artikel</h1>

    <form action="/article/{{$article->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="artikel_title">Artikel</label>
            <input type="text" class="form-control" id="artikel_title" name="artikel_title" value="{{old('artikel_title') ? old('artikel_title') : $article->artikel_title}}">
            @error('artikel_title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="row">
            <div class="col-md-2">
                <img src="/upload/article/{{$article->artikel_sampul}}" width="100%" height="150px" class="mt-2" alt="">
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="artikel_sampul">Artikel Sampul</label>
                    <input type="file" class="form-control" id="artikel_sampul" name="artikel_sampul">
                    @error('artikel_sampul')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
       
        <div class="form-group">
            <label for="tag_artikel">Tag Artikel</label>
            <select multiple class="form-control" id="tag_artikel" name="tag_artikel[]">
                @foreach ($tag_article as $row)
                    <option value="{{ $row->id }}"
                        @foreach ($article->tag_artikel as $tag)
                            @if ($tag->id == $row->id)
                                selected
                            @endif
                        @endforeach
                    >{{ $row->tag_artikel_name }}</option>
                @endforeach
            </select>
            @error('tag_artikel')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="editor">Artikel Konten </label>
            <textarea class="form-control" id="editor" rows="10" name="artikel_konten">{{old('artikel_konten') ? old('artikel_konten') : $article->artikel_konten}}</textarea>
            @error('artikel_konten')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/article" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    @include('ckeditor/setting')
@endsection