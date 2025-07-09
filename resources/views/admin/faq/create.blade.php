@extends('sb-admin/app')
@section('title', 'Faq')
@section('faq', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Faq</h1>

    <form action="/faq" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="question">Question</label>
            <input type="text" class="form-control" id="question" name="question">
            @error('question')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="answer">Answer</label>
            <textarea type="text" class="form-control" row="10" id="answer" name="answer"></textarea>
            @error('answer')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
       
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/faq" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

