<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{


    // public function products(){

    //     return $this->belongsToMany(Product::class)->withPivot('quantity');
    // }


    public function products(){

        return $this->morphToMany(Product::class,'producttable')->withPivot('quantity');
    }

    public function getTotalAttribute()
    {
        return $this->products->pluck('total')->sum();
    }


}
