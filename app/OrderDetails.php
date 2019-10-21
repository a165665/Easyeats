<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    //Table
    protected $table = 'orderdetails';

    // Primary Key
    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;

    public function cart(){
        return $this->belongsTo('App\Cart');
    }

    public function dish(){
        return $this->hasMany('App\Dish');
    }
}
