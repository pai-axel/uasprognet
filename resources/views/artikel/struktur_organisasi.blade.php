@extends('artikel/template/app')


@section('title', 'Struktur')

@section('content')

<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Struktur Organisasi</span>
          <h1 class="text-capitalize mb-4 text-lg">Struktur Organisasi</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Struktur Organisasi</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container">
            <div class="tree">
                            <div class="section-title-fp">
                                <h1 class="text-center mt-5">Pembina</h1>
                            </div>
                            <ul>
        
                            @foreach ($struktur_organisasi as $row)
                    <li data-aos="flip-up">
                        <a ><img src="/upload/struktur_organisasi/{{$row->image_anggota}}">
                            <p class="name-struktur">{{$row->nama_anggota}}</p>
                            <span>{{$row->posisi}}</span>
                        </a>
                    </li>
                    @endforeach
               
        </ul>

                            
                </div>
                </div>

                

@endsection