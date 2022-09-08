<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
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


    public function account()
    { 
        $user = auth()->user();
        $tenant = Hospital::where('id', '=', $user->Tenant_ID )->first();
        return view('account.account',['user' => $user , 'tenant' => $tenant ]);
        // dd($tenant);
    }
// compact('user', 'tenant')
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
    public function update_account (Request $request)
    {
        // dd($request->all());


        $validation = Validator::make($request->all(), [
            'hospital_name' => 'required|string',
            'fullname' => 'required|string',
            'email' => 'required|email|unique:users,email,'.auth()->id(),  
            ]);
        if ($validation->fails()) {
            return back()->withErrors($validation->errors())->withInput();
        }


         $dataT = ['hospital_name' => $request->hospital_name,];
        $data = [
            
            'fullname' => $request->fullname,
            'email' => $request->email,
        ];
        if ($request->password != '') {
            $data['password'] = bcrypt($request->password);
        }

        $user = auth()->user();
        $tenant = Hospital::where('id', $user->Tenant_ID);
        $tenant->update($dataT);
        auth()->user()->update($data);

        return redirect()->back()->with('success', 'Updated successfully');
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
 