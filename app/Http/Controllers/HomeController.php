<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hospital;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpKernel\Profiler\Profile;

class HomeController extends Controller
{
    public function redirect(){
       
        $isAdmin=Auth::user()->isAdmin;
        // $tenant = auth()->user()->Tenant_ID;
        // $hospital= Hospital::where('id',$tenant)->first()->hospital_name;
        // $tenatDomain = str_replace('://', '://'.$hospital.'.', config('app.url'));
    
        if($isAdmin)
        {
            return redirect()->route('account');
            //  return redirect($tenatDomain);

        }
        else{
              $doctor = Auth::user();
           
               return view('Doctor.profile')->with('doctor', $doctor);
           
          
           
        }

     
    }


    public function index(){
        return view('adminhome');
    }
}
