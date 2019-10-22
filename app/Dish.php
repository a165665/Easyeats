<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    //Table
    protected $table = 'dish';

    // Primary Key
    public $primaryKey = 'id';

    //Timestamps
    public $timestamps = true;

    public function orderDetails(){
        return $this->hasMany('App\OrderDetails');
    }
}
