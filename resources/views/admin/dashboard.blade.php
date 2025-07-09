@extends('sb-admin/app')
@section('title', 'Dashboard')
@section('dashboard', 'active')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <!-- Content Row -->
    <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Berita</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_berita}}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-file fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Artikel</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_artikel}}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-tag fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Gallery</div>
                <div class="row no-gutters align-items-center">
                <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$jumlah_gallery}}</div>
                </div>
                </div>
            </div>
            <div class="col-auto">
                <i class="fas fa-tags fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Karir</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$jumlah_karir}}</div>
            </div>
            <div class="col-auto">
                <i class="fas fa-image fa-2x text-gray-300"></i>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Content Row -->

    {{-- post --}}

    <div class="card border-bottom-primary">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Berita Hari Ini</h6>
        </div>
        <div class="card-body">
           @if ($berita->count() >= 1)
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Berita Sampul 1</th>
                        <th scope="col">Berita title</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Tag Berita</th>
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
                            @foreach ($row->tag_berita as $tag_relation_berita)
                                <span class="badge badge-secondary">{{$tag_relation_berita->tag_berita_name}}</span>
                            @endforeach
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           @else
                <div class="alert alert-info" role="alert">
               Anda tidak memiliki Berita terbaru hari ini
                </div>
           @endif
        </div>
    </div>
    
    {{-- artikel --}}

    <div class="card border-bottom-success mt-4">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-success">Artikel Hari ini</h6>
        </div>
        <div class="card-body">
           @if ($artikel->count() >= 1)
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Artikel Sampul</th>
                        <th scope="col">Artikel Title</th>
                        <th scope="col">Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($artikel as $row)
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><img src="/upload/article/{{$row->artikel_sampul}}" alt="artikel_title" width="80px" height="80px"></td>
                            <td>{{$row->artikel_title}}</td>
                            <td>{{$row->slug}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           @else
                <div class="alert alert-info" role="alert">
               Anda tidak memiliki Artikel terbaru hari ini
                </div>
           @endif
        </div>
   </div>
    
    {{-- Gallery --}}

    <div class="card border-bottom-info mt-4">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-info">Gallery Hari Ini</h6>
        </div>
        <div class="card-body">
           @if ($gallery->count() >= 1)
           <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Galery Sampul</th>
                        <th scope="col">Galery Title</th>
                        <th scope="col">Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gallery as $row)
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><img src="/upload/gallery/{{$row->gallery_image}}" alt="gallery_title" width="80px" height="80px"></td>
                            <td>{{$row->gallery_title}}</td>
                            <td>{{$row->slug}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           @else
                <div class="alert alert-info" role="alert">
               Anda tidak memiliki Gallery terbaru hari ini
                </div>
           @endif
        </div>
   </div>
    
    {{-- Karir --}}

    <div class="card border-bottom-warning mt-4">
        <div class="card-header">
        <h6 class="m-0 font-weight-bold text-warning">Karir Hari Ini</h6>
        </div>
        <div class="card-body">
           @if ($karir->count() >= 1)
           <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Career Sampul</th>
                        <th scope="col">Career Title</th>
                        <th scope="col">Slug</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karir as $row)
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><img src="/upload/career/{{$row->career_image}}" alt="career_title" width="80px" height="80px"></td>
                            <td>{{$row->career_title}}</td>
                            <td>{{$row->slug}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           @else
                <div class="alert alert-info" role="alert">
               Anda tidak memiliki Karir terbaru hari ini
                </div>
           @endif
        </div>
   </div>
@endsection