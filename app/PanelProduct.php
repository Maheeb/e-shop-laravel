<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use App\Product;

class PanelProduct extends Product
{
    protected static function booted()
    {
        // static::addGlobalScope(new AvailableScope);
    }

}
