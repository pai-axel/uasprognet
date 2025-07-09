@extends('sb-admin/app')
@section('title', 'Article')
@section('article', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Artikel</h1>

    <a href="/article/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Artikel</a>

   @if ($article[0])
        {{-- table --}}
        <div class="table-responsive">
        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Article Sampul</th>
                <th scope="col">Article Title</th>
                <th scope="col">Tag Article</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($article as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><img src="/upload/article/{{$row->artikel_sampul}}" alt="" width="80px" height="80px"></td>
                    <td>{{$row->artikel_title}}</td>
                    <td>
                       @foreach ($row->tag_artikel as $tag_artikel)
                           <span class="badge badge-secondary">{{$tag_artikel->tag_artikel_name}}</span>
                       @endforeach
                    </td>
                    <td width="35%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <!-- <a href="/article/{{$row->id}}/rekomendasi" class="btn btn-warning btn-sm mr-1"><i class="{{$row->rekomendasi ? 'fas fa-star' : 'far fa-star'}}"></i> Rekomendasi</a> -->
                            <a href="/article/{{$row->id}}" class="btn btn-info btn-sm mr-1"><i class="fas fa-eye"></i> Detail</a>
                            <a href="/article/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                            <a href="/article/{{$row->id}}/konfirmasi" class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        {{$article->links()}}
   @else
       @if (session('search'))
             {!! session('search') !!}
       @else
            <div class="alert alert-info mt-4" role="alert">
                Anda belum mempunyai data
            </div>
       @endif
   @endif
@endsection

@section('search-url', '/article/search')

@section('search')
    @include('sb-admin/search')
@endsection

@section('search-responsive')
    @include('sb-admin/search-responsive')
@endsection

@section('javascript')
   @include('admin/navbar-mobile')
@endsection