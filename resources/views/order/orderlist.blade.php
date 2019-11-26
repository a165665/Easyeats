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
                <th>Order Time</th>
                <th>User Name</th>
            </tr>
            @php
                $totalprice = 0;
            @endphp
        @foreach ($orders as $order)
               @foreach ($order->orderDetails as $item)
                <tr>
                    <th>{{$item->dish->name}}
                        <br>
                        RM{{$item->dish->price}}
                    </th>
                    <th width="20%"><img src="{{ asset('/img/Menu_pic/'.$item->dish_id.'.jpg') }}"class="img-fluid img-thumbnail" width="60%" height="60%"/></th>
                    <th>{{$item->quantity}}</th>
                    @php
                        $price = $item->quantity * $item->dish->price
                    @endphp
                    <th>{{$item->updated_at}}</th>
                <th>{{$order->user->name}}</th>
                </tr>
                @php
                    $totalprice += $price;
                @endphp     
                @endforeach
        @endforeach
        </table>
    </div>
        
    @endif
@endsection