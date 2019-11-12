@extends('layouts.app')

@section('content')

    <h1>Order</h1>
    @if (count($dishes) > 0)
    <div class="container-fluid">
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
    </div>
        
    @endif
@endsection