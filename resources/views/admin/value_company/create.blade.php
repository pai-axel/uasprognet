@extends('sb-admin/app')
@section('title', 'Value Company')
@section('value_company', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Value Company</h1>

    <form action="/value_company" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="value_title">Value Title</label>
            <input type="text" class="form-control" id="value_title" name="value_title">
            @error('value_title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="value_color">Value Color</label>
            <input type="text" class="form-control" id="value_color" name="value_color">
            @error('value_color')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="value_content">Value Content</label>
            <textarea type="text" class="form-control" row="10" id="value_content" name="value_content"></textarea>
            @error('value_content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
       
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/value_company" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

