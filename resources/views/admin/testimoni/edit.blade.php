@extends('sb-admin/app')
@section('title', 'Testimoni')
@section('testimoni', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Testimoni</h1>

    <form action="/testimoni/{{$testimoni->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-2">
                 <img src="/upload/testimoni/{{$testimoni->testi_client_avatar}}" width="150px" height="150px" alt="">
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <label for="testi_client_name">Testimoni Client Name</label>
                    <input type="text" class="form-control" id="testi_client_name" name="testi_client_name" value="{{old('testi_client_name') ? old('testi_client_name') : $testimoni->testi_client_name}}">
                    @error('testi_client_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="testi_client_avatar">testimoni Image</label>
                    <input type="file" class="form-control" id="testi_client_avatar" name="testi_client_avatar">
                    @error('testi_client_avatar')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="editor">Testimoni Client Content</label>
            <textarea class="form-control" id="editor" rows="10" name="testi_client_content">{{old('testi_client_content') ? old('testi_client_content') : $testimoni->testi_client_content}}</textarea>
            @error('testi_client_content')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
        <a href="/testimoni" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

@section('ck-editor')
    @include('ckeditor/setting')
@endsection

