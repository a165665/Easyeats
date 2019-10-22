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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dishes =  Dish::all();
        return view('order.index')->with('dishes', $dishes);
    }
    
    public function viewCart(){
        $user_id = Auth::user()->id;   
        $cart = Cart::where(['user_id' => $user_id, 'status' => 'Pending'])->first();
        $orders = $cart->orderDetails;
        return view('order.cart')->with('orders', $orders);

    }


    // Add new dish to cart
    public function create(Request $request)
    {
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
        //return view('order.index')->with('dishes', $dishes);
    }


}
