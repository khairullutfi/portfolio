@extends('layouts.app')

@section('title')
    Portfolio Khairul lutfi
@endsection

@section('content')
      <!-- Herooo broo -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <canvas id="canva"></canvas>
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Khairul Lutfi</h1>
      <p>I'm <span class="typed" data-typed-items="Designer, Developer, Freelancer, Editing"></span></span></p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>My Design</h2>
        <p>
          My portfolio contains figma designs that I designed myself, by self-taught. I hope you all like my design,
          don't forget to visit my dribble website too. and i also like to design using photoshop and corel draw.
          <!-- portofolio saya berisi design figma yang saya design sendiri, dengan belajar otodidak. semoga kalian semua suka dengan design saya, jangan lupa juga mampi di website dribble saya. dan saya juga suka design menggunakan aplikasi photoshop dan corel draw -->
        </p>
      </div>

      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <ul id="portfolio-flters">
              @foreach ($categories as $category)
                 <button class="btn btn-link" style="text-decoration:none;">
                   <a style="text-decoration:none;color: #242D49;font-weight: 600;" href="{{route('categories-detail', $category->slug)}}">{{$category->name}}</a>
                 </button>
            @endforeach
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @forelse ($designs as $design)
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="{{Storage::url($design->galleries->first()->photos)}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{$design->name}}</h4>
              <p>{{$design->date}}</p>
              <div class="portfolio-links">
                <a href="{{Storage::url($design->galleries->first()->photos)}}" data-gallery="portfolioGallery" class="portfolio-lightbox"
                  ><i class="bx bx-plus"></i></a>
                <a href="{{route('detail', $design->slug)}}" class="portfolio-details-lightbox" data-glightbox="type: external"
                  title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>
 
        @empty
            
        @endforelse   
      </div>
       <div class="row justify-content-center">
        <div class="col-4">
          {{$designs->links()}}
        </div>
      </div>
    </div>
  </section>
  <!-- End Portfolio Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact</h2>
      </div>

      <div class="row mt-1">

        <div class="col-lg-4">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>Griya asri 1, tambun selatan. bekasi</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>khairul.copz98@gmail.com</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+62 895 3324 65783</p>
            </div>

          </div>

        </div>

        <div class="col-lg-8 mt-5 mt-lg-0">
             @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error}} </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
          <form action="{{route('contact.store')}}" method="POST" role="form" class="php-email-form">
             @csrf
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="messege" id="messege" rows="5"></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>

        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
@endsection