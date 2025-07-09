@extends('artikel/template/app')

@isset($tag_berita_dipilih)
     @section('title')
        Tag Berita : {{$tag_berita_dipilih->tag_berita_name}}
    @endsection
@endisset

@isset($kategori_berita_dipilih)
    @section('title')
        Kategori : {{$kategori_berita_dipilih->kategori_berita_name}}
    @endsection
    @section('kategori', 'active')
@endisset

@isset($author_dipilih)
    @section('title')
        Author : {{$author_dipilih->name}}
    @endsection
    @section('author', 'active')
@endisset

@isset($home)
    @section('title', 'Semua Berita')
    @section('home', 'active')
@endisset

@section('content')
<style>
   .slider_section {
    -webkit-box-flex: 1;
        -ms-flex: 1;
            flex: 1;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
        -ms-flex-direction: column;
            flex-direction: column;
    color: #ffffff;
  }
  
  .slider_section #customCarousel1 {
    width: 100%;
    height: 630px;
  }
  
  .slider_section .box {
    -webkit-box-flex: 1;
        -ms-flex: 1;
            flex: 1;
    width: 100%;
    display: -webkit-box;
    display: -ms-flexbox;
   
    display: flex;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    position: relative;
  }
  
  .slider_section .box:before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background-image: url('{{ asset('/upload/options/' . $options->banner_image) }}');
    background-size: cover;
    -webkit-clip-path: polygon(0 10%, 100% 0%, 100% 100%, 0 90%);
            clip-path: polygon(0 10%, 100% 0%, 100% 100%, 0 90%);
    z-index: -1;
  }
  
  .slider_section .box .detail-box {
    -webkit-box-flex: 1;
        -ms-flex: 1;
            flex: 1;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
        -ms-flex-direction: column;
            flex-direction: column;
    padding: 0 15px;
    margin-top: 18%;
  }
  
  .slider_section .box .detail-box h1 {
    text-transform: uppercase;
  }
  
  .slider_section .box .detail-box .btn-box {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-top: 35px;
  }
  
  .slider_section .box .detail-box .btn-box a {
    width: 165px;
    text-align: center;
    margin: 0 5px;
  }
  
  .slider_section .box .detail-box .btn-box .btn-1 {
    display: inline-block;
    background-color: #e4f4ec;
    color: #44ac64;
    padding: 12px 10px;
    border-radius: 0;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
    border: none;
    border-radius: 10px;
    font-weight: 700;
  }
  

  .slider_section .box .detail-box .btn-box .btn-1:hover {
    -webkit-transform: translateY(-5px);
            transform: translateY(-5px);
    -webkit-box-shadow: 1.5px 1.5px 5px 0 rgba(0, 0, 0, 0.3);
            box-shadow: 1.5px 1.5px 5px 0 rgba(0, 0, 0, 0.3);
            background-color: #cde3d5; /* Warna lebih gelap */
            color: #369a53; /* Warna teks lebih gelap */
  }
  
  .slider_section .box .detail-box .btn-box .btn-2 {
    display: inline-block;
    background-color: #44ac64;
    color: white;
    padding: 12px 10px;
    font-weight: 700;
    border-radius: 10px;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
    border: none;
  }
  
  .slider_section .box .detail-box .btn-box .btn-2:hover {
    -webkit-transform: translateY(-5px);
            transform: translateY(-5px);
    -webkit-box-shadow: 1.5px 1.5px 5px 0 rgba(0, 0, 0, 0.3);
            box-shadow: 1.5px 1.5px 5px 0 rgba(0, 0, 0, 0.3);
            background-color: #3b9455; /* Warna lebih gelap */
            color: #f8f8f8; /* Warna teks sedikit lebih terang */
  }
  
  .slider_section .carousel_btn-box {
    width: 50px;
    height: 110px;
    display: -webkit-box;
    display: -ms-flexbox;
    margin-left: 70px;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
        -ms-flex-direction: column;
            flex-direction: column;
    -webkit-box-pack: justify;
        -ms-flex-pack: justify;
            justify-content: space-between;
    position: absolute;
    top: 50%;
    left: 0;
    -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
  }


  
  
  .slider_section .carousel_btn-box .carousel-control-prev,
  .slider_section .carousel_btn-box .carousel-control-next {
    position: unset;
    width: 50px;
    height: 50px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    font-size: 22px;
    color: white;
    background-color: #44ac64;
    -webkit-transition: all 0.2s;
    transition: all 0.2s;
    opacity: 1;
    border-radius: 10px;
    border: 3px solid white;
  }
  
  .slider_section .carousel_btn-box .carousel-control-prev:hover,
  .slider_section .carousel_btn-box .carousel-control-next:hover {
    background-color: #e4f4ec;
    color: #44ac64;
  }

  @media (max-width: 991px) {
    .slider_section .navbar-brand {
      display: none;
    }
  
    .slider_section .box {
      padding: 150px 0;
    }
  
    .slider_section .box .detail-box {
      align-items: center;
      text-align: center;
    }
  
    .slider_section .carousel_btn-box {
      flex-direction: row;
      margin: auto;
      position: unset;
      transform: none;
      width: 110px;
      height: 50px;
      margin-top: 45px;
    }

    .slider_section .box::before {
      width: calc(100% - 25px);
    }

    .sub_page .slider_section .box::before {
        width: calc(100% - 22px);
      }
  
  }

  @media (max-width: 576px) {
    .slider_section .box .detail-box .btn-box {
      flex-direction: column;
      align-items: center;
    }
  
    .slider_section .box .detail-box .btn-box a {
      margin: 5px 0;
    }
  
    .slider_section .box {
      padding-left: 15px;
    }
  }
  </style>

        @isset($banner)
        <section class="slider_section position-relative">
  <div class="box">
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        @foreach ($banner as $key => $row)
          <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <div class="row">
              <div class="col-lg-10 ml-auto">
                <div class="detail-box">
                  <h1>
                    {{$row->banner_title}}
                  </h1>
                  <div class="text-little">
                    <p>{{$row->banner_sub}}</p>
                  </div>
                  <div class="btn-box">
                    <a href="/artikel-vision" class="btn-1">
                      About
                    </a>
                    <a href="/artikel-kontak" class="btn-2">
                      Contact us
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="carousel_btn-box">
        <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
          <i class="fa fa-angle-left" aria-hidden="true"></i>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
          <i class="fa fa-angle-right" aria-hidden="true"></i>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</section>
@endisset

    <!-- end slider section -->
        <!-- we do section -->
        @isset($product)
  <section class="wedo_section layout_padding section_pr">
    <div class="container">
      <div class="heading_container">
        <h2><span>What</span> We do</h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel wedo_owl_carousel">
        @foreach ($product as $row)
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="/upload/product/{{$row->product_image}}" alt="" />
              </div>
              <div class="detail-box">
                <h5>
                {{$row->product_title}}
                </h5>
                <p>
                <p>{!! Str::limit($row->product_content, 100, '...') !!}</p>
                </p>
                <a href="/artikel-productdetail/{{$row->slug}}">
                  Selengkapnya
                </a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  @endisset

  <!-- end we do section --> 

  <!-- choose section -->
  @isset($feature)
  <section class="choose_section layout_padding section_pl ">
    <div class="container py_mobile_45">
      <div class="heading_container heading_center">
        <h2>Why <span>choose us</span></h2>
      </div>
      <div class="row">
      @foreach ($feature as $row)
        <div class="col-md-4">
          <div class="box ">
            <div class="box_content">
              <div class="img-box">
                <img src="/upload/feature/{{$row->feature_image}}" width="75" height="auto">
              </div>
              <div class="detail-box">
                <h5>
                {{$row->feature_title}}
                </h5>
                <p>
                {{$row->feature_content}}
                </p>
              </div>
            </div>
          
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endisset

  <!-- end choose section -->


   <!-- blog section -->
   @isset($berita)
   <section class="blog_section layout_padding section_pr">
    <div class="container">
      <div class="heading_container">
        <h2><span> Our </span>Blog</h2>
      </div>
      <div id="customCarousel2" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        @foreach ($berita as $key => $row)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <div class="row">
              <div class="col-md-7">
                <div class="blog_content">
                  <div class="img-box">
                    <img src="/upload/berita/{{$row->berita_sampul_1}}" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="blog_detail">
                  <h2>
                  {{$row->berita_title}}
                  </h2>
                  <p>
                    {!!$row->berita_konten_1!!}
                  </p>
                  <a href="/{{$row->slug}}">
                    Read More
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  @endisset

  <!-- end blog section -->
   

   <!-- contact section -->

   <section class="contact_section layout_padding section_pl ">
    <div class="container py_mobile_45">
      <div class="heading_container">
        <h2>Get <span>In Touch</span></h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
          <form action="{{ route('support-artikel.store') }}" method="POST">
            @csrf
              <div>
                <input type="text" placeholder="Full Name " id="client_name" name="client_name" />
              </div>
              <div>
                <input type="text" placeholder="Phone number"id="client_phone" name="client_phone" />
              </div>
              <div>
                <input type="email" placeholder="Email" id="client_email" name="client_email" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" id="client_text" name="client_text" />
              </div>
              <div class="d-flex ">
                <button type="submit">
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container">
            <div class="map">
            <div style="width: 100%">
            <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{{$options->maps}}"></iframe>
            </div>
              <!-- <div id="googleMap"></div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

   <!-- client section -->

   @isset($testimoni)
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
  @endisset

  <!-- end client section -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: '{{ session('error') }}',
    });
</script>
@endif

@endsection
