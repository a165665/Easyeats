<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $user_id = Auth::user()->id;   
        $cart = Cart::where(['user_id' => $user_id, 'status' => 'Pending'])->first();
        $status = Cart::where(['user_id' => $user_id, 'status' => 'Pending'])->get('id');
        if(count($status) > 0){
            $orders = $cart->orderDetails;
        }else{
            $orders = [];
            return view('order.cart')->with('orders', $orders);
        }
        return view('order.cart')->with('orders', $orders);

    }

    public function order(){

        if(request()->has('category')){
            $dishes =  Dish::where('category', request('category'))->paginate(10)->appends('category', request('category'));
            //return $dishes;
        }
        else{
            $dishes =  Dish::where('category','!=','NonHalal')->paginate(10);
            }

       /*  $dishes =  Dish::paginate(10); */
        return view('order.index')->with('dishes', $dishes);
    }

    public function orderlist(){
        $user_id = Auth::user()->id;   
        $cart = Cart::where('status','Pending')->paginate(2);
        //return $cart[1]->orderDetails;
        //$orders = $cart->orderDetails;
        //return $orders;
        return view('order.orderlist')->with('orders', $cart);
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
        return back()->with('success','Dish Added to Cart');
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

    public function checkout($id){
        $cart = Cart::find($id);
        // -------------------------------------------------------------------- calculate total price in a cart
        $totals = OrderDetails::where(['cart_id' => $id])->get();
        $quantity = 0;
        foreach($totals as $total){
            $quantity += ($total->dish->price * $total->quantity);
        }
        $cart->total = $quantity;
        // ------------------------------------------------------------------------
        //$cart->status = "Done";
        $cart->save();
        $orders = $cart->orderDetails;
        $test = DB::table('orderdetails')->select(DB::raw('dish_id, sum(quantity) as total'))
                                         ->groupBy('dish_id')->orderBy('total', 'desc')->get();
        return $test;

        return redirect()->route('receipt', ['id' => $id]);
    }

    public function receipt($id){
        $cart = Cart::find($id);
        $orders = $cart->orderDetails;
        return view('/order/receipt')->with(['success' => 'Payment Successful', 'orders' => $orders]);
    }
}
