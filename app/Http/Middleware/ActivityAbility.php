<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ActivityAbility
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        
        if ($request->user()->subscriptionInfo() != 'Free'){
            if ($request->routeIs('admin.store')) {
                if (!$request->user()->canAddDoctor()) {
                    // return  redirect()->route('admin.doctors')->with([
                    //     'message' => 'You can not add doctor today, if you want to add more please upgrade your subscription plan.',
                    //     'alert-type' => 'warning'
                    // ]);
                    return redirect()->back()->with('warning', 'You can not add any doctor, if you want to add more please upgrade your subscription plan.');
                }
            }

            if ($request->routeIs('admin.storeA') || $request->routeIs('doctor.storeA')) {
                if (!$request->user()->canAddAppointment()) {
                    // return  redirect()->route('admin.appointments')->with([
                    //     'message' => 'You can not add appointments today, if you want to upload more please upgrade your subscription plan.',
                    //     'alert-type' => 'warning'
                    // ]);
                    return redirect()->back()->with('warning', 'You can not add any appointments today, if you want to add more please upgrade your subscription plan.');
                }
            }

            // if ($request->routeIs('admin.send_to_email') || $request->routeIs('invoices.do_send_to_email')) {
            //     if (!$request->user()->canSendInvoiceEmail()) {
            //         return  redirect()->route('invoices.index')->with([
            //             'message' => 'You can not Send invoices today, if you want to send more please upgrade your subscription plan.',
            //             'alert-type' => 'warning'
            //         ]);
            //     }
            // }

            return $next($request);
        }

        return redirect()->route('subscriptions')->with('danger', 'You have not any active subscription plan, please subscribe now.');
       

        // return $next($request);
    }
}
