<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Dish;
use App\Cart;
use App\User;
use App\OrderDetails;
use Carbon\Carbon;

class DashboardController extends Controller
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

    public function index(){
        $user_type = Auth::user()->user_type;
        if($user_type == 'owner'){
        $dataPoints = array();
        $dataPoints2 = array();
        //------------------------------------------------------------------ 7 day sales
        $sales = DB::table('cart')->select(DB::raw('DATE(updated_at) as Date, sum(total) as total'))->where('status','Done')
                                  ->groupBy('Date')->orderBy('Date', 'desc')->limit(7)->get();
        //------------------------------------------------------------------ top Category
        $topCategories = DB::table('orderdetails')
                          ->join('dish', 'dish.id', '=', 'orderdetails.dish_id')
                          ->select(DB::raw('dish.category, sum(quantity) as total'))
                          ->groupBy('category')->get();

        //------------------------------------------------------------------ convert to xy
        foreach($sales as $sale){
            array_push($dataPoints, array("label"=> $sale->Date, "y"=> $sale->total));
            }

        foreach($topCategories as $topCategory){
            array_push($dataPoints2, array("label"=> $topCategory->category, "y"=> $topCategory->total));
            }

        //------------------------------------------------------------------ top dish
       
        $topDishes = OrderDetails::groupBy('dish_id')->
        selectRaw('dish_id, sum(quantity) as total')->orderBy('total', 'desc')->limit(5)->get();
        

        $totalDish = Dish::all()->count();
        $totalCategory = OrderDetails::all()->sum('quantity');

        $nonhalal = Dish::where('category', 'NonHalal')->count();

        //$todayOrder = Cart::whereDate('updated_at', Carbon::today()->sub('1 day')->format("Y-m-d") )->get();
        return view('layouts.dashboard')->with(['sales' => $dataPoints, 
                                             'topDishes' => $topDishes, 
                                             'topCategories' => $dataPoints2,
                                             'totalDish' => $totalDish,
                                             'totalCategory' => $totalCategory,
                                             'nonhalal' => $nonhalal]);
        }else{
            return redirect('/');
        }
    }
}
