<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DemoEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $demo;
    
    public function __construct($demo)
    {
        $this->demo=$demo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $cart = \Session::get('cart');
        return $this->from('ventas@industrialessimpsa.com', 'Ventas Simpsa')
                    ->subject('Información para realizar tu tranferencia')
                    ->view('emails.demo')
                    ->with('cart', $cart);
    }
}
