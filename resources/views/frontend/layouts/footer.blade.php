<footer class="gap no-bottom three" style="background-image: url('{{ asset('frontend') }}/assets/img/footer.jpg');">
    <div class="container">
        <div class="row position-relative footer-boder">
            <div class="col-lg-2">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('storage/' . $logo->favicon) }}" alt="img" style="width:50%"></a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="logo-heading">
                    <p>{{ $logo->slogan }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-contact">
                    <h3>Contact Us</h3>
                    <a href="#"><span><i class="fa-solid fa-phone"></i>:</span> {{ $logo->primary_phone }}</a>
                    <a href="#"><span><i class="fa-solid fa-phone"></i>:</span> {{ $logo->secondary_phone }}</a>
                    <div class="img-slider swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('frontend') }}/assets/img/hero-three-1.jpg" alt="img">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('frontend') }}/assets/img/hero-three-2.jpg" alt="img">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('frontend') }}/assets/img/hero-three-3.jpg" alt="img">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-contact widget-title">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><i class="fa-solid fa-caret-right"></i><a href="#">Testimonials </a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="#">Equipments </a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="#">Contact</a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="#">Projects </a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="#">Team </a></li>
                        <li><i class="fa-solid fa-caret-right"></i><a href="#">About </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-contact footer_widget_title">
                    <h3>Offices Location</h3>
                    <div class="location">
                        <div><i class="flaticon-map-location"></i></div>
                        <div class="location-style">
                            <h6>Location:</h6>
                            <p>{{ $logo->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-contact">
                    <h3>Follow Us</h3>
                    @php
                        $socials = [
                            'instagram' => 'fa-brands fa-instagram',
                            'youtube' => 'fa-brands fa-youtube',
                            'linkedin' => 'fa-brands fa-linkedin-in',
                            'facebook' => 'fa-brands fa-facebook-f',
                            'twitter' => 'fa-brands fa-twitter'
                        ];
                    @endphp

                    <ul class="footer-social-media">
                        @foreach($socials as $social => $icon)
                            @if(!empty($logo->social_links[$social]))
                                <li>
                                    <a href="{{ $logo->social_links[$social] }}" target="_blank">
                                        <i class="{{ $icon }}"></i> {{ ucfirst($social) }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="f-bottom">
            <p>{{ $logo->copyright_text }} <a href="#"> dhukuchhuconstruction.com</a></p>
            <ul>
                <li>
                    <a href="#">Login</a>
                </li>
                <li>
                    <a href="contact.html"> Contact</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
<!-- search-popup end -->
<div id="scroll-percentage"><span id="scroll-percentage-value"></span></div>
<!-- Bootstrap Js -->
<script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/swiper.js"></script>
<script src="{{ asset('frontend') }}/assets/js/jquery.nice-select.min.js"></script>
<!-- fancybox -->
<script src="{{ asset('frontend') }}/assets/js/jquery.fancybox.min.js"></script>
<script src="{{ asset('frontend') }}/assets/js/custom.js"></script>