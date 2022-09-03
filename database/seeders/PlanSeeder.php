<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\PlanFeature;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $basicPlan = Plan::create([
                'name' => 'Basic',
                'description' => 'Basic plan',
                'paddle_id' => 32962,
                'price' => 10.00,
                'interval' => 'month',
                'trial_period_days' => null,
                'sort_order' => 1,
            ]);
    
            $basicPlan->features()->saveMany([
                new PlanFeature(['name' => 'Doctors per month' , 'code' => 'doctors' , 'value' => 5 , 'sort_order' => 1]),
                // new PlanFeature(['name' => 'Patients per day', 'code' => 'patients_per_day', 'value' => 8, 'sort_order' => 5]),
                new PlanFeature(['name' => 'Appointments per day', 'code' => 'appointments_per_day', 'value' => 10, 'sort_order' => 10]),
            ]);
    
            $basicYearlyPlan = Plan::create([
                'name' => 'Basic Year',
                'description' => 'Basic Year plan',
                'paddle_id' => 32963,
                'price' => 100.00,
                'interval' => 'year',
                'trial_period_days' => null,
                'sort_order' => 2,
            ]);
    
            $basicYearlyPlan->features()->saveMany([
                new PlanFeature(['name' => 'Doctors per year', 'code' => 'doctors', 'value' => 7, 'sort_order' => 1]),
                // new PlanFeature(['name' => 'Patients per day', 'code' => 'patients_per_day', 'value' => 8, 'sort_order' => 5]),
                new PlanFeature(['name' => 'Appointments per day', 'code' => 'appointments_per_day', 'value' => 10, 'sort_order' => 10]),
            ]);
    
            $proPlan = Plan::create([
                'name' => 'Pro',
                'description' => 'Pro plan',
                'paddle_id' => 32964,
                'price' => 30.00,
                'interval' => 'month',
                'trial_period_days' => null,
                'sort_order' => 3,
            ]);
    
            $proPlan->features()->saveMany([
                new PlanFeature(['name' => 'Doctors per month', 'code' => 'doctors', 'value' => 100000, 'sort_order' => 1]),
                // new PlanFeature(['name' => 'Patients per day', 'code' => 'patients_per_day', 'value' => 100000, 'sort_order' => 5]),
                new PlanFeature(['name' => 'Appointments per day', 'code' => 'appointments_per_day', 'value' => 100000, 'sort_order' => 10]),
            ]);
    
            $proYearlyPlan = Plan::create([
                'name' => 'Pro Year',
                'description' => 'Pro Year plan',
                'paddle_id' => 32965,
                'price' => 300.00,
                'interval' => 'year',
                'trial_period_days' => null,
                'sort_order' => 4,
            ]);
    
            $proYearlyPlan->features()->saveMany([
                new PlanFeature(['name' => 'Doctors per year', 'code' => 'doctors', 'value' => 100000, 'sort_order' => 1]),
                // new PlanFeature(['name' => 'Patients per day', 'code' => 'patients_per_day', 'value' => 100000, 'sort_order' => 5]),
                new PlanFeature(['name' => 'Appointments per day', 'code' => 'appointments_per_day', 'value' => 100000, 'sort_order' => 10]),
            ]);
    
        }
    }
}
