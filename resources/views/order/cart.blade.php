@extends('layouts.app')

@section('content')
    <h1>Menu</h1>
    @if (count($ordered) > 0)
        @foreach ($ordered as $order)
            <table>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                </tr>
                <tr>
                    <th><a href="/menu/{{$order->dish_id}}">{{$order->name} }</a></th>
                    {{-- <th>{{$dish->price}}</th>
                    <th>{{$dish->category}}</th> --}}
                </tr>
            </table>
                
        @endforeach
        
    @endif
@endsection