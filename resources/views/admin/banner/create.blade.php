@extends('sb-admin/app')
@section('title', 'Banner')
@section('banner', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Banner</h1>

    <form action="/banner" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="banner_title">Banner Title</label>
            <input type="text" class="form-control" id="banner_title" name="banner_title">
            @error('banner_title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="banner_sub">Banner Subtitle</label>
            <textarea type="text" class="form-control" row="10" id="banner_sub" name="banner_sub"></textarea>
            @error('banner_sub')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
       
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/banner" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

