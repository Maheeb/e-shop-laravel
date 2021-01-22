<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable =['amount','payed_at','order_id'];

    protected $dates =['payed_at'];

    // Relationship

    public function order(){

        return $this->belongsTo(Order::class);
    }





}
