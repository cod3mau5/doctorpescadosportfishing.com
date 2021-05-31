<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class tourReservation extends Mailable
{
    use Queueable, SerializesModels;

    public $subject= 'Order Reservation';
    public $reservation;

    public function __construct($reservation)
    {
        $this->reservation=$reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.tours.reservation_completed');
    }
}
