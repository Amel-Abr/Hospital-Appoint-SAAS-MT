<?php

namespace App\Listeners;

use App\Models\Plan;
use App\Models\User;
use App\Models\Revenue;
use App\Mail\subscriptionPause;
use App\Mail\subscriptionCreated;
use App\Mail\subscriptionSwapped;
use App\Mail\subscriptionUnPause;
use App\Mail\subscriptionCancelled;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\subscriptionPaymentSucceeded;
use Laravel\Paddle\Events\WebhookReceived;
use Illuminate\Contracts\Queue\ShouldQueue;


class PaddleEventListener implements ShouldQueue
{
   

    /**
     * Handle the event.
     *
     * @param  WebhookReceived $event
     * @return void
     */
    public function handle(WebhookReceived $event)
    {

        logger(json_encode($event->payload));
        $user = User::whereEmail($event->payload['email'])->first();
        $plan = Plan::wherePaddleId($event->payload['subscription_plan_id'])->first();

        if ($event->payload['alert_name'] === 'subscription_payment_succeeded') {
            
            Revenue::firstOrCreate([
                'user_id' => $user->id,
                'user_name' => $user->fullname,
                'plan_id' => $plan->id,
                'plan_name' => $plan->name,
                'payment_method' => $event->payload['payment_method'],
                'checkout_id' => $event->payload['checkout_id'] ?? '',
                'amount' => $event->payload['unit_price'],
                'currency' => $event->payload['balance_currency'],
            ]);

            Mail::to($user->email)->send(new subscriptionPaymentSucceeded($user, $plan));
        }

        if ($event->payload['alert_name'] === 'subscription_created') {
            if (!Revenue::where([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'checkout_id' => $event->payload['checkout_id'],
            ])->exists()) {
                Mail::to($user->email)->send(new subscriptionCreated($user, $plan));
            }
        }

        if ($event->payload['alert_name'] === 'subscription_cancelled') {
            Mail::to($user->email)->send(new subscriptionCancelled($user, $plan));
        }

        if ($event->payload['alert_name'] === 'subscription_updated') {
              // swapping
              if ($event->payload['new_price'] != $event->payload['old_price']) {
                $oldPlan = Plan::wherePaddleId($event->payload['old_subscription_plan_id'])->value('name');
                Mail::to($user->email)->send(new subscriptionSwapped($user, $plan, $oldPlan));
            } else {

                if (isset($event->payload['paused_at'])) {
                    // pause
                    Mail::to($user->email)->send(new subscriptionPause($user, $plan));
                } else {
                    // unpause
                    Mail::to($user->email)->send(new subscriptionUnPause($user, $plan));
                }

            }
        }
    }
}