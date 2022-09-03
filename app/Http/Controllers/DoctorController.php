<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;

use App\Models\Appointment;

use App\Models\Appointement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    public function __construct()
    {
        $this->middleware('check.active.ability')->only(['store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenant = auth()->user();
        $tenant_ID = $tenant->Tenant_ID;
        $doctors = User::where('isAdmin', '!=', true)->where('Tenant_ID', $tenant_ID)->paginate(8);
        return view('Doctor.listDoctorUser',['doctors' => $doctors]);

      

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = Auth::user();
        $tenant_ID = $doctor->Tenant_ID;
        $request->validate([
            'fullnameP' => ['required', 'string', 'max:255'],
            'phoneP' => 'required',
            'addressP' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
          
        ]);

    
        $email=$request->email;
        
        $patient = Patient::where('email',$email)->where('Tenant_ID', $tenant_ID) -> first();
      if($patient==null)
      {
        
        $patient = new Patient();
        $patient->Tenant_ID = $tenant_ID ;
        $patient->fullname = $request->fullnameP;
        $patient->phone = $request->phoneP;
        $patient->address = $request->addressP;
        $patient->email = $request->email;
         $patient->save();

        $appointment = new Appointment();
        $appointment->Tenant_ID =  $tenant_ID ;
        $appointment->patientName =  $patient->fullname ;
        $appointment->patientphone =  $patient->phone;
        $appointment->patientAddress = $patient->address;
        $appointment->patientEmail =  $patient->email;
        $appointment->doctornName = $doctor->fullname;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->patientID = $patient->id;
        $appointment->doctorID = $doctor->id;

        $appointment->save();




     
    
    
    }else{
      
       
        $appointment = new Appointment();
        $appointment->Tenant_ID =  $tenant_ID ;
        $appointment->patientName =  $request->fullnameP;
        $appointment->patientphone =  $request->phoneP;
        $appointment->patientAddress = $request->addressP;
        $appointment->patientEmail =  $request->email;
        $appointment->doctornName = $doctor->fullname;
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->patientID = $patient->id;
        $appointment->doctorID = $doctor->id;

        $appointment->save();
    
    }

    return redirect()->back()->with('success', 'The Appointment has been successfully added!!');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    

    public function update(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'phone' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
     

        $user = Auth::user();

        if($user->email == $request->email){
            $user->fullname = $request->fullname;
            $user->department = $request->department;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);

           
        }else{
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255','unique:users']
            ]);
            $user->fullname = $request->fullname;
            $user->department = $request->department;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

                }

        $user->save();

        return redirect()->back()->with('success', 'your profile has been modified !!');
    }



    public function updateTime(Request $request)
    {
        
        $user = Auth::user();
        if($user->startDay == null){
        $request->validate([
            'startDay' => ['required', 'date'],
            'lastDay' => ['required', 'date'],
            'startTime' => ['required', 'date_format:H:i'],
            'endTime' => ['required', 'date_format:H:i'],
            'duration' =>  ['required', 'date_format:H:i'],
            
        ]);
  
        $user->startDay = $request->startDay;
        $user->lastDay = $request->lastDay;
        $user->startTime = $request->startTime;
        $user->endTime = $request->endTime;
        $user->duration =$request->duration;
    }else{
        $request->validate([
            'startDay' => ['required', 'date'],
            'lastDay' => ['required', 'date'],
            'startTime' => ['required', 'date_format:H:i:s'],
            'endTime' => ['required', 'date_format:H:i:s'],
            'duration' =>  ['required', 'date_format:H:i:s'],
            
        ]);
       
        
        $user->startDay = $request->startDay;
        $user->lastDay = $request->lastDay;
        $user->startTime = $request->startTime;
        $user->endTime = $request->endTime;
        $user->duration =$request->duration;
    }
        $user->save();

        return redirect()->back()->with('success', 'your time work has been modified !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
