@extends('artikel/template/app')


@section('title', 'Vision')

@section('content')

<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Vision & Mission</span>
          <h1 class="text-capitalize mb-4 text-lg">Vision & Mission</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Vision & Mission</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Section About Start -->
<section class="section about-2 position-relative">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="about-item pr-3 mb-5 mb-lg-0">
					<h2 class="mt-5 mb-4 position-relative content-title">{{$banner1->banner_title}}</h2>
					<p class="mb-5">{{$banner1->banner_sub}}</p>

					
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="about-item-img">
					<img src="/upload/options/{{$options->banner_image}}" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Section About End -->
 
<section class="about-info section pt-0">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="about-info-item mb-4 mb-lg-0">
					<h3 class="mb-3"><span class="text-color mr-2 text-md ">01.</span>{{$banner2->banner_title}}</h3>
					<p>{{$banner2->banner_sub}}</p>
				</div>		
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="about-info-item mb-4 mb-lg-0">
					<h3 class="mb-3"><span class="text-color mr-2 text-md">02.</span>{{$banner3->banner_title}}</h3>
					<p>{{$banner3->banner_sub}}</p>
				</div>		
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="about-info-item mb-4 mb-lg-0">
					<h3 class="mb-3"><span class="text-color mr-2 text-md">03.</span>{{$banner4->banner_title}}</h3>
					<p>{{$banner4->banner_sub}}</p>
				</div>		
			</div>
		</div>
	</div>
</section>

@endsection