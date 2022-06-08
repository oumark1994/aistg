@extends('client.template')
@section('container')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
  
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
  
        <div class="carousel-inner" role="listbox">
  
          <!-- Slide 1 -->
          @foreach ($sliders as $slider )
          <div class="carousel-item {{$slider->active}}" style="background-image: url('/storage/slider_images/{{$slider->slider_image}}')">
            <div class="carousel-container">
              <div class="carousel-content container-fluid">
                <div class="row mt-5">
                  <div class="col-6"><h2 class="animate__animated animate__fadeInLeft">{{$slider->description1}}</span></h2>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInLeft scrollto">View more</a>
                  </div>
                  <div class="col-6"><h5 class="animate__animated animate__fadeInRight text-white mt-5 pt-5">{{$slider->description2}}</h5></div>

                </div>
               
              </div>
            </div>
          </div>
              
          @endforeach 
  
        </div>
  
  
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row ">
          @foreach ($abouts as $about )
            <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" style="background:url('/storage/about_images/{{$about->about_image}}')"></div>
            <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch">
              <div class="content d-flex flex-column justify-content-center">
                <h3>{{$about->about}}</h3>
                <p>
  {{$about->description}}           
     </p>
  
              
              </div><!-- End .content-->
               @endforeach
       
          </div>
        </div>
        <div class="row mt-5">
          @foreach ($devices as $device )
          <div class="col-lg-4">
            <div class="box">
              <h4>{{$device->title}}</h4>
              <p>{{$device->description}}</p>
            </div>
          </div>
@endforeach


        </div>
      </div>

        
         
       </div>
        </div>
       

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="partners" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Our Partners</h2>
          <p>We have made partnerships from schools to biggest organizations accross Ghana</p>
        </div>

        <div class="row">
          @foreach ($partners as $partner )
          <div class="col-lg-2 col-md-4 icon-box">
            <div class="icon"><img src="/storage/partner_images/{{$partner->partner_image}}" class="img-fluid" alt=""></div>
            <h4 class="title"><a href="">{{$partner->name}}</a></h4>
          </div>
          @endforeach



      </div>
    </section><!-- End Services Section -->

  

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio shadow-lg section-bg">
      <div class="container ">

        <div class="section-title">
          <h2>Our Gallery</h2>
          <p>Explore our which are in extremely love with eco friendly system.</p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              @foreach ($categories as  $categorie)
              <li data-filter=".{{$categorie->name}}">{{$categorie->name}}</li>    
              @endforeach
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
          @foreach ($galleries as  $gallerie)
          <div class="col-lg-3 col-md-6 portfolio-item {{$gallerie->categorie}}">
            <div class="portfolio-wrap">
              <img src="/storage/gallerie_images/{{$gallerie->galery_image}}" class="responsive" width="100%" height="350px" alt="">
              <div class="portfolio-info">
                <h4>{{$gallerie->title}}</h4>
                {{-- <p>{{$gallerie->description}}</p> --}}
                <div class="portfolio-links">
                  <a href="/storage/gallerie_images/{{$gallerie->galery_image}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                  <a href="detailgallery/{{$gallerie->id}}" title="More Details"><i class="bx bx-link"></i></a>

                </div>
              </div>
            </div>
          </div>
              
          @endforeach

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Team</h2>
          <p>Our dynamic teams who are dedicated to serve the Chadian community in Ghana</p>
        </div>

        <div class="row">
          @foreach ($teams as $team )
          <div class="col-xl-3 col-lg-3 col-md-6">
            <div class="member ">
              <img src="/storage/team_images/{{$team->team_image}}" class="img-fluid" width="100%" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>{{$team->name}}</h4>
                  <span>{{$team->position}}</span>
                  <div class="social">
                    <a href="{{$team->twitter}}"><i class="bi bi-twitter"></i></a>
                    <a href="{{$team->facebook}}"><i class="bi bi-facebook"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
              
          @endforeach
        </div>

      </div>
    </section><!-- End Team Section -->
{{-- 
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Pricing</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
            <div class="box recommended">
              <h3>Business</h3>
              <h4><sup>$</sup>19<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="box">
              <h3>Developer</h3>
              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section --> --}}
    <!-- Events -->

	<div class="events page_section" id="event">
		<div class="container">
			
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Upcoming Events</h1>
					</div>
				</div>
			</div>
			
			<div class="event_items">
@foreach ($events as $event )
				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">{{$event->event_day}}</div>
									<div class="event_month">{{$event->event_month}}</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">{{$event->title}}</a></div>
									<div class="event_location">{{$event->location}}</div>
									<p>{{$event->description}}</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image">
									<img src="/storage/event_images/{{$event->event_image}}" >
								</div>
							</div>

						</div>	
					</div>
				</div>

    
@endforeach

			

						</div>	
					</div>
				</div>

			</div>
				
		</div>
	</div>
<section id="blog mt-5">
  <div class="row ">
    <div class="col my-5">
      <div class="section_title text-center">
        <h1>Latest news</h1>
      </div>
    </div>
  </div>

    <div class="container shadow-lg">
      <div class="clients-carousel owl-carousel">
        @foreach ($blogs as $blog )
        <div class="single-box  shadow-lg bg-white p-3">
          <div class="img-area">
            <img src="/storage/blog_images/{{$blog->blog_image}}" class="img-responsive" width="100%" height="350px"/>
          </div>
        <div class="content text-center">
          
          <h4 class="py-3">{{$blog->title}}</h4>
          <h5 >{{$blog->description}}
  </h5>
          <h5 class="py-3">{{$blog->blog_date}}</h5>
        </div>
        </div>
      @endforeach
        </div>
      </div>
    </div>
  </section>
    
  {{-- </section> --}}
  

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>For any enquiries or feature notice ,leave us a feedback </p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <address>Tesano police station,Accra Ghana</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+233504576123">+233504576123</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">astg@gmail.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row justify-content-center">
              <div class="col-md-4 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              </div>
              <div class="col-md-4 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
              </div>
            
            <div class=" col-md-8 form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group col-md-8 mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
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

  </main><!-- End #main -->
@endsection