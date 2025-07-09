@extends('artikel/template/app')


@section('title', 'Testimoni')

@section('content')


<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Testimoni</span>
          <h1 class="text-capitalize mb-4 text-lg">Testimoni</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Testimoni</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

 <!-- client section -->

 <div class="section">
 <section class="client_section layout_padding section_pr">
    <div class="container">
      <div class="heading_container">
        <h2>
          Testimoni
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel client_owl_carousel">
        @foreach ($testimoni as $row)
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="/upload/testimoni/{{$row->testi_client_avatar}}" alt="" />
              </div>
              <div class="detail-box">
                <h5>
                {{$row->testi_client_name}}
                </h5>
                <p>
                {!!$row->testi_client_content!!}
                </p>
              </div>
            </div>
          </div>
      @endforeach
        </div>
      </div>
    </div>
  </section>
  </div>

@endsection