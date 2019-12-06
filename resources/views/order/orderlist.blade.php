@extends('layouts.app')

@section('content')
    
    @if (count($orders) > 0)

    <div class="container-fluid">
            <h1>Order List</h1>
            @php
                $totalprice = 0;
                $num =1;
            @endphp
        @foreach ($orders as $order)
        <table class="table table-striped">
            <tr>
                <th>Order {{$num}}:</th>
                <th>{{$order->user->name}}</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
 
               {{-- <th>Order {{$num}}:</th>
               <th>{{$order->user->name}}</th> --}}
               <th></th>
               <th>Dish Name</th>
               <th>Quantity</th>
               <th>Order Time</th>
               
           </tr>
          
               @foreach ($order->orderDetails as $item)
             
                <tr>
                    <th></th>
                    <th width="50%">{{$item->dish->name}}
                    </th>
                    <th>{{$item->quantity}}</th>
                    @php
                        $price = $item->quantity * $item->dish->price
                    @endphp
                    <th>{{$item->updated_at}}</th>
                
                </tr>
                @php
                    $totalprice += $price;
                    
                @endphp     
                @endforeach
            </table>
            <br>
            <hr>
            <br>
            @php
            $num+=1;
            @endphp 
        @endforeach
        <div class="row align-items-center justify-content-center" >
            {!! $orders->render()!!}
            </div>  
      
    </div>
        
    @endif
@endsection