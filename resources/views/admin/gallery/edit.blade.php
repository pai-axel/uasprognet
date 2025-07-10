@extends('sb-admin/app')
@section('title', 'Gallery')
@section('gallery', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Gallery</h1>

    <form action="/gallery/{{$gallery->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-2">
                 <img src="/upload/gallery/{{$gallery->gallery_image}}" width="150px" height="150px" alt="">
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="gallery_title">Gallery Title</label>
                    <input type="text" class="form-control" id="gallery_title" name="gallery_title" value="{{old('gallery_title') ? old('gallery_title') : $gallery->gallery_title}}">
                    @error('gallery_title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="gallery_image">Gallery Image</label>
                    <input type="file" class="form-control" id="gallery_image" name="gallery_image">
                    @error('gallery_image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/gallery" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

