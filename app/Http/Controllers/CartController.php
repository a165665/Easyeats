<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use App\Cart;
use App\User;
use App\OrderDetails;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = Auth::user()->id;   
        $cart = Cart::where(['user_id' => $user_id, 'status' => 'Pending'])->first();
        $orders = $cart->orderDetails;
        //return $orders;
        return view('order.cart')->with('orders', $orders);
    }

    public function order(){
        $dishes =  Dish::all();
        return view('order.index')->with('dishes', $dishes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //Check pending cart 
        $user_id = Auth::user()->id;
        $status = Cart::where(['user_id' => $user_id, 'status' => 'Pending'])->get('id');
        
        //-----------------------------------------------------------------if got pending cart add dish into pending cart
        if(count($status) > 0){
            
            $newDish = $request->input('dish_id');
            $existOrderDetail = OrderDetails::where(['dish_id' => $newDish, 'cart_id' => $status[0]['id']])->first();
            if($existOrderDetail){
                $existOrderDetail->quantity = $existOrderDetail->quantity + $request->input('quantity');
                $existOrderDetail->save();
            }else{
            $orderdetail = new OrderDetails;
            $orderdetail->dish_id = $request->input('dish_id');
            $orderdetail->cart_id = $status[0]['id'];
            $orderdetail->quantity = $request->input('quantity');
            $orderdetail->save();
            }

        //--------------------------------------------------------------if no pending create new cart
        } else {   
            $order = new Cart;
            $order->user_id = Auth::user()->id;
            $order->status = 'Pending';
            $order->save();

            $status2 = Cart::where(['user_id' => $user_id, 'status' => 'Pending'])->get('id');  

            $orderdetail = new OrderDetails;
            $orderdetail->dish_id = $request->input('dish_id');
            $orderdetail->cart_id = $status2[0]['id'];
            $orderdetail->quantity = $request->input('quantity');
            $orderdetail->save();

        }
        $dishes =  Dish::all();
        return redirect('order')->with('success','Dish Added to Cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'quantity' => 'required'
        ]);

        //Update Post
        $user_id = Auth::user()->id;
        $status = Cart::where(['user_id' => $user_id, 'status' => 'Pending'])->get('id');
        $dish = OrderDetails::where(['dish_id'=>$id, 'cart_id'=>$status[0]['id']])->first();
        $dish->quantity = $request->input('quantity');      
        $dish->save();
        return redirect('/cart')->with('success', ' Update Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user_id = Auth::user()->id;
        $status = Cart::where(['user_id' => $user_id, 'status' => 'Pending'])->get('id');
        $dish = OrderDetails::where(['dish_id'=>$id, 'cart_id'=>$status[0]['id']])->first();
        $dish->delete();     
        return redirect('/cart')->with('success', ' Update Created');
    }
}
