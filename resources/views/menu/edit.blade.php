@extends('layouts.app')

@section('content')
    <h1>Update Dishes</h1>
    {!! Form::open(['action' => ['DishController@update', $dish->id], 'method' => 'PUT']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $dish->name, ['class' => 'form-control', 'placeholder' =>'Dish Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('price', 'Price')}}
            {{Form::number('price', $dish->price, ['class' => 'form-control', 'placeholder' =>'Dish Price'])}}
        </div> 
        <div class="form-group">
            {{Form::label('category', 'Category')}}
            {{Form::text('category', $dish->category, ['class' => 'form-control', 'placeholder' =>'Category'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection