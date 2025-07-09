@extends('artikel/template/app')

@section('title', 'Nilai Nilai Perusahaan')

@section('content')

<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Nilai-nilai Perusahaan</span>
          <h1 class="text-capitalize mb-4 text-lg">Nilai-Nilai Perusahaan</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Nilai-nilai Perusahaan</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="section">
    <ol class="ol-cards alternate">
        @foreach ($value_company as $row)
            <li style="--ol-cards-color-accent: {{ $row->value_color }}">
                <div class="step">
                    <i class="fa-solid fa-star"></i>
                </div>
                <div class="title">{{ $row->value_title }}</div>
                <div class="content">{{ $row->value_content }}</div>
            </li>
        @endforeach
    </ol>
</div>

 @endsection