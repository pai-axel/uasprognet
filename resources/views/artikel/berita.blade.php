@extends('artikel/template/app')

@isset($kategori_berita_dipilih)
    @section('title')
        Kategori Berita : {{$kategori_berita_dipilih->kategori_berita_name}}
    @endsection
    @section('kategori', 'active')
@endisset

@isset($tag_berita_dipilih)
    @section('title')
        Tag Berita : {{$tag_berita_dipilih->tag_berita_name}}
    @endsection
    @section('tag', 'active')
@endisset




@section('title', 'Berita ')
@section('berita', 'active')


@section('content')

<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Berita</span>
          <h1 class="text-capitalize mb-4 text-lg">Berita</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Berita</a></li>
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

<div class="blog section" id="blog">
			<div class="container">
			<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>@yield('title')</h2>
						</div>
					</div>
				</div>
				<div class="row">
				@foreach ($berita as $row)
					<div class="col-lg-4 col-md-6 col-12" data-aos="zoom-in-down">
						<!-- Single Blog -->
						<div class="single-news mb-5">
							<div class="news-head">
							<a href="/{{$row->slug}}"><img src="/upload/berita/{{$row->berita_sampul_1}}" alt="#"></a>
                            <div class="kategori">Berita</div> 
							</div>
							<div class="news-body">
								<div class="berita-content">
									<div class="date">{{$row->created_at->format('d F Y')}}</div>
									<h2><a href="/{{ $row->slug }}">
									<?php 
                                    $title = $row->berita_title;
                                    echo strlen($title) > 50 ? substr($title, 0, 50) . '...' : $title;
                                    ?>
									</a></h2>
									<p class="text">
									<?php 
                                    $subtitle = $row->berita_konten_1;
                                    echo strlen($subtitle) > 140 ? substr($subtitle, 0, 140) . '...' : $subtitle;
                                    ?>
									</p>
								</div>
							</div>
						</div>
						<!-- End Single Blog -->
					</div>
					@endforeach


				
				</div>
			</div>
		</section>

    <div class="d-flex justify-content-center mb5">
    {{ $berita->links() }}
</div>


		@endif
@endsection