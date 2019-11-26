@extends('layouts.app')

@section('content')
    <h1>Cart</h1>
    @if (count($orders) > 0)

    <div class="container-fluid">
        <table class="table table-striped">
             <tr>
                <th>Name</th>
                <th>Picture</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Details</th>
            </tr>
            @php
                $totalprice = 0;
            @endphp
        @foreach ($orders as $order)              
                <tr>
                    <th>{{$order->dish->name}}
                        <br>
                        RM{{$order->dish->price}}
                    </th>
                    <th width="20%"><img src="{{ asset('/img/Menu_pic/'.$order->dish_id.'.jpg') }}"class="img-fluid img-thumbnail" width="60%" height="60%"/></th>
                    <th>{{$order->quantity}}</th>
                    @php
                        $price = $order->quantity * $order->dish->price
                    @endphp
                    <th>RM{{$price}}</th>
                    <th> 
                        {!! Form::open(['action' => ['CartController@update', $order->dish_id], 'method' => 'PUT']) !!}
                            <div class="form-group">
                                {{Form::label('quantity', 'Quantity')}}
                                {{Form::number('quantity', $order->quantity, ['class' => 'form-control', 'placeholder' =>'Quantity', 'min' => '1'])}}
                            </div>
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                            <a href="/menu/{{$order->dish->dish_id}}" class="btn btn-primary">Details</a>
                        {!! Form::close() !!}
                        {!!Form::open(['action' => ['CartController@destroy', $order->dish_id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}              
                    </th>
                </tr>
                @php
                    $totalprice += $price;
                @endphp     
        @endforeach
                <tr>
                    <th></th>
                    <th></th>
                    <th>Total</th>
                    <th>RM{{$totalprice}}</th>
                    <th>Pay </th>
                </tr>
        </table>
    </div>
        
    @endif
@endsection