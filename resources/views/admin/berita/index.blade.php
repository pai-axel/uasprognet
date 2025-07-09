@extends('sb-admin/app')
@section('title', 'Berita')
@section('berita', 'active')
@section('main', 'show')
@section('main-active', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Berita</h1>

    <a href="/berita/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Berita</a>

   @if ($berita[0])
        {{-- table --}}
        <div class="table-responsive">
        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Berita Sampul 1</th>
                <th scope="col">Berita Title</th>
                <th scope="col">Kategori Berita</th>
                <th scope="col">Tag Berita</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($berita as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><img src="/upload/berita/{{$row->berita_sampul_1}}" alt="" width="80px" height="80px"></td>
                    <td>{{$row->berita_title}}</td>
                    <td>{{$row->kategori_berita->kategori_berita_name}}</td>
                    <td>
                       @foreach ($row->tag_berita as $tag_berita)
                           <span class="badge badge-secondary">{{$tag_berita->tag_berita_name}}</span>
                       @endforeach
                    </td>
                    <td width="35%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <!-- <a href="/berita/{{$row->id}}/rekomendasi" class="btn btn-warning btn-sm mr-1"><i class="{{$row->rekomendasi ? 'fas fa-star' : 'far fa-star'}}"></i> Rekomendasi</a> -->
                            <a href="/berita/{{$row->id}}" class="btn btn-info btn-sm mr-1"><i class="fas fa-eye"></i> Detail</a>
                            <a href="/berita/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                            <a href="/berita/{{$row->id}}/konfirmasi" class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash"></i> Hapus</a>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        {{$berita->links()}}
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

@section('search-url', '/berita/search')

@section('search')
    @include('sb-admin/search')
@endsection

@section('search-responsive')
    @include('sb-admin/search-responsive')
@endsection

@section('javascript')
   @include('admin/navbar-mobile')
@endsection