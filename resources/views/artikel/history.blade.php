@extends('artikel/template/app')


@section('title', 'Sejarah')

@section('content')

<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Sejarah</span>
          <h1 class="text-capitalize mb-4 text-lg">Sejarah</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="/" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Sejarah</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="timeline-section">
	<div class="timeline-items">
	@foreach ($about as $row)
		<div class="timeline-item" data-aos="fade-up">
			<div class="timeline-dot"></div>
			<div class="timeline-date">{{$row->about_year}}</div>
			<div class="timeline-content shadow-lg">
				<h3>{{$row->about_title}}</h3>
				<p>{!!$row->about_content!!}</p>
				<div class="timeline-img">
				<img src="/upload/about/{{$row->about_image}}" alt="Timeline Image" />
				</div>
			</div>
		</div>
		@endforeach

        
	</div>
</section>


@endsection
