@extends('sb-admin/app')
@section('title', 'Product')
@section('product', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Product</h1>

    <form action="/product/{{$product->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-2">
                 <img src="/upload/product/{{$product->product_image}}" width="150px" height="150px" alt="">
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="product_title">Product Title</label>
                    <input type="text" class="form-control" id="product_title" name="product_title" value="{{old('product_title') ? old('product_title') : $product->product_title}}">
                    @error('product_title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="product_image">Product Image</label>
                    <input type="file" class="form-control" id="product_image" name="product_image">
                    @error('product_image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="editor">Product Content</label>
            <textarea class="form-control" id="editor" rows="10" name="product_content">{{old('product_content') ? old('product_content') : $product->product_content}}</textarea>
            @error('product_content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/product" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    @include('ckeditor/setting')
@endsection

