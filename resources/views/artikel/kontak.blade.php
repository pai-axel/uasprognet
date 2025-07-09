@extends('artikel/template/app')


@section('title', 'Kontak')

@section('content')


<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Kontak</span>
          <h1 class="text-capitalize mb-4 text-lg">Kontak</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Kontak</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Start Contact Us -->
<section class="contact-us section">
			<div class="container">
				<div class="inner">
					<div class="row"> 
						<div class="col-lg-6">
							<div class="contact-us-left">
								<!--Start Google-map -->
								<iframe src="{{$options->maps}}"><a href="https://www.gps.ie/" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="google-iframe"></iframe>

								<!-- <div id="myMap"></div> -->
								<!--/End Google-map -->
							</div>
						</div>
						<div class="col-lg-6">
							<div class="contact-us-form">
								<h2>{{$options->company_name}}</h2>
								<p>{{$options->product_footer}}</p>
								<div class="choose-left mt-5">
							<h4 class="mb-4 font-weight-bold">
							<i class="fa-solid fa-location-dot mr-2"></i> Lokasi 
							</h4>
							<p class="mb-4">{{$options->location}}</p>
							<h4 class="mb-4 font-weight-bold">
							
							<i class="fas fa-envelope mr-2"></i> Gmail
							</h4>
							<p class="mb-4"><i class="fa-solid fa-check-double mr-2"></i>{{$options->email}}</p>
							<h4 class="mb-4 font-weight-bold">
							<i class="fa-solid fa-phone mr-2"></i> Nomor Telepon
							</h4>
							<p class="mb-4"><i class="fa-solid fa-check-double mr-2"></i>Admin +{{$options->call}}</p>
						</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</section>
		<!--/ End Contact Us -->

@endsection

