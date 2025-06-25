@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.heroimage')  

  <section class="gap">
    <div class="container">
      <div class="heading">
        <img src="{{ asset('frontend') }}/assets/img/heading-img.png" alt="img">
        <span>Construction Services</span>
        <h2> We Offer Comprehensive Construction Services</h2>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="services-one" style="background-image: url({{ asset('frontend') }}/assets/img/bg-lins-img.jpg);">
            <i class="flaticon-skyline"></i>
            <h4>Commercial</h4>
            <p>We care about the communities we our communities too. we’re designers,
              and projects mannagers, innovating of community, creativity</p>
            <a href="our-service.html"> <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="services-one" style="background-image: url({{ asset('frontend') }}/assets/img/bg-lins-img.jpg);">
            <i class="flaticon-hook"></i>
            <h4>Contracting </h4>
            <p>We care about the communities we our communities too. we’re designers,
              and projects mannagers, innovating of community, creativity</p>
            <a href="our-service.html"> <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="services-one" style="background-image: url({{ asset('frontend') }}/assets/img/bg-lins-img.jpg);">
            <i class="flaticon-villa"></i>
            <h4>Residential </h4>
            <p>We care about the communities we our communities too. we’re designers,
              and projects mannagers, innovating of community, creativity</p>
            <a href="our-service.html"> <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="architect">
            <div class="heading two sec-title-animation animation-style2">
              <span>Building Construction Solutions </span>
              <h2>We Provide Timely and Cost-Effective </h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, Lore
                dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incidid
                bore et dolore magna aliqua. Ut enim ad minim veniam,</p>
            </div>
            <div class="progress-style">
              <div class="progress_bar two">
                <span>Unique Ideas</span>
                <div class="progress_bar_item">
                  <div class="item_value cell shrink">0%</div>
                  <div class="item_bar cell">
                    <div class="progress" data-progress="98"></div>
                  </div>
                </div>
              </div>
              <div class="progress_bar">
                <span>Consultation</span>
                <div class="progress_bar_item">
                  <div class="item_value cell shrink">0%</div>
                  <div class="item_bar cell">
                    <div class="progress" data-progress="76"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="architect-text">
            <div>
              <h3>Robin Qarlos</h3>
              <p>BA(Hons) Dip.Arch MA ARB<br> Creative Director&amp; senior Architect</p>
            </div>
            <img src="{{ asset('frontend') }}/assets/img/signature.png" alt="img">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="cost-effective">
            <img src="{{ asset('frontend') }}/assets/img/cost-effective.jpg" alt="img">
            <div class="goal-mov">
              <figure>
                <img src="{{ asset('frontend') }}/assets/img/heading-img.png" alt="img">
              </figure>
              <img src="{{ asset('frontend') }}/assets/img/circle-text.png" alt="img">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="gap">
    <div class="container">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="partner swiper-slide hover-img-two">
            <figure class="imgg">
              <img alt="clients-logo" src="{{ asset('frontend') }}/assets/img/clients-1.png">
              <img alt="clients-logo" src="{{ asset('frontend') }}/assets/img/clients-1.png">
            </figure>
          </div>
          <div class="partner swiper-slide hover-img-two">
            <figure class="imgg">
              <img alt="clients-logo" src="{{ asset('frontend') }}/assets/img/clients-2.png">
              <img alt="clients-logo" src="{{ asset('frontend') }}/assets/img/clients-2.png">
            </figure>
          </div>
          <div class="partner swiper-slide hover-img-two">
            <figure class="imgg">
              <img alt="clients-logo" src="{{ asset('frontend') }}/assets/img/clients-3.png">
              <img alt="clients-logo" src="{{ asset('frontend') }}/assets/img/clients-3.png">
            </figure>
          </div>
          <div class="partner swiper-slide hover-img-two">
            <figure class="imgg">
              <img alt="clients-logo" src="{{ asset('frontend') }}/assets/img/clients-4.png">
              <img alt="clients-logo" src="{{ asset('frontend') }}/assets/img/clients-4.png">
            </figure>
          </div>
          <div class="partner swiper-slide hover-img-two">
            <figure class="imgg">
              <img alt="clients-logo" src="{{ asset('frontend') }}/assets/img/clients-2.png">
              <img alt="clients-logo" src="{{ asset('frontend') }}/assets/img/clients-2.png">
            </figure>
          </div>
        </div>
        <div class="swiper-button">
          <div class="swiper-button-next"><i class="fa-solid fa-arrow-right"></i></div>
          <div class="swiper-button-prev"><i class="fa-solid fa-arrow-left"></i></div>
        </div>
      </div>
    </div>
  </div>
  <section class="section-innovative gap">
    <div class="container">
      <div class="heading sec-title-animation animation-style2">
        <img src="{{ asset('frontend') }}/assets/img/heading-img.png" alt="img">
        <span class="title-animation">Work Showcase</span>
        <h2 class="title-animation">Selection of My Recent Projects</h2>
      </div>
      <div class="swiper innovative-slider">
        <div class="swiper-wrapper">

          <div class="swiper-slide innovative hover-img">
            <figure><img src="{{ asset('frontend') }}/assets/img/innovative-1.jpg" alt="img"> </figure>
            <div class="client-company">
              <h4>Contruction, Brading </h4>
              <h3>Alexa Complex</h3>
              <ul>
                <li>Date: <span>January 08, 2023</span></li>
                <li>Client:<span>Branding Company</span></li>
              </ul>
              <div class="project-cost">
                <span>Project Cost</span>
                <h6> $14850</h6>

              </div>
              <a href="#"> <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="swiper-slide innovative hover-img">
            <figure><img src="{{ asset('frontend') }}/assets/img/innovative-2.jpg" alt="img"> </figure>
            <div class="client-company">
              <h4>Contruction, Brading </h4>
              <h3>Oceanfront Villa</h3>
              <ul>
                <li>Date: <span>January 08, 2023</span></li>
                <li>Client:<span>Branding Company</span></li>
              </ul>
              <div class="project-cost">
                <span>Project Cost</span>
                <h6> $14850</h6>

              </div>
              <a href="#"> <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="swiper-slide innovative hover-img">
            <figure><img src="{{ asset('frontend') }}/assets/img/innovative-3.jpg" alt="img"> </figure>
            <div class="client-company">
              <h4>Contruction, Brading </h4>
              <h3>Alexa Complex</h3>
              <ul>
                <li>Date: <span>January 08, 2023</span></li>
                <li>Client:<span>Branding Company</span></li>
              </ul>
              <div class="project-cost">
                <span>Project Cost</span>
                <h6> $14850</h6>

              </div>
              <a href="#"> <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
          <div class="swiper-slide innovative hover-img">
            <figure><img src="{{ asset('frontend') }}/assets/img/innovative-4.jpg" alt="img"> </figure>
            <div class="client-company">
              <h4>Contruction, Brading </h4>
              <h3>Oceanfront Villa</h3>
              <ul>
                <li>Date: <span>January 08, 2023</span></li>
                <li>Client:<span>Branding Company</span></li>
              </ul>
              <div class="project-cost">
                <span>Project Cost</span>
                <h6> $14850</h6>

              </div>
              <a href="#"> <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>
  <section class="design-your gap" style="background-image: url({{ asset('frontend') }}/assets/img/design-your.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="heading two">
            <span>We designed your space</span>
            <h2>Interesting Facts About Construction industry</h2>
          </div>
          <div class="count-number">
            <div class="count-style">
              <i class="flaticon-customer-service"></i>
              <h2 data-max="14"><sup>k</sup></h2>
              <p>house interior design</p>
            </div>
            <div class="count-style">
              <i class="flaticon-architecture"></i>
              <h2 data-max="10"><sup>m</sup></h2>
              <p>finishing projects</p>
            </div>
            <div class="count-style">
              <i class="flaticon-engineer"></i>
              <h2 data-max="94"><sup>+</sup></h2>
              <p>expert designer</p>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <form class="meet-experts">
            <h2>Request a Quote!</h2>
            <p>have any question feel free to contact us.</p>
            <input type="text" name="complete name" placeholder="complete name">
            <input type="email" name="email address" placeholder="email address">
            <input type="number" name="phone no" placeholder="phone no">
            <textarea placeholder="message"></textarea>
            <button class="theme-btn">Submit Now</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <section class="gap">
    <div class="container">
      <div class="heading">
        <img src="{{ asset('frontend') }}/assets/img/heading-img.png" alt="img">
        <span>Meet Our Experts</span>
        <h2>Meet Our Experts</h2>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="team-style-one">
            <div class="team-style-img">
              <figure>
                <img src="{{ asset('frontend') }}/assets/img/team-img-1.jpg" alt="img">
              </figure>
              <a href="callto:+15554361747"><i class="flaticon-iphone"></i> +1 555 436 1747</a>
            </div>
            <a href="team-details.html">Richard Coutts</a>
            <p>Architects Engineers</p>
            <ul class="icon-share">
              <li><a href="JavaScript:void(0)"><i class="fa-brands fa-facebook-f"></i></a></li>
              <li><a href="JavaScript:void(0)"><i class="fa-brands fa-instagram"></i></a></li>
              <li><a class="twitter" href="JavaScript:void(0)"><i class="fa-brands fa-twitter"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="team-style-one">
            <div class="team-style-img">
              <figure>
                <img src="{{ asset('frontend') }}/assets/img/team-img-2.jpg" alt="img">
              </figure>
              <a href="callto:+15554361747"><i class="flaticon-iphone"></i> +1 555 436 1747</a>
            </div>
            <a href="team-details.html">Thomas Walkar</a>
            <p>Project Managers</p>
            <ul class="icon-share">
              <li><a href="JavaScript:void(0)"><i class="fa-brands fa-facebook-f"></i></a></li>
              <li><a href="JavaScript:void(0)"><i class="fa-brands fa-instagram"></i></a></li>
              <li><a class="twitter" href="JavaScript:void(0)"><i class="fa-brands fa-twitter"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="team-style-one">
            <div class="team-style-img">
              <figure>
                <img src="{{ asset('frontend') }}/assets/img/team-img-3.jpg" alt="img">
              </figure>
              <a href="callto:+15554361747"><i class="flaticon-iphone"></i> +1 555 436 1747</a>
            </div>
            <a href="team-details.html">Robert Morqo</a>
            <p>Equipment Operators</p>
            <ul class="icon-share">
              <li><a href="JavaScript:void(0)"><i class="fa-brands fa-facebook-f"></i></a></li>
              <li><a href="JavaScript:void(0)"><i class="fa-brands fa-instagram"></i></a></li>
              <li><a class="twitter" href="JavaScript:void(0)"><i class="fa-brands fa-twitter"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="team-style-one">
            <div class="team-style-img">
              <figure>
                <img src="{{ asset('frontend') }}/assets/img/team-img-4.jpg" alt="img">
              </figure>
              <a href="callto:+15554361747"><i class="flaticon-iphone"></i> +1 555 436 1747</a>
            </div>
            <a href="team-details.html">Jessica Lobar</a>
            <p>Safety Specialists</p>
            <ul class="icon-share">
              <li><a href="JavaScript:void(0)"><i class="fa-brands fa-facebook-f"></i></a></li>
              <li><a href="JavaScript:void(0)"><i class="fa-brands fa-instagram"></i></a></li>
              <li><a class="twitter" href="JavaScript:void(0)"><i class="fa-brands fa-twitter"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="marquee gap no-top">
    <div class="marquee-box-one">
      <div class="marquee-content-one">
        <a href="#">
          <h2>Construction</h2>
        </a>
        <a href="#">
          <h2>Interior Design</h2>
        </a>
        <a href="#">
          <h2>Modern Structures </h2>
        </a>
        <a href="#">
          <h2>Ideas</h2>
        </a>
      </div>
      <div class="marquee-content-one">
        <a href="#">
          <h2>Construction</h2>
        </a>
        <a href="#">
          <h2>Interior Design</h2>
        </a>
        <a href="#">
          <h2>Modern Structures </h2>
        </a>
        <a href="#">
          <h2>Ideas</h2>
        </a>
      </div>
    </div>
  </div>
  <section class="gap client-section" style="background-color: #f5f5f5; background-image:url({{ asset('frontend') }}/assets/img/building.jpg);">
    <div class="container">
      <div class="heading two">
        <span>Testimonial and Reviews</span>
        <h2>Client’s Reviews</h2>
      </div>
      <div class="row align-items-center">
        <div class="col-xl-8 col-lg-10">
          <div class="client-slider swiper">
            <div class="swiper-wrapper">
              <div class=" swiper-slide">
                <div class="client-text">
                  <h5><i> I am very happy with the service I received from urbanist Architecture. They were delightful
                      to deal
                      with and provided an excellent service.</i></h5>
                </div>
                <div class="client-one">
                  <i class="flaticon-quotation-mark"></i>
                  <img src="{{ asset('frontend') }}/assets/img/client-one-1.jpg" alt="img">
                  <div>
                    <h5>Romin Qlark</h5>
                    <h6>High Quality Work</h6>
                  </div>
                  <ul class="star">
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                  </ul>
                </div>
              </div>
              <div class=" swiper-slide">
                <div class="client-text">
                  <h5><i> I am very happy with the service I received from urbanist Architecture. They were delightful
                      to deal
                      with and provided an excellent service.</i></h5>
                </div>
                <div class="client-one">
                  <i class="flaticon-quotation-mark"></i>
                  <img src="{{ asset('frontend') }}/assets/img/client-one-1.jpg" alt="img">
                  <div>
                    <h5>Romin Qlark</h5>
                    <h6>High Quality Work</h6>
                  </div>
                  <ul class="star">
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                  </ul>
                </div>
              </div>
              <div class=" swiper-slide">
                <div class="client-text">
                  <h5><i> I am very happy with the service I received from urbanist Architecture. They were delightful
                      to deal
                      with and provided an excellent service.</i></h5>
                </div>
                <div class="client-one">
                  <i class="flaticon-quotation-mark"></i>
                  <img src="{{ asset('frontend') }}/assets/img/client-one-1.jpg" alt="img">
                  <div>
                    <h5>Brian P</h5>
                    <h6>High Quality Work</h6>
                  </div>
                  <ul class="star">
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="gap">
    <div class="container">
      <div class="heading">
        <img src="{{ asset('frontend') }}/assets/img/heading-img.png" alt="img">
        <span>Find inspiration. Find professional</span>
        <h2>Articles & News</h2>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="blog-one hover-img-two">
            <figure class="imgg">
              <img src="{{ asset('frontend') }}/assets/img/blog-one-1.jpg" alt="img">
              <img src="{{ asset('frontend') }}/assets/img/blog-one-1.jpg" alt="img">
            </figure>
            <div class="blog-time">
              <a href="#"><i class="flaticon-clock"></i><span>Dec 24, 2024</span></a> <a href="#"><i
                  class="flaticon-chat"></i> <span>12 Comment</span></a>
            </div>
            <h4><a href="our-news.html">What does a Carpentry Job equire
                to be Successful?</a></h4>
            <a href="our-news.html">read more <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="blog-one hover-img-two">
            <figure class="imgg">
              <img src="{{ asset('frontend') }}/assets/img/blog-one-2.jpg" alt="img">
              <img src="{{ asset('frontend') }}/assets/img/blog-one-2.jpg" alt="img">
            </figure>
            <div class="blog-time">
              <a href="#"><i class="flaticon-clock"></i><span>Dec 24, 2024</span></a> <a href="#"><i
                  class="flaticon-chat"></i> <span>12 Comment</span></a>
            </div>
            <h4><a href="our-news.html">What does a Carpentry Job equire
                to be Successful?</a></h4>
            <a href="our-news.html">read more <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="blog-one hover-img-two">
            <figure class="imgg">
              <img src="{{ asset('frontend') }}/assets/img/blog-one-3.jpg" alt="img">
              <img src="{{ asset('frontend') }}/assets/img/blog-one-3.jpg" alt="img">
            </figure>
            <div class="blog-time">
              <a href="#"><i class="flaticon-clock"></i><span>Dec 24, 2024</span></a> <a href="#"><i
                  class="flaticon-chat"></i> <span>12 Comment</span></a>
            </div>
            <h4><a href="our-news.html"> What does a Carpentry Job equire
                to be Successful?</a></h4>
            <a href="our-news.html">read more <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection