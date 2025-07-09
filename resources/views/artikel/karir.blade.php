@extends('artikel/template/app')

@section('title', 'Karir')

@section('content')

<div class="main-wrapper">
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Karir</span>
                        <h1 class="text-capitalize mb-4 text-lg">Karir</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item"><a href="#" class="text-white-50">Karir</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="schedule-search">
        <div class="container">
            <div class="schedule-inner">
                <div class="d-flex justify-content-center">
                    <form action="{{ url()->full() }}" method="GET">
                        <div class="searching">
                            <span class="search-icons material-symbols-outlined">
                                search
                            </span>
                            <input type="search" name="search" value="{{ $search }}" class="search-inputs" placeholder="Search...">
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </section>

    <section class="latest-blog bg-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="section-title">
                        <h2 class="mt-3 content-title text-white">Karir</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach ($karir as $row)
                    <div class="col-lg-3 col-md-6 mb-5">
                        <div class="card bg-white border-0">
                            <img src="/upload/career/{{ $row->career_image }}" alt="" class="img-fluid rounded">
                            <div class="card-body mt-2">
                                <h3 class="mt-3 title-karir">
                                    <a href="#">
                                        {{ Str::limit($row->career_title, 50, '...') }}
                                    </a>
                                </h3>
                                <p>{!! Str::limit($row->career_content, 100, '...') !!}</p>
                                <a href="/artikel-karirdetail/{{ $row->slug }}" class="btn btn-small btn-solid-border btn-round-full">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

@endsection
