@extends('layouts.app')

@section('content')

    <h1>Order</h1>
    @if (count($dishes) > 0)
  
    <div class="container-fluid">

            <div class="ftco-search">
            <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                      <a class="nav-link ftco-animate" href="/order" role="tab"ria-selected="false">All</a>
              
                      <a class="nav-link ftco-animate" href="order?category=Appetisers" role="tab" aria-selected="false">Appetisers</a>
              
                      <a class="nav-link ftco-animate" href="order?category=Chicken" role="tab"aria-selected="false">Chicken</a>
              
                      <a class="nav-link ftco-animate" href="order?category=Beef" role="tab" aria-selected="false">Beef</a>
              
                      <a class="nav-link ftco-animate" href="order?category=Soup" role="tab"aria-selected="false">Soup</a>
              
                      <a class="nav-link ftco-animate" href="order?category=Seafood" role="tab" aria-selected="false">Seafood</a>

                      <a class="nav-link ftco-animate" href="order?category=nonhalal" role="tab" aria-selected="false">Non Halal</a>
              
                    </div>
                  </div>
            


    <table class="table table-striped" >
        <tr>
            <th>Name</th>
            <th>Picture</th>
            <th>Price</th>
            <th>Category</th>
            <th>Quantity</th>
        </tr>
        @foreach ($dishes as $dish)
           
                <tr>
                    <th>{{$dish->name}} </th>
                    <th width="20%"><img src="{{ asset('/img/Menu_pic/'.$dish->id.'.jpg') }}"class="img-fluid img-thumbnail" width="60%" height="60%"/></th>
                    <th>{{$dish->price}}</th>
                    <th>{{$dish->category}}</th>
                    <th>
                        {!! Form::open(['action' => 'CartController@store', 'method' => 'POST']) !!}
                            <div class="form-group">
                                {{Form::number('quantity', '', ['class' => 'form-control', 'placeholder' =>'Dish Quantity', 'min' => '1'])}}
                            </div>
                            {{Form::hidden('dish_id',$dish->id)}}
                            {{Form::submit('Add to cart', ['class' => 'btn btn-primary'])}}
                            <a href="/menu/{{$dish->id}}" class="btn btn-primary">Details</a>
                        {!! Form::close() !!}
                    </th>
                </tr>  
                             
        @endforeach
        
    </table>
    <div class="row align-items-center justify-content-center" >
        {!! $dishes->render()!!}
        </div>
    </div>

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