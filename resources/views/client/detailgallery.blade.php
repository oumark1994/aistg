@extends('client.template')
@section('container')
<section id="portfolio-details" class="portfolio-details">
    <div class="container mt-5">

      <div class="row gy-4">

        <div class="col-lg-6 mt-5">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="/storage/gallerie_images/{{$gallerie->galery_image}}" class="img-thumbnail" alt="">
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-5">
          <div class="portfolio-info">
            <h3>Detail gallery</h3>
            <ul>
              <li><strong>Title</strong>:{{$gallerie->title}}</li>
              <li><strong>Categorie</strong>: {{$gallerie->categorie}}</li>
            </ul>
          </div>
          <div class="portfolio-description">
            <h2>{{$gallerie->title}}</h2>
            <p>
                {{$gallerie->description}} </p>
          </div>
        </div>

      </div>

    </div>
  </section>
  @endsection