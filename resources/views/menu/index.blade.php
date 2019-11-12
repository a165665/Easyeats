@extends('layouts.app')
@include('layouts.nav')
@section('content')
    <h1>Menu</h1>
    
    @if (count($dishes) > 0)
        <a href="menu?category=Beef">Beef</a>|
        <a href="menu?category=Appetisers">Appetisers</a>|
        <a href="menu?category=Chicken">Chicken</a>|
        <a href="menu?category=Soup">Soup</a>|
        <a href="menu?category=Seafood">Seafood</a>|
        {{-- <a href="menu?category=Pork">Non Halal</a>| --}}
        <a href="/menu">All</a>
    <div class="row no-gutters d-flex align-items-stretch">
        @foreach ($dishes as $dish)
           
        <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
                <div class="menus d-sm-flex ftco-animate align-items-stretch">
              <div class="menu-img img" style="background-image: url({{ asset('/img/Menu_pic/'.$dish->id.'.jpg') }});"></div>
              <div class="text d-flex align-items-center">
                                <div>
                      <div class="d-flex">
                        <div class="one-half">
                          <h3>{{$dish->name}}</h3>
                        </div>
                        <div class="one-forth">
                          <span class="price">RM {{$dish->price}}</span>
                        </div>
                      </div>
                      <p><a href="/menu/{{$dish->id}}" class="btn btn-primary">Details</a></p>
                  </div>
              </div>
            </div>
            </div>
        
   {{--          <table>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                </tr>
                <tr>
                    <th><a href="/menu/{{$dish->id}}">{{$dish->name}}</a></th>
                    <th>{{$dish->price}}</th>
                    <th>{{$dish->category}}</th>
                </tr>
            </table> --}}
                
        @endforeach
        {!! $dishes->render()!!}
    </div>
    @endif

    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
@endsection