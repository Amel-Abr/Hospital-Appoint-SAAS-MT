<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function registration(Request  $request){

        $request->validate([
            'hospital_name'=>'required',
            // 'fullname'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:6',
        ]);
       
        $tenant = Hospital::create($request->validate([
            'hospital_name'=>'required',
       ]));
      //  '  
       $user = new User();
        $user->Tenant_ID = $tenant->id;
        $user->fullname = 'admin';
        $user->isAdmin = true;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

       
   
        return redirect('/home')->with('success','succeccfully registered');
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


    public function rest()
    {
        return view('rest');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
