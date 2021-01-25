<?php

namespace App;

use App\Scopes\AvailableScope;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    protected $with = ['images'];

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

        // return $this->belongsToMany(Cart::class)->withPivot('quantity');
        return $this->morphedByMany(Cart::class, 'producttable')->withPivot('quantity');
    }

    public function orders()
    {

        // return $this->belongsToMany(Order::class)->withPivot('quantity');
        return $this->morphedByMany(Order::class, 'producttable')->withPivot('quantity');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function scopeAvailable($query)
    {

        return $query->where('status', 'available');
    }

    public function getTotalAttribute()
    {
        return $this->price * $this->pivot->quantity;
    }
}
