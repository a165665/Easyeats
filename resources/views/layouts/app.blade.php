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
     <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
 {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
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
            <section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset('/img/dishpic.jpg') }});" data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="container">
                  <div class="row no-gutters slider-text align-items-end justify-content-center">
                    <div class="col-md-9 ftco-animate text-center mb-4">
                      <h1 class="mb-2 bread">Easyeats UKM</h1>
               
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
    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-6 col-lg-3">
              <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">EasyEats</h2>
                <p>A small restaurant named DaShuXia due to a big tree beside their place and protecting it from the hot sun. The story of the restaurant, "Whenever you feel tired, come to take a rest under the tree and have a meal in the restaurant. Take your time to recharge and become stronger".</p>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                  <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                  <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Open Hours</h2>
                <ul class="list-unstyled open-hours">
                  <li class="d-flex"><span>Monday</span><span>9:00 - 24:00</span></li>
                  <li class="d-flex"><span>Tuesday</span><span>9:00 - 24:00</span></li>
                  <li class="d-flex"><span>Wednesday</span><span>9:00 - 24:00</span></li>
                  <li class="d-flex"><span>Thursday</span><span>9:00 - 24:00</span></li>
                  <li class="d-flex"><span>Friday</span><span>9:00 - 02:00</span></li>
                  <li class="d-flex"><span>Saturday</span><span>9:00 - 02:00</span></li>
                  <li class="d-flex"><span>Sunday</span><span> 9:00 - 02:00</span></li>
                </ul>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
               <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Instagram</h2>
                <div class="thumb d-sm-flex">
                      <a href="#" class="thumb-menu img" style="background-image: url(images/insta-1.jpg);">
                      </a>
                      <a href="#" class="thumb-menu img" style="background-image: url(images/insta-2.jpg);">
                      </a>
                      <a href="#" class="thumb-menu img" style="background-image: url(images/insta-3.jpg);">
                      </a>
                  </div>
                  <div class="thumb d-flex">
                      <a href="#" class="thumb-menu img" style="background-image: url(images/insta-4.jpg);">
                      </a>
                      <a href="#" class="thumb-menu img" style="background-image: url(images/insta-5.jpg);">
                      </a>
                      <a href="#" class="thumb-menu img" style="background-image: url(images/insta-6.jpg);">
                      </a>
                  </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="ftco-footer-widget mb-4">
                  <h2 class="ftco-heading-2">Newsletter</h2>
                  <p>Far far away, behind the word mountains, far from the countries.</p>
                <form action="#" class="subscribe-form">
                  <div class="form-group">
                    <input type="text" class="form-control mb-2 text-center" placeholder="Enter email address">
                    <input type="submit" value="Subscribe" class="form-control submit px-3">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
  
              <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
          </div>
        </div>
      </footer>
</body>
</html>
