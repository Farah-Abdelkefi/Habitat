<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TransferGuestCartToUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        //
        \Cart::session($event->user->id);

        $guestCart = session('guest_cart.data');
        if($guestCart)
            $guestCartItems = $guestCart->toArray();

        if($guestCartItems)
            \Cart::add($guestCartItems);





    }
}
