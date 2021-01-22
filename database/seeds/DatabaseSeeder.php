<?php

use App\Cart;
use App\Image;
use App\Payment;
use App\Product;
use App\User;
use Carbon\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        //  $this->call(ProductsSeeder::class);
        //  $this->call(PaymentSeeder::class);

        // $products=factory(Product::class,50)->create();
        $users=factory(User::class,20)->create()

        ->each(function($user){

//             $image = Image::factory()->user()->make();
            $image = factory(App\Image::class)->make();


            $user->image()->save($image);

        });

        $orders = factory(App\Order::class,10)->
        make()
        ->each(function ($order) use ($users){

            $order->customer_id = $users->random()->id;
            $order->save();

            $payment = factory(App\Payment::class)->make();

            $order->payment()->save($payment);

        });


//        $carts = Cart::factory(App\Cart::class)->create(20);
        $carts = \factory(Cart::class,20)->create();

        $products = factory(Product::class,50)->create()

        ->each(function($product) use ($orders,$carts){

            $order = $orders->random();
            $order->products()->attach([

                $product->id =>['quantity'=>mt_rand(1,3)]
            ]);

            $cart = $carts->random();
            $cart->products()->attach([

                $cart->id => ['quantity'=>mt_rand(1,3)]
            ]);

//             $images = Image::factory(mt_rand(2,4))->make();
            $images = factory(App\Image::class,mt_rand(2,4))->make();

            $product->images()->saveMany($images);

        });


    }
}
