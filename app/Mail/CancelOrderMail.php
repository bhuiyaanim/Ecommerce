<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CancelOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public $shipping;
    
    public function __construct($order, $shipping)
    {
        $this->order = $order;
        $this->shipping = $shipping;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $info = $this->order;
        $info2 = $this->shipping;
        return $this->from('dapple_park@gmail.com')->view('mail.cancel_order', compact('info', 'info2'))->subject('Order Canceled Successfully');
    }
}
