@extends('sb-admin/app')
@section('title', 'Artikel')
@section('artikel', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <a href="/article/{{$article->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <a href="/article" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card mt-3">
        <img src="/upload/article/{{$article->artikel_sampul}}" height="450px" class="card-img-top" alt="...">
        <div class="card-body">
            <h2 class="card-title">{{$article->artikel_title}}</h2>
            <p class="card-text">{!!$article->artikel_konten!!}</p>
            <p class="card-text"><small class="text-muted">{{$article->created_at->diffForHumans()}}</small></p>
        </div>
    </div>
@endsection