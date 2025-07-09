@extends('sb-admin/app')
@section('title', 'Seo')
@section('seo', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <a href="/seo/{{$seo->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <a href="/seo" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card mt-3">
        <img src="/upload/seo/{{$seo->og_image}}" height="450px" class="card-img-top" alt="...">
        <div class="card-body">
            <h2 class="card-title">{{$seo->domain_canonical}}</h2>
            <p class="card-text">{{$seo->meta_title}}</p>
            <p class="card-text">{{$seo->meta_description}}</p>
            <p class="card-text">{{$seo->meta_keywords}}</p>
            <p class="card-text">{{$seo->meta_language}}</p>
            <p class="card-text">{{$seo->meta_author}}</p>
            <p class="card-text"><small class="text-muted">{{$seo->created_at->diffForHumans()}}</small></p>
        </div>
    </div>
@endsection