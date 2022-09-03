<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GrahamCampbell\ResultType\Success;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     
   
     
     
          * @return \Illuminate\Http\Response

     */
    public function index()
    {
        $tenant = auth()->user();
        $tenant_ID = $tenant->Tenant_ID;
        $patients = Patient::where('Tenant_ID', $tenant_ID)->paginate(8);
        return view('patient.listPatient')->with([
            'patients'=> $patients
              ]); 
    }




    // public function index()
    // {
    //     return view('patient.index');
    // }


  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $patient)
    {
        
    }



  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }



      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $patient = Patient::find($id);
        return response()->json($patient);

      
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);


        $patient = Patient::find($request->id);

        if($patient->email == $request->email){
            $patient->fullname = $request->fullname;
            $patient->address = $request->address;
            $patient->phone = $request->phone;
           
        }else{
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255','unique:patients']
            ]);
            $patient->fullname = $request->fullname;
            $patient->address = $request->address;
            $patient->phone = $request->phone;
            $patient->email = $request->email;
        }   

        

        $patient->save();

        return redirect()->back()->with('success', 'The info has been modified !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (Patient::destroy($id)) ;
        return redirect()->back()->with('success', 'The Patient has been deleted !!');
    }


   


}
