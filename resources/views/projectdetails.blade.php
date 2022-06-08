<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>My portfolio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
 
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/owl.carousel/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/venobox/venobox.css')}}" rel="stylesheet">

  @livewireStyles

  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: DevFolio - v2.4.1
  * Template URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body id="page-top">
  <div class="intro intro-single route bg-image" data-aos="flip-left" data-aos-duration="3000" style="background-image: url({{asset('storage/project_images/'.$project->image)}})">
    <div class="overlay-mf"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <h2 class="intro-title mb-4">Project  Details</h2>
          <ol class="breadcrumb d-flex justify-content-center">
            <li class="breadcrumb-item">
              <a href="{{url($project->url)}}" target="_blank">View project</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{url('/')}}" target="_blank">Home</a>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <main id="main">

    <!-- ======= Portfolio Details Section ======= -->
    <section class="portfolio-details" data-aos="zoom-out" data-aos-duration="3000">
      <div class="container">

        <div class="portfolio-details-container">

          <div class="owl-carousel">
            <a target="_blank" href="{{url($project->url)}}">

            <img src="{{asset('/storage/project_images/'.$project->image)}}" class="img-resposive " width="95%" height="45%" alt="">
            </a>
          </div>

          <div class="portfolio-info" data-aos="fade-right"
          data-aos-duration="2000">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>: {{$project->title}}</li>
              <li><strong>Client</strong>:{{$project->client}}</li>
              <li><strong>Project date</strong>: {{$project->date}}</li>
              <li><strong>Project URL</strong>: <a target="_blank" href="{{url($project->url)}}">{{$project->url}}</a></li>
            </ul>
          </div>

        </div>

        <div class="portfolio-description" data-aos="fade-left"
        data-aos-duration="3500">
          <h2>{{$project->title}}</h2>
          <p>
           {{$project->details}}
          </p>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
  @livewireScripts
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="copyright-box">
            <p class="copyright">&copy; Copyright <strong>Chadotec</strong>. All Rights Reserved</p>
            <div class="credits">
             
              Designed by <a href="https://chadotec..com/">Chadotec</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('vendor/counterup/jquery.counterup.min.js')}}"></script>
  <script src="{{asset('vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('vendor/typed.js/typed.min.js')}}"></script>
  <script src="{{asset('vendor/venobox/venobox.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      offset:120,
      duration:1000,
    });
  </script>

</body>

</html>