@extends('artikel/template/app')



@section('title', 'Faq')

@section('content')

<div class="main-wrapper">
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">{{$product->product_title}}</span>
                        <h1 class="text-capitalize mb-4 text-lg">Product Detail</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item"><a href="#" class="text-white-50">{{$product->product_title}}</a></li>
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
                    <div class="product-detail">
                    {{$product->product_title}}
                    </div>
					</div>
				</div>
			</div>
		</section>


        <!-- Feature Start -->
         <div class="section">
<div class="container-xxl overflow-hidden mission px-lg-0">
    <div class="container feature px-lg-0">
        <div class="row g-0 mx-lg-0">
            <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img src="/upload/product/{{$product->product_image}}" class="position-absolute img-fluid w-100 h-100" style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 feature-text wow fadeIn" data-wow-delay="0.1s">
                <div class=" ps-lg-0 text-mission">
                    <!-- <h1 class="mb-4">Hello gesss</h1> -->
                    <p class="mb-4 pb-2 mt-3">{!!$product->product_content!!}</p>
                    <div class="row g-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Feature End -->
@endsection