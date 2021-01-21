<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $products = Product::factory(50)->create();
        $products=factory(Product::class,50)->create();

        return $products;
    }
}
