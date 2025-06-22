<!DOCTYPE html>
<html>

  <head>
      @include('frontend.layouts.header')
  </head>
  <body>
    <!-- preloader -->
    <div class="preloader">
      <div class="preloader-box">
        <div class="natex-content">
          <div class="natex-circle"></div>
          <div class="natex-line-mask">
            <div class="loader-line"></div>
          </div>
          <img src="assets/img/natex-preloader.png" alt="">
        </div>
      </div>
    </div>
    <!-- preloader end -->
    <!-- Nav bar -->
    @include('frontend.layouts.nav')
              
    @yield('content')

    @include('frontend.layouts.footer')
    
  </body>
</html>