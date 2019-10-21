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
                    <th>Quantity</th>
                </tr>
                <tr>
                    <th><a href="/menu/{{$dish->id}}">{{$dish->name}}</a></th>
                    <th>{{$dish->price}}</th>
                    <th>{{$dish->category}}</th>
                    <th>
                        {!! Form::open(['action' => 'CartController@create', 'method' => 'POST']) !!}
                            <div class="form-group">
                                {{Form::number('quantity', '', ['class' => 'form-control', 'placeholder' =>'Dish Quantity'])}}
                            </div>
                            {{Form::hidden('dish_id',$dish->id)}}
                            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </th>
                </tr>
            </table>
                
        @endforeach
        
    @endif
@endsection