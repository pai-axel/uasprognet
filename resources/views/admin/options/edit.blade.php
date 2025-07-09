@extends('sb-admin/app')
@section('title', 'Options')
@section('options', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Options</h1>

    <form action="/options/{{$options->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-2">
                 <img src="/upload/options/{{$options->banner_image}}" width="150px" height="150px" alt="">
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" value="{{old('company_name') ? old('company_name') : $options->company_name}}">
                    @error('company_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="banner_image">Banner Image</label>
                    <input type="file" class="form-control" id="banner_image" name="banner_image">
                    @error('banner_image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
        </div>
        <div class="form-group">
            <label for="theme_color">Theme Color</label>
            <input type="text" class="form-control" id="theme_color" name="theme_color" value="{{old('theme_color') ? old('theme_color') : $options->theme_color}}">
            @error('theme_color')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{old('location') ? old('location') : $options->location}}">
            @error('location')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="call">Call</label>
            <input type="text" class="form-control" id="call" name="call" value="{{old('call') ? old('call') : $options->call}}">
            @error('call')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{old('email') ? old('email') : $options->email}}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="maps">Maps</label>
            <input type="text" class="form-control" id="maps" name="maps" value="{{old('maps') ? old('maps') : $options->maps}}">
            @error('maps')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="product_footer">Product Footer</label>
            <input type="text" class="form-control" id="product_footer" name="product_footer" value="{{old('product_footer') ? old('product_footer') : $options->product_footer}}">
            @error('product_footer')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/options" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

