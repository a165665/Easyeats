@extends('layouts.app')

@section('content')
    <h1>Menu</h1>
    @if (count($dishes) > 0)
        @foreach ($dishes as $dish)
            <table>
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
            </table>
                
        @endforeach
        
    @endif
@endsection