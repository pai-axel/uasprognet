@extends('artikel/template/app')



@section('title', 'Artikel')

@section('content')

<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">{{ Str::limit($artikel->artikel_title, 30, '...') }}</span>
          <h1 class="text-capitalize mb-4 text-lg">Artikel Detail</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">{{ Str::limit($artikel->artikel_title, 30, '...') }}</a></li>
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
			<img src="/upload/article/{{$artikel->artikel_sampul}}" alt="{{$artikel->artikel_title}}" class="img-fluid rounded">

			<div class="blog-item-content bg-white p-4 rounded">
            <div class="meta">
										<div class="meta-left">
											<span class="author">{{$artikel->user->name}}</span>
											<span class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$artikel->created_at->diffForHumans()}}</span>
										</div>
									</div>

				<h2 class="mt-3 mb-4"><a href="#">{{$artikel->artikel_title}}</a></h2>

				<p class="text-blog">{!!$artikel->artikel_konten!!}</p>
				

                                    <div class="tag-bottom">
									<span class="text-content"> Tag:</span>
									<div class="tag">
									@foreach($artikel->tag_artikel as $row)
                                <li><a href="{{ route('tag_artikel', $row->slug) }}">{{$row->tag_artikel_name}}</a></li>
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
	

	<div class="sidebar-widget latest-post card border-0 p-4 mb-3">
		<h5>Latest Artikel</h5>
		@foreach ($recentArtikel as $artikel)
        <div class="media border-bottom py-3">
            <a href="/artikel-artikeldetail/{{ $artikel->slug }}"><img class="mr-4" src="/upload/article/{{$artikel->artikel_sampul}}" alt=""></a>
            <div class="media-body">
                <h6 class="my-2"><a href="/artikel-artikeldetail/{{ $artikel->slug }}">{{$artikel->artikel_title}}</a></h6>
                <span class="text-sm text-muted">{{$artikel->created_at->format('d F Y')}}</span>
            </div>
        </div>
@endforeach
	</div>

	<div class="sidebar-widget bg-white rounded tags p-4 mb-3">
		<h5 class="mb-4">Tags</h5>
		@foreach ($recentTagArtikel as $tag_artikel)
		<a href="{{ route('tag_artikel', ['slug' => $tag_artikel->slug]) }}">{{ $tag_artikel->tag_artikel_name }}</a>
		@endforeach
	</div>
</div>
            </div>   
        </div>
    </div>
</section>


@endsection

