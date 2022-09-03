<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Paddle\Billable;
use Laravel\Paddle\Subscription;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function doctors(): HasMany
    {
        return $this->hasMany(User::class);
    }


    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }
   

    public function hasSubscription(): bool
    {
        $user = auth()->user();   
        if ($user->isAdmin) {
            return $user->subscribed('default');
        } else {
            $tenant_ID = $user->Tenant_ID;
            $admin = User::where('Tenant_ID', $tenant_ID)->where('isAdmin', '=', true)->first();
            return $admin->subscribed('default');
        }
        return auth()->user()->subscribed('default');
    }

    public function haveSubscription(): bool
    {
       $tenant_ID = auth()->user()->Tenant_ID;
        $admin = User::where('Tenant_ID', $tenant_ID)->where('isAdmin', '=', true)->first();
        return $admin->subscribed('default');
    }


    public function subscriptionInfo()

    {
        $user = auth()->user();   
        if ($user->isAdmin) {
            $id = $user->subscription()->paddle_plan;
        } else {
            $tenant_ID = $user->Tenant_ID;
            $admin = User::where('Tenant_ID', $tenant_ID)->where('isAdmin', '=', true)->first();
            $id = $admin->subscription()->paddle_plan;
        }
        
        if ($this->hasSubscription()) {

            return Plan::with('features')->where('paddle_id',$id)->first();
            // return Plan::with('features')->where('paddle_id', Subscription::query()->active()->latest()->value('paddle_plan'))->first();
        }
        return 'Free';
    }
    // 
    public function pausedInfo():bool
    {
        $user = auth()->user();   
        if ($user->isAdmin) {
            return $user->subscription('default')->onPausedGracePeriod();
        } else {
            $tenant_ID = $user->Tenant_ID;
            $admin = User::where('Tenant_ID', $tenant_ID)->where('isAdmin', '=', true)->first();
            return $admin->subscription('default')->onPausedGracePeriod();
        }
        // return auth()->user()->subscribed('default');
    }
    public function canAddDoctor()
    {
        $tenant = auth()->user();
        $tenant_ID = $tenant->Tenant_ID;
        $doctor = User::where('isAdmin', '!=', true)->where('Tenant_ID', $tenant_ID);
    //->withTrashed() ->whereDate('created_at', '=', today())    return auth()->user()->doctors()->whereDate('created_at', '=', today())->count() < $this->subscriptionInfo()->features()->where('code', 'doctors_per_month')->value('value');
        return $doctor->count() < $this->subscriptionInfo()->features()->where('code', 'doctors')->value('value');
    }

    public function canAddAppointment()
    {
        $tenant = auth()->user();
        $tenant_ID = $tenant->Tenant_ID;
        $appointment = Appointment::where('Tenant_ID', $tenant_ID);
        return $appointment->withTrashed()->whereDate('created_at', '=', today())->count() < $this->subscriptionInfo()->features()->where('code', 'appointments_per_day')->value('value');
    }

    // public function canAddPatient()
    // {
    //     return auth()->user()->patients()->whereDate('created_at', '=', today())->count() < $this->subscriptionInfo()->features()->where('code', 'patients_per_day')->value('value');
    // }

}
