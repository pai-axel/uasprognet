@extends('sb-admin/app')
@section('title', 'Options')
@section('options', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <a href="/options/{{$options->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <a href="/options" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card mt-3">
        <img src="/upload/options/{{$options->banner_image}}" height="450px" class="card-img-top" alt="...">
        <div class="card-body">
            <h2 class="card-title">{{$options->company_name}}</h2>
            <p class="card-text">{{$options->theme_color}}</p>
            <p class="card-text">{{$options->location}}</p>
            <p class="card-text">{{$options->call}}</p>
            <p class="card-text">{{$options->email}}</p>
            <p class="card-text">{{$options->maps}}</p>
            <p class="card-text">{{$options->product_footer}}</p>
            <p class="card-text"><small class="text-muted">{{$options->created_at->diffForHumans()}}</small></p>
        </div>
    </div>
@endsection