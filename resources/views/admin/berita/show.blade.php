@extends('sb-admin/app')
@section('title', 'Berita')
@section('berita', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <a href="/berita/{{$berita->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <a href="/berita" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card mt-3">
        <img src="/upload/berita/{{$berita->berita_sampul_1}}" height="450px" class="card-img-top" alt="...">
        <img src="/upload/berita/{{$berita->berita_sampul_2}}" height="450px" class="card-img-top" alt="...">
        <img src="/upload/berita/{{$berita->berita_sampul_3}}" height="450px" class="card-img-top" alt="...">
        <div class="card-body">
            <h2 class="card-title">{{$berita->berita_title}}</h2>
            <p class="card-text">{{$berita->berita_konten_1}}</p>
            <p class="card-text">{!!$berita->berita_konten_2!!}</p>
            <p class="card-text"><small class="text-muted">{{$berita->created_at->diffForHumans()}}</small></p>
        </div>
    </div>
@endsection