<?php


use App\Models\User;
use App\Models\Hospital;
// use Illuminate\Http\Request;
use GuzzleHttp\Middleware;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminnController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\registerController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SubscriptionController;
use Laravel\Fortify\Http\Controllers\Patient\AuthenticatedSessionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/registration',[registerController::class,'registration'])->name('registration');
Route::get('/home',[HomeController::class,"redirect"])->middleware('auth')->name('home');
Route::get('/rest',[registerController::class,'rest'])->name('rest_password');

//            ****************Admin**********
Route::prefix('/admin')->middleware(['auth','isAdmin'])->group(function () {
   Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
   Route::get('doctors','DoctorController@index') ->name('admin.doctors');
   Route::get('appointments','AppointmentController@index') ->name('appointments');
   Route::get('patients','PatientController@index') ->name('patients');

   Route::get('/account',[AccountController::class,"account"])->name('account');
   Route::patch('/account',[AccountController::class,"update_account"])->name('update_account');
   Route::get('/subscriptions', [SubscriptionController::class, 'subscriptions'])->name('subscriptions');
   Route::post('/subscriptions', [SubscriptionController::class, 'subscribe'])->name('subscribe');

   Route::middleware('check.Subscribed')->group(function () {
   Route::get('/payment-method', [SubscriptionController::class, 'payment_method'])->name('payment_method');
   Route::get('/receipts', [SubscriptionController::class, 'receipts'])->name('receipts');
   Route::get('/cancel-account', [SubscriptionController::class, 'cancel_account'])->name('cancel_account');
   Route::post('/pause-account', [SubscriptionController::class, 'do_pause_account'])->name('do_pause_account');
   Route::post('/terminate-account', [SubscriptionController::class, 'do_terminate_account'])->name('do_terminate_account');
  });

   
  
});

   Route::resource('admin','AdminController')->except([
   'create','update'
   ])->middleware(['auth','isAdmin']);

    Route::put('admin','AdminController@update')->name('admin.updateD');
    Route::put('appointment','AppointmentController@update')->name('admin.updateA');
    Route::post('AddAppointment','AppointmentController@store')->name('admin.storeA');
    Route::put('patient','PatientController@update')->name('admin.updateP');
    
    Route::resource('patient','PatientController')->except([
      'create','update','index',' insert','store',
      'edit','update'
      ]);

    Route::resource('appointment','AppointmentController')->except([
        'create','update','index',' insert','store',
        'edit','update'
        ]);

        Route::resource('hospital','HospitalController')->except([
          'create','update','index',' insert','store',
          'edit','update'
          ]);

     
     


   
 

              //  ****************Doctor**************

Route::prefix('doctor')->middleware(['auth','isDoctor'])->group(function () { 

 Route::put('update','DoctorController@update') ->name('doctor.update');
 Route::get('doctors','DoctorController@index') ->name('doctors');
 Route::get('appointments','AppointmentController@indexD') ->name('appointments');
 Route::post('appointment','DoctorController@store')->name('doctor.storeA'); 
 Route::get('patients','PatientController@index') ->name('patients');
 
}); 
 
// ************************************
  
// Route::get('/test', function (Request $request) {
//   $payLink = $request->user()->newSubscription('default',32962)
//       ->returnTo(route('home'))
//       ->create();

//   return view('billing', ['payLink' => $payLink]);
// });



// Route::namespace('Patient')->prefix('patient')->name('patient.')->groupe(function(){
//   Route::namespace('Auth')->group(function(){
    
//   });
// });
// Route::post('/patientHome',[AuthenticatedSessionController::class,'store'])->name('loginPatient');


// Route::get('loginPatient',[AuthenticatedSessionController::class,'create'])->name('loginPati');


















  // Route::group(['prefix' => 'Doctor','as'=>'Doctor.' , 'middlwere' => 'auth'],function () {
  //     // Route::get('profile', 'DoctorController@show') ->name('profile'); 
  //     Route::get('appointments','AppointmentController@index') ->name('appointments');
  //     Route::get('doctors','DoctorController@index') ->name('doctors');
       
  // });

  


  // Route::put('admin','AdminController@update')->name('admin.update');
  // Route::delete('admin', 'AdminController@destroy')->name('admin.destroy');
  // Route::get('/edit/{id}',[AdminController ::class,'edit']);

// Route::fallback(function(){
//   return view('page404');
// });
   





// *************************************************************************
// Route::get('/home',[HomeController::class,'redircet']);
// Route::get('/home','HomeController@redirect');

// Route::get('/home', function(){
//   if(Auth::check()){
//     if(Auth::user()->isAdmin==true){

//       return view('adminhome');
//     }else{
//       Route::get('/profile', 'DoctorController@show') ;
//       // return view('Doctor.profile');
//     }
//   }
// })







// Route::get('/', function () {
//   return view('Doctors.profile');
// });
// Route:: middleware('auth')->group(function () { 
//     Route::get('/adminhome', function () {
//       return view('adminhome');
//     });
//     Route::resource('Doctors','DoctorController');
    
// });

//  Route::resource('Doctors', 'DoctorController');
  // Route::group(['prefix' => 'Doctors','as'=>'Doctors.'],function () {
      // Route::get('prefile','DoctorController@show') ->name('profile'); 
    // Route::get('/Doctors/profile', function () {
        // return view('profile');
    // });
    //   Route::view('appointments','Doctors.appointments') ->name('appointments');        
  // });
      




