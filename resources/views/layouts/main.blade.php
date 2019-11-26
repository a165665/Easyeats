<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
  {{--   <script src="{{ asset('js/app.js') }}" defer></script> --}}
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ asset('js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('js/google-map.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
 {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/animate.css')}}">
    
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{ asset('/css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.timepicker.css')}}">

    
    <link rel="stylesheet" href="{{ asset('/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}">
</head>
<body>
        <div class="py-1 bg-black top">
                <div class="container">
                    <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                        <div class="col-lg-12 d-block">
                            <div class="row d-flex">
                                <div class="col-md pr-4 d-flex topper align-items-center">
                                    <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                                    <span class="text">+ 1235 2355 98</span>
                                </div>
                                <div class="col-md pr-4 d-flex topper align-items-center">
                                    <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                                    <span class="text">dashuxia@gmail.com</span>
                                </div>
                                <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
                                    <p class="mb-0 register-link"><span>Open hours:</span> <span>Monday - Friday</span> <span>8:00AM - 9:00PM</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
            @include('layouts.nav')
            <section class="home-slider owl-carousel js-fullheight">
                <div class="slider-item js-fullheight" style="background-image:  url({{ asset('/img/dishpic.jpg') }});">
                    <div class="overlay"></div>
                  <div class="container">
                    <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">
          
                      <div class="col-md-12 col-sm-12 text-center ftco-animate">
                          <span class="subheading">EasyEats</span>
                        <h1 class="mb-4">Best Restaurant</h1>
                      </div>
          
                    </div>
                  </div>
                </div>
          
                <div class="slider-item js-fullheight" style="background-image: url({{ asset('/img/dishpic_2.jpg') }});">
                    <div class="overlay"></div>
                  <div class="container">
                    <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">
          
                      <div class="col-md-12 col-sm-12 text-center ftco-animate">
                          <span class="subheading">EasyEats</span>
                        <h1 class="mb-4">Nutritious &amp; Tasty</h1>
                      </div>
          
                    </div>
                  </div>
                </div>
          
                <div class="slider-item js-fullheight" style="background-image: url({{ asset('/img/dishpic_3.jpg') }});">
                    <div class="overlay"></div>
                  <div class="container">
                    <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">
          
                      <div class="col-md-12 col-sm-12 text-center ftco-animate">
                          <span class="subheading">EasyEats</span>
                        <h1 class="mb-4">Delicious Specialties</h1>
                      </div>
          
                    </div>
                  </div>
                </div>
              </section>
    <div id="app">
 

        <main class="py-4">
            @include('inc.messages')
            @yield('content')
        </main>
    </div>
</body>
</html>