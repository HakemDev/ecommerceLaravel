<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PayProduct extends Mailable
{
    use Queueable, SerializesModels;
    public $namepr;
    public $name;
    public $total;
    
  

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($items,$name)
        {   $namepr=" ";
            $total=0;
            foreach($items as $item)
                {
                    $namepr=$namepr.", ".$item->name->title;
                    $total= $total+ $item->price*$item->quantity;
                }
            
                
                $this->$name=$name;
        }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('elhedshop@contact.com')->markdown('emails.orders.pay');   
    }
}
