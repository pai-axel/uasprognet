@extends('artikel/template/app')


@isset($kategori_berita_dipilih)
    @section('title')
        Kategori : {{$kategori_berita_dipilih->kategori_berita_name}}
    @endsection
    @section('kategori_berita', 'active')
@endisset

@isset($tag_berita_dipilih)
    @section('title')
        Tag : {{$tag_berita_dipilih->tag_berita_name}}
    @endsection
    @section('tag_berita', 'active')
@endisset


@section('title', 'Berita ')

@section('content')

<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">{{ Str::limit($berita->berita_title, 30, '...') }}</span>
          <h1 class="text-capitalize mb-4 text-lg">Berita Detail</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">{{ Str::limit($berita->berita_title, 30, '...') }}</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section blog-wrap bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
	<div class="col-lg-12 mb-5">
		<div class="single-blog-item">
			<img src="/upload/berita/{{$berita->berita_sampul_1}}" alt="{{$berita->berita_title}}" class="img-fluid rounded">

			<div class="blog-item-content bg-white p-4 rounded">
            <div class="meta">
										<div class="meta-left">
											<span class="author">{{$berita->user->name}}</span>
											<span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$berita->created_at->diffForHumans()}}</span>
										</div>
									</div>

				<h2 class="mt-3 mb-4"><a href="#">{{$berita->berita_title}}</a></h2>

				<p class="text-blog">{!!$berita->berita_konten_1!!}</p>

                <div class="image-gallery">
											<div class="row">
												<div class="col-lg-6 col-md-6 col-12 d-flex justify-content-center">
													<div class="single-image mb-3">
														<img src="/upload/berita/{{$berita->berita_sampul_2}}" alt="#" width="320px" height="214px">
													</div>
												</div>
												<div class="col-lg-6 col-md-6 col-12 d-flex justify-content-center">
													<div class="single-image">
														<img src="/upload/berita/{{$berita->berita_sampul_3}}" alt="#" width="320px" height="214px">
													</div>
												</div>
											</div>
										</div>

				

				<p class="text-blog">{!!$berita->berita_konten_2!!}</p>

				<div class="tag-bottom">
									<span class="text-content"> Kategori:</span>
									<div class="tag">
                                    <li>  <li><a href="{{ route('kategori_berita', $berita->kategori_berita->slug) }}">{{$berita->kategori_berita->kategori_berita_name}}</a></li></li>
                                    </div>

									</div>

                                    <div class="tag-bottom">
									<span class="text-content"> Tag:</span>
									<div class="tag">
									@foreach($berita->tag_berita as $row)
                                <li><a href="{{ route('tag_berita', $row->slug) }}">{{$row->tag_berita_name}}</a></li>
                            @endforeach
                                    </div>

									</div>
                        </div>
                    </div>
                </div>


</div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-wrap">
	
                <div class="sidebar-widget bg-white category rounded p-4 mb-3">
		<h5 class="mb-4">Categories</h5>

    <ul class="list-unstyled">
  @foreach ($recentKategoriBerita as $kategori_berita)
    <li class="align-items-center">
      <a href="{{ route('kategori_berita', ['slug' => $kategori_berita->slug]) }}">
        {{ $kategori_berita->kategori_berita_name }}
      </a>
      <span>({{ $kategori_berita->berita_count }})</span> <!-- Menampilkan jumlah artikel -->
    </li>
  @endforeach
</ul>


	<div class="sidebar-widget latest-post card border-0 mb-3">
		<h5>Latest Posts</h5>
		@foreach ($recentBerita as $berita)
        <div class="media border-bottom py-3">
            <a href="/{{ $berita->slug }}"><img class="mr-4" src="/upload/berita/{{$berita->berita_sampul_1}}" alt=""></a>
            <div class="media-body">
                <h6 class="my-2"><a href="/{{ $berita->slug }}">{{$berita->berita_title}}</a></h6>
                <span class="text-sm text-muted">{{$berita->created_at->format('d F Y')}}</span>
            </div>
        </div>
@endforeach
	</div>

	<div class="sidebar-widget bg-white rounded tags mb-3">
		<h5 class="mb-4">Tags</h5>
		@foreach ($recentTagBerita as $tag_berita)
		<a href="{{ route('tag_berita', ['slug' => $tag_berita->slug]) }}">{{ $tag_berita->tag_berita_name }}</a>
		@endforeach
	</div>
</div>
            </div>   
        </div>
    </div>
</section>


@endsection

