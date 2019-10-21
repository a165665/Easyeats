@extends('layouts.app')

@section('content')
    <a href="/menu" class="btn btn-default">Go Back</a>
    @if ((session('status')))
        @if (Auth::user()->user_type == 'owner')
        <a href="/menu/{{$dish->id}}/edit" class="btn btn-default">Edit</a>
        {!!Form::open(['action' => ['DishController@destroy', $dish->id], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
        @endif
    @endif
    <h1>{{$dish->name}}</h1>
            <table>
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
@endsection