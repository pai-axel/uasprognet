@extends('artikel/template/app')



@section('title', 'Faq')

@section('content')

<div class="main-wrapper">
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">FAQ</span>
                        <h1 class="text-capitalize mb-4 text-lg">FAQ</h1>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
                            <li class="list-inline-item"><span class="text-white">/</span></li>
                            <li class="list-inline-item"><a href="#" class="text-white-50">FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="accordions-card">
<div class="accordions">
      <div class="image-box">
        <img src="/upload/assets/faq.png" alt="" />
      </div>
      <div class="accordions-text">
        <div class="title">FAQ</div>
        <ul class="faq-text">
        @foreach ($faq as $row)
          <li>
            <div class="question-arrow">
              <span class="question">{{$row->question}}</span>
              <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <p>{{$row->answer}}</p>
            <span class="line"></span>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    </div>
@endsection