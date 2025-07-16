<?php

namespace App\Mail;

use App\Models\Billing;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BillingNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $billing;

    /**
     * Create a new message instance.
     */
    public function __construct(Billing $billing)
    {
        $this->billing = $billing;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Your Billing Summary')
                    ->view('emails.billing-notification');
    }
}
