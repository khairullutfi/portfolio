@extends('layouts.detail')

@section('title')
Portfolio Khairul lutfi
@endsection

@section('content')
<main id="main">

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">
              @foreach ($design->galleries as $gallery)
              <div class="swiper-slide">
                <img src="{{ Storage::url($gallery->photos)}}" class="w-100" alt="">
              </div>
              @endforeach
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="about-author">
            <div class="author-desc">
              <p><b>Name:</b> {{$design->name}}</p>
              <p><b>Category:</b>{{$design->category->name}}</p>
              <p><b>Client:</b> {{$design->user->name}}</p>
              <p><b>Project date :</b> {{$design->date}}</p>
              <p><b>title :</b> {{$design->title}}</p>
              <p><b>deskripsi</b> </p>
              <p> {!! $design->description !!}</p>
            </div>
            <!-- /.author-desc -->
          </div> <!-- /.about-author -->
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Details Section -->
</main>
@endsection