<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */


    public function creating(Order $order): void
    {
        $order->total_weight = 0;
        $order->total_price = 0;
        $order -> order_price = 0;
        $order-> shipping_price =0;

        foreach ($order->products as $product) {
            $order->total_weight += $product['product_weight'] * $product['product_quantity'];
            $order->order_price  += $product['product_price'] * $product['product_quantity'];

        }
        if($order ->total_weight <= 5 && $order->village == false  ){

            $order->shipping_price = 20 ;


            $order -> total_price = $order-> shipping_price + $order -> order_price;



        }else if ($order ->total_weight > 5 && $order->village !== false  ){

            $extra_weight = $order->total_weight - 5;
            $order->shipping_price = 20 + 20 + ($extra_weight * 10) ;
            $order -> total_price = $order-> shipping_price + $order -> order_price;
        }
        elseif ($order ->total_weight <= 5 && $order->village !== false  ){

            $extra_weight = $order->total_weight - 5;
            $order->shipping_price = 20 + 20;
            $order -> total_price = $order-> shipping_price + $order -> order_price;
        }else
        {
            $extra_weight = $order->total_weight - 5;
            $order->shipping_price = 20 + ($extra_weight * 10);
            $order -> total_price = $order-> shipping_price + $order -> order_price;
        }


    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        $order->total_weight = 0;
        $order->total_price = 0;
        $order -> order_price = 0;
        $order-> shipping_price =0;

        foreach ($order->products as $product) {
            $order->total_weight += $product['product_weight'] * $product['product_quantity'];
            $order->order_price  += $product['product_price'] * $product['product_quantity'];

        }
        if($order ->total_weight <= 5 && $order->village == false  ){

            $order->shipping_price = 20 ;


            $order -> total_price = $order-> shipping_price + $order -> order_price;



        }else if ($order ->total_weight > 5 && $order->village !== false  ){

            $extra_weight = $order->total_weight - 5;
            $order->shipping_price = 20 + 20 + ($extra_weight * 10) ;
            $order -> total_price = $order-> shipping_price + $order -> order_price;
        }
        elseif ($order ->total_weight <= 5 && $order->village !== false  ){

            $extra_weight = $order->total_weight - 5;
            $order->shipping_price = 20 + 20;
            $order -> total_price = $order-> shipping_price + $order -> order_price;
        }else
        {
            $extra_weight = $order->total_weight - 5;
            $order->shipping_price = 20 + ($extra_weight * 10);
            $order -> total_price = $order-> shipping_price + $order -> order_price;
        }
        $order->saveQuietly();
    }

    /**
     * Handle the Order "deleted" event.
     */
    public
    function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public
    function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public
    function forceDeleted(Order $order): void
    {
        //
    }
}
