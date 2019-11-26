<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //Table
    protected $table = 'cart';

    // Primary Key
    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User',);
    }

    public function orderDetails(){
        return $this->hasMany('App\OrderDetails');
    }
}
