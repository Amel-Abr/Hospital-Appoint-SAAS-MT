<?php

namespace App\Mail;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class subscriptionCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $plan;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Plan $plan)
    {
        $this->user = $user;
        $this->plan = $plan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Subscription Created')
            ->view('emails.subscription_created')
            ->with([
                'user' => $this->user,
                'plan' => $this->plan
            ]);
    }
}
