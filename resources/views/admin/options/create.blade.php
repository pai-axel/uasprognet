@extends('sb-admin/app')
@section('title', 'Options')
@section('options', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Options</h1>

    <form action="/options" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" class="form-control" id="company_name" name="company_name" value="{{old('company_name')}}">
            @error('company_name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="theme_color">Theme Color</label>
            <input type="text" class="form-control" id="theme_color" name="theme_color" value="{{old('theme_color')}}">
            @error('theme_color')
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
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location">
            @error('location')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="call">Call</label>
            <input type="text" class="form-control" id="call" name="call">
            @error('call')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="maps">Maps</label>
            <input type="text" class="form-control" id="maps" name="maps">
            @error('maps')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="product_footer">Product Footer</label>
            <input type="text" class="form-control" id="product_footer" name="product_footer">
            @error('product_footer')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
       
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/options" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

