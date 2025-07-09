@extends('artikel/template/app')


@section('title', 'Search')

@section('content')

<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Search : {{ $query }}</span>
          <h1 class="text-capitalize mb-4 text-lg">Search</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Search : {{ $query }}</a></li>
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
                    <form action="{{ url('/search') }}" method="GET">
                        <div class="searching">
                            <span class="search-icons material-symbols-outlined">
                                search
                            </span>
                            <input type="search" name="query" value="" class="search-inputs" placeholder="Search...">
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </section>

    @if ( ($berita->isEmpty() && $artikel->isEmpty() && $karir->isEmpty()  ))
<div class="not-found">
<div class="d-flex justify-content-center">
<img class="img-fluid w-100 img-notfound" src="/upload/assets/404.png" style="object-fit: contain;">
</div>
    </div>
@else

    <div class="mt-5 mb-5">
    <!-- Berita Section -->
    @if (!$berita->isEmpty())
     <div class="mt-4">
     @foreach ($berita as $row)
    <div class="container" data-aos="zoom-in-down">
        <div class="d-flex justify-content-center">
            <div class="card w-100">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a href="/{{ $row->slug }}">
                            <img src="/upload/berita/{{$row->berita_sampul_1}}" class="card-search" alt="Dummy Image" height="180px" style="object-fit: cover">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/{{ $row->slug }}">
                                <?php 
                                    $title = $row->berita_title;
                                    echo strlen($title) > 100 ? substr($title, 0, 100) . '...' : $title;
                                    ?></a></h5>
                                </a>
                            </h5>
                            <p class="card-text card-subtitle">
                            <?php 
                                    $subtitle = $row->berita_konten_1;
                                    echo strlen($subtitle) > 140 ? substr($subtitle, 0, 140) . '...' : $subtitle;
                                    ?></p>
                            </p>
                            <p class="card-text card-subtitle">
                                <small class="text-muted">{{$row->created_at->format('d F Y')}}</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @endforeach
    </div>

    @endif

    @if (!$artikel->isEmpty())
    <!-- Artikel Section -->
    @foreach ($artikel as $row)
    <div class="container" data-aos="zoom-in-down">
        <div class="d-flex justify-content-center">
            <div class="card w-100">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a href="/artikel-artikeldetail/{{ $row->slug }}">
                            <img src="/upload/article/{{$row->artikel_sampul}}" class="card-search" alt="Dummy Image" height="180px" style="object-fit: cover">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/artikel-artikeldetail/{{ $row->slug }}">
                                <?php 
                                    $title = $row->artikel_title;
                                    echo strlen($title) > 100 ? substr($title, 0, 100) . '...' : $title;
                                    ?>
                                </a>
                            </h5>
                            <p class="card-text card-subtitle">
                            <?php 
                                    $subtitle = $row->artikel_konten;
                                    echo strlen($subtitle) > 140 ? substr($subtitle, 0, 140) . '...' : $subtitle;
                                    ?>
                            </p>
                            <p class="card-text card-subtitle">
                                <small class="text-muted">{{$row->created_at->format('d F Y')}}</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @endif

    @if (!$karir->isEmpty())
    <!-- Karir Section -->
    @foreach ($karir as $row)
    <div class="container" data-aos="zoom-in-down">
        <div class="d-flex justify-content-center">
            <div class="card w-100">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a href="/artikel-karirdetail/{{ $row->slug }}">
                            <img src="/upload/career/{{$row->career_image}}" class="card-search" alt="Dummy Image" height="180px" style="object-fit: cover">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/artikel-karirdetail/{{ $row->slug }}">
                                <?php 
                                    $title = $row->career_title;
                                    echo strlen($title) > 100 ? substr($title, 0, 100) . '...' : $title;
                                    ?>
                                </a>
                            </h5>
                            <p class="card-text card-subtitle">
                            <?php 
                                    $subtitle = $row->career_content;
                                    echo strlen($subtitle) > 140 ? substr($subtitle, 0, 140) . '...' : $subtitle;
                                    ?>
                            </p>
                            <p class="card-text card-subtitle">
                                <small class="text-muted">{{$row->created_at->format('d F Y')}}</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    @endif
    <div class="d-flex justify-content-center mb-5">
    {{ $artikel->appends(['query' => $query])->links() }}
</div>

@endif
    @endsection