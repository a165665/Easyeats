@extends('layouts.app')

@section('content')
    <h1>Menu</h1>
    @if (count($orders) > 0)
        @foreach ($orders as $order)
            <table>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                </tr>
                <tr>
                    <th><a href="/menu/{{$order->dish->dish_id}}">{{$order->dish->name}}</a></th>
                    <th>{{$order->quantity}}</th>
                    <th>RM{{$order->quantity * $order->dish->price}}</th> 
                </tr>
            </table>
                
        @endforeach
        
    @endif
@endsection