@extends('sb-admin/app')
@section('title', 'Seo')
@section('seo', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Seo</h1>

    <form action="/seo" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="domain_canonical">Domain Canonical</label>
            <input type="text" class="form-control" id="domain_canonical" name="domain_canonical" value="{{old('domain_canonical')}}">
            @error('domain_canonical')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="og_image">OG Image</label>
            <input type="file" class="form-control" id="og_image" name="og_image">
            @error('og_image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="meta_title">Meta Title</label>
            <input type="text" class="form-control" id="meta_title" name="meta_title">
            @error('meta_title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="meta_description">Meta Description</label>
            <textarea type="text" class="form-control" row="10" id="meta_description" name="meta_description"></textarea>
            @error('meta_description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="meta_keywords">Meta Keywords</label>
            <textarea type="text" class="form-control" row="10" id="meta_keywords" name="meta_keywords"></textarea>
            @error('meta_keywords')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="meta_language">Meta Language</label>
            <input type="text" class="form-control" id="meta_language" name="meta_language">
            @error('meta_language')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="meta_author">Meta Author</label>
            <input type="text" class="form-control" id="meta_author" name="meta_author">
            @error('meta_author')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
       
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/seo" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

