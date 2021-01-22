<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $fillable =
        [
            "title",
            "description",
            "price",
            "stock",
            "status",
        ];

    public function carts()
    {

        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }

    public function orders()
    {

        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }


}
