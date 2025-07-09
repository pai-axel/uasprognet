@extends('artikel/template/app')


@section('title', 'Portfolio')

@section('content')

<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Portfolio</span>
          <h1 class="text-capitalize mb-4 text-lg">Portfolio</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Portfolio</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- section portfolio start -->
<section class="section portfolio pb-0">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2 class="mt-3 content-title ">We have done lots of works, lets check some</h2>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row portfolio-gallery">

		@foreach ($gallery as $row)
			<div class="col-lg-4 col-md-6">
				<div class="portflio-item position-relative mb-4">
					<a href="/upload/gallery/{{$row->gallery_image}}" class="popup-gallery">
						<img src="/upload/gallery/{{$row->gallery_image}}" alt="" class="img-fluid w-100">

						<i class="ti-plus overlay-item"></i>
						<div class="portfolio-item-content">
							<h3 class="mb-0 text-white">{{$row->gallery_title}}</h3>
						</div>
					</a>
				</div>
			</div>
@endforeach
		</div>
	</div>
</section>


<div class="d-flex justify-content-center mb-5">
    {{ $gallery->links() }}
</div>
<!-- section portfolio END -->

@endsection