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
        // $user = User::find($user_id);
        // return $user;
        $cart = Cart::where(['user_id' => $user_id, 'status' => 'Pending'])->first();
        $orders = $cart->orderDetails->dish;
        $list = array();
        foreach ($orders as $order){
            array_push($list,$order['dish_id']);
        }
        
        $ordered = array();
        foreach($list as $id){
        $dishes =  Dish::find($id);
        array_push($ordered, $dishes);
        }
        return view('order.cart')->with('ordered', $ordered);

    }


    // Add new dish to cart
    public function create(Request $request)
    {
        //Check pending cart 
        //if no pending create new cart
        //if got pending cart add dish into pending cart
        $status = Cart::where('status','Pending')->get('id');

        if(count($status) > 0){

            $orderdetail = new OrderDetails;
            $orderdetail->dish_id = $request->input('dish_id');
            $orderdetail->cart_id = $status[0]['id'];
            $orderdetail->quantity = $request->input('quantity');
            $orderdetail->save(); 

        } else {   
            $order = new Cart;
            $order->user_id = Auth::user()->id;
            $order->status = 'Pending';
            $order->save();

            $status2 = Cart::where('status','Pending')->get('id');

            $orderdetail = new OrderDetails;
            $orderdetail->dish_id = $request->input('dish_id');
            $orderdetail->cart_id = $status2[0]['id'];
            $orderdetail->quantity = $request->input('quantity');
            $orderdetail->save();

        }
        $dishes =  Dish::all();
        return view('order.index')->with('dishes', $dishes);
    }


}
