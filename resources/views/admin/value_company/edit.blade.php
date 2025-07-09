@extends('sb-admin/app')
@section('title', 'Value Company')
@section('value_company', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Value Company</h1>

    <form action="/value_company/{{$value_company->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
                <div class="form-group">
                    <label for="value_title">Value Title</label>
                    <input type="text" class="form-control" id="value_title" name="value_title" value="{{old('value_title') ? old('value_title') : $value_company->value_title}}">
                    @error('value_title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="value_color">Value Color</label>
                    <input type="text" class="form-control" id="value_color" name="value_color" value="{{old('value_color') ? old('value_color') : $value_company->value_color}}">
                    @error('value_color')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="value_content">Value Content</label>
                    <textarea class="form-control" rows="10" id="value_content" name="value_content">{{ old('value_content', $value_company->value_content) }}</textarea>
                    @error('value_content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/value_company" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

