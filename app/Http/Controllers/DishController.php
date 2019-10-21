<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;


class DishController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes =  Dish::all();
        return view('menu.index')->with('dishes', $dishes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $user_type = Auth::user()->user_type;

        if($user_type == 'owner'){
            return view('menu.create'); 
        }else{
            $dishes =  Dish::all();

            return redirect('/menu')->with(['dishes' => '$dishes', 'error' => 'Unauthorized Access']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);

        //Create Post
        $dish = new Dish;
        $dish->name = $request->input('name');
        $dish->price = $request->input('price');
        $dish->category = $request->input('category');
        $dish->save();

        return redirect('/menu')->with('success', ' Dish Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dish = Dish::find($id);
        return view('menu.show')->with('dish', $dish);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::find($id);
        return view('menu.edit')->with('dish', $dish);
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
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);

        //Update Post
        $dish = Dish::find($id);
        $dish->name = $request->input('name');
        $dish->price = $request->input('price');
        $dish->category = $request->input('category');
        $dish->save();

        return redirect('/menu')->with('success', ' Update Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::find($id);
        $dish->delete();
        return redirect('/menu')->with('success', 'Dish Removed');
    }
}
