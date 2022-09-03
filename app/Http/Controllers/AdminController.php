<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
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
        
        $tenant = auth()->user();
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'phone' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          
        ]);

        $user = new User();
        $user->Tenant_ID = $tenant->Tenant_ID;
        $user->fullname = $request->fullname;
        $user->department = $request->department;
        $user->department = $request->department;
        $user->phone = $request->phone; 
        $user->email = $request->email;
        $user->password = Hash::make($request->fullname);

        $user->save();

        return redirect()->back()->with('success', 'The doctor has been successfully added!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $user = User::find($id);
        return response()->json($user);

      
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'phone' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);


        $user = User::find($request->idD);

        if($user->email == $request->email){
            $user->fullname = $request->fullname;
            $user->department = $request->department;
            $user->phone = $request->phone;
           
        }else{
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255','unique:users']
            ]);
            $user->fullname = $request->fullname;
            $user->department = $request->department;
            $user->phone = $request->phone;
            $user->email = $request->email;
        }   

        

        $user->save();

        return redirect()->back()->with('success', 'The doctor has been modified !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       if( User::destroy($id))
        return redirect()->back()->with('success', 'The doctor has been deleted !!');
 
    }

    
}
