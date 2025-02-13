<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        //
    }

    public function creating(Order $order): void
    {
        $order->total_weight = 0;
        foreach ($order->products as $product) {
            $order->total_weight += $product['product_weight'] * $product['product_quantity'];
            // $order->total_price = 10 * $order->total_weight;
        }


        // ok logic
        // if($order ->total_weight <= 5  ){
        //     $order->total_price = 20 ;
        // }else{
        //     $extra_weight = $order->total_weight - 5;
        //     $order->total_price = 20 + ($extra_weight * 10);
        // }
// village logic
        if($order ->total_weight <= 5 && $order->village == null  ){
            $order->total_price = 20 ;
        }else if ($order ->total_weight > 5 && $order->village !== null  ){

            $extra_weight = $order->total_weight - 5;
            $order->total_price = 20 + 20 + ($extra_weight * 10) ;
        }
        elseif ($order ->total_weight <= 5 && $order->village !== null  ){

                $extra_weight = $order->total_weight - 5;
                $order->total_price = 20 + 20;
        }else
        {
            $extra_weight = $order->total_weight - 5;
           $order->total_price = 20 + ($extra_weight * 10);
        }

    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        $order->total_weight = 0;
        foreach ($order->products as $product) {
            $order->total_weight += $product['product_weight'] * $product['product_quantity'];
        }
        $order->total_price = 10 * $order->total_weight;
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
