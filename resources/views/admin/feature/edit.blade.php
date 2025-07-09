@extends('sb-admin/app')
@section('title', 'Feature')
@section('feature', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Feature</h1>

    <form action="/feature/{{$feature->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-2">
                 <img src="/upload/feature/{{$feature->feature_image}}" width="150px" height="150px" alt="">
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="feature_title">Feature Title</label>
                    <input type="text" class="form-control" id="feature_title" name="feature_title" value="{{old('feature_title') ? old('feature_title') : $feature->feature_title}}">
                    @error('feature_title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="feature_image">Feature Image</label>
                    <input type="file" class="form-control" id="feature_image" name="feature_image">
                    @error('feature_image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="editor">feature Content</label>
            <textarea class="form-control" id="editor" rows="10" name="feature_content">{{old('feature_content') ? old('feature_content') : $feature->feature_content}}</textarea>
            @error('feature_content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/feature" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    @include('ckeditor/setting')
@endsection

