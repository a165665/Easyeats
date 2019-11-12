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
        $user_id = Auth::user()->id;   
        $cart = Cart::where(['user_id' => $user_id, 'status' => 'Pending'])->first();
        $orders = $cart->orderDetails;
        //return $orders;
        return view('order.cart')->with('orders', $orders);
    }
    
    public function viewCart(){
        $user_id = Auth::user()->id;   
        $cart = Cart::where(['user_id' => $user_id, 'status' => 'Pending'])->first();
        $orders = $cart->orderDetails;
        //return $orders;
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
        return redirect('order')->with('success','Dish Added to Cart');
    }

    // Update Dish
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'Quantity' => 'required',
        ]);

        //Update Post
        $dish = OrderDetails::where('dish_id', $id);
        $dish->quantity = $request->input('quantity');
        $dish->save();

        return redirect('/menu')->with('success', ' Update Created');
    }
}
