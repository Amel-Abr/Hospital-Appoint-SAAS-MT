<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Laravel\Paddle\Subscription;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SubscribeRequest;

class SubscriptionController extends Controller
{


    
    



    public function subscriptions()
    {   
        $user = auth()->user();
        $interval = \request('interval') ?? 'month';
        $plans = Plan::with('features')->where('interval', $interval)->get();
        // $id = $user->subscription()->paddle_plan;
        // $p = Plan::where('paddle_id',$id)-> first();

        $userPlanId = $user->hasSubscription() ? $user->subscriptionInfo()->id : '';
        $userPlanName = $user->hasSubscription() ? $user->subscriptionInfo()->name : 'Free';
        $userNextPaymentDate = $user->hasSubscription() ? $user->subscription('default')->nextPayment()->date()->format('d/m/Y') : '';
        $userNextPaymentAmount = $user->hasSubscription() ? $user->subscription('default')->nextPayment()->amount : '12';
        $userPlanTrail = $user->hasSubscription() && $user->onTrial('default') ? $user->trialEndsAt('default') : '';

        return view('account.subscriptions', compact('user', 'plans', 'userPlanId', 'userPlanName', 'userNextPaymentDate', 'userNextPaymentAmount', 'userPlanTrail'));
        // 
    }

    
    public function subscribe(SubscribeRequest $request)
    {
        $user = auth()->user();
        $plan = Plan::whereId($request->plan)->First();
      
        if(!$user->hasSubscription()){  
              // new subscription
            $plan->payLink = auth()->user()->newSubscription('default', $plan->paddle_id)
            ->returnTo(route('subscriptions', ['interval' => $plan->interval]))
            ->create();

        return view('account.subscribe', compact('user', 'plan'));
    
        }else{
            //swap betweeen plans
            $user->subscription('default')->swap($plan->paddle_id);
            return redirect()->back()->with('success', 'Your subscription is updated successfully');
            // return back()->with([
            //     'message' => 'Your subscription is updated successfully',
            //     'alert-type' => 'success'
            // ]);
        }
    }

    public function payment_method()
    {
        $subscription = auth()->user()->subscription('default');
        $updateUrl = $subscription->updateUrl();
        return view('account.payment_method', compact('subscription', 'updateUrl'));
    }

    public function receipts()
    {
        $receipts = auth()->user()->receipts;
        return view('account.receipts', compact('receipts'));
    }

    public function cancel_account()
    {
        $subscription = auth()->user()->subscription('default');
        return view('account.cancel_account', compact('subscription'));

    }

    public function do_pause_account(Request $request)
    {

        $subscription = auth()->user()->subscription('default');

        if ($subscription->onPausedGracePeriod()) {
            $subscription->unpause();
        } else {
            $subscription->pause();
        }

        return redirect()->back()->with('success', 'Updated successfully');
    //     return back()->with([
    //         'message' => 'Updated successfully',
    //         'alert-type' => 'success'
    //     ]);
    }

    public function do_terminate_account(Request $request)
    {

        $user = auth()->user();
        $tenant_ID = $user->Tenant_ID;
        $receipt = $user->receipts()->first();
        $subscription = $user->subscription('default');
        $subscription->cancelNow();
       
        User::where('isAdmin', '!=', true)->where('Tenant_ID',$tenant_ID)->delete();
        Patient::where('Tenant_ID',$tenant_ID)->delete();
        $subscription->delete();
        $receipt->delete();
    
        return redirect()->back()->with('success', 'Your account id terminated successfully');
        

    }


}
