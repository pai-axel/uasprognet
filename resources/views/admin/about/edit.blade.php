@extends('sb-admin/app')
@section('title', 'About')
@section('about', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">About</h1>

    <form action="/about/{{$about->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-2">
                 <img src="/upload/about/{{$about->about_image}}" width="150px" height="150px" alt="">
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="about_title">About Title</label>
                    <input type="text" class="form-control" id="about_title" name="about_title" value="{{old('about_title') ? old('about_title') : $about->about_title}}">
                    @error('about_title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="about_year">About Year</label>
                    <input type="number" class="form-control" id="about_year" name="about_year" value="{{old('about_year') ? old('about_year') : $about->about_year}}">
                    @error('about_year')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
        </div>

        <div class="form-group">
                    <label for="about_content">About Content</label>
                    <textarea class="form-control" rows="10" id="about_content" name="about_content">{{ old('about_content', $about->about_content) }}</textarea>
                    @error('about_content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="about_image">About Image</label>
                    <input type="file" class="form-control" id="about_image" name="about_image">
                    @error('about_image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/about" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

