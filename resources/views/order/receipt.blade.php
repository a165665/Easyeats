@extends('layouts.app')

@section('content')
    <h1>Cart</h1>
    @if (count($orders) > 0)

    <div class="container-fluid">
        <table class="table table-striped ftco-search">
             <tr>
                <th>Name</th>
                <th>Picture</th>
                <th>Quantity</th>
                <th>Subtotal</th>
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
                </tr>
        </table>
    </div>       
    @else
        <div class="container-fluid">
            <p>Your cart is empty now. Click <a href="/order">here</a> to add order</p>
        </div>
        
    @endif
@endsection