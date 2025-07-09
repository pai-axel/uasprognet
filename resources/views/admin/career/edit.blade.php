@extends('sb-admin/app')
@section('title', 'Career')
@section('career', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Career</h1>

    <form action="/career/{{$career->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-2">
                 <img src="/upload/career/{{$career->career_image}}" width="150px" height="150px" alt="">
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="career_title">Career Title</label>
                    <input type="text" class="form-control" id="career_title" name="career_title" value="{{old('career_title') ? old('career_title') : $career->career_title}}">
                    @error('career_title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="career_image">Career Image</label>
                    <input type="file" class="form-control" id="career_image" name="career_image">
                    @error('career_image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Career Content -->
        <div class="form-group">
            <label for="editor">Career Content</label>
            <textarea class="form-control" id="editor" rows="10" name="career_content">{{old('career_content') ? old('career_content') : $career->career_content}}</textarea>
            @error('career_content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Career Available -->
        <div class="form-group">
            <label>Career Available</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="career_available" id="career_available_active" value="1" {{ old('career_available', $career->career_available) == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="career_available_active">Active</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="career_available" id="career_available_inactive" value="0" {{ old('career_available', $career->career_available) == 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="career_available_inactive">Inactive</label>
            </div>
            @error('career_available')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/career" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    @include('ckeditor/setting')
@endsection
