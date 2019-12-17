@extends('layouts.app')
@include('layouts.jquery')

@section('content')
    <a href="/menu" class="btn btn-default">Go Back</a>
        @if (Auth::user()->user_type == 'owner')
        <a href="/menu/{{$dish->id}}/edit" class="btn btn-default">Edit</a>
        {!!Form::open(['action' => ['DishController@destroy', $dish->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        @endif
 
    <div class="container-fluid">
        <h1>{{$dish->name}}</h1>
        <div class="row align-items-center justify-content-center">

    <div class="menu-img img" style="background-image: url({{ asset('/img/Menu_pic/'.$dish->id.'.jpg') }});"></div>
    <img src="{{ asset('/img/Menu_pic/'.$dish->id.'.jpg') }}" width="40%" height="40%">
    
    {{-- <div class="row no-gutters d-flex align-items-stretch">
  
           
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

    </div> --}}

    <div class="float-right">
           <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                </tr>
                <tr>
                    <th>{{$dish->name}}</th>
                    <th>{{$dish->price}}</th>
                    <th>{{$dish->category}}</th>
                </tr>
            </table>     
        </div>     
        </div> 
      </div>   
        
@endsection