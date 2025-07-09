@extends('artikel/template/app')


@isset($tag_artikel_dipilih)
    @section('title')
        Tag : {{$tag_artikel_dipilih->tag_artikel_name}}
    @endsection
    @section('tag_artikel', 'active')
@endisset


@section('title', 'Artikel')
@section('berita', 'active')

@section('content')


<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Artikel</span>
          <h1 class="text-capitalize mb-4 text-lg">Artikel</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Artikel</a></li>
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

    @if (session('search'))
    <div class="row mt-4 text-center">
        <div class="col-md-12">
            <div class="alert alert-info" role="alert">
                {{ session('search') }}
            </div>
        </div>
    </div>
@else

<div class="section">
<section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
          <h2>@yield('title')</h2>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="row">
          @foreach ($artikel as $row)
            <div class="col-lg-4">
              <div class="meeting-item">
                <div class="thumb">
                  <div class="price">
                    <span>Artikel</span>
                  </div>
                  <a href="/artikel-artikeldetail/{{$row->slug}}"><img src="/upload/article/{{$row->artikel_sampul}}" alt="New Lecturer Meeting"></a>
                </div>
                <div class="down-content">
                  <div class="date">
                  @php
                        $day = $row->created_at->format('d'); // Hanya tanggal
                        $month = $row->created_at->format('M'); // Nama bulan singkat
                    @endphp
                    <h6>{{ $month }} <span>{{ $day }}</span></h6>
                  </div>
                  <a href="/artikel-artikeldetail/{{$row->slug}}">
                    <h4>
                      <?php 
                      $title = $row->artikel_title;
                      echo strlen($title) > 50 ? substr($title, 0, 50) . '...' : $title;
                      ?>
                    </h4>
                  </a>
                  <p>
                  <?php 
                      $subtitle = $row->artikel_konten;
                      echo strlen($subtitle) > 100 ? substr($subtitle, 0, 100) . '...' : $subtitle;
                      ?>
                  </p>
                  <a href="/artikel-artikeldetail/{{$row->slug}}" class="read-more">Selengkapnya</a>
                </div>
              </div>
            </div>
           @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>

  <div class="d-flex justify-content-center mb-5">
    {{ $artikel->links() }}
</div>


  @endif
@endsection