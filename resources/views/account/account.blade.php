@extends('layouts.app3')




@section('titl')
My Account
@endsection


@php
   $isAdmin=Auth::user()->isAdmin;
@endphp

@section('content_main')
   


 <style>
.card-body{
margin-top:20px; 
margin-left: 60px; 
margin-right: 70px;
}

.card-header{
    font-weight: 400;
    margin: 1rem; 


}
.cardd-body h2{
font-size: 1.3rem;
 }     


@media (min-width: 320px) and (max-width: 480px) {
        .card-body{
            width: 85%;
            margin-left: 8px;
            margin-right: 8px;
            padding: 4px ;
        }
   
    .card-header{
        font-size: 1.2rem;
        margin: 1rem; 
    }

    .cardd-body{
           font-size: 1rem;
        }

    .cardd-body h2{
     font-size: 0.8rem;
     width: 80%;
  
     margin: -0.7rem;
     /* margin-bottom: -0.5rem; */

    
 } 

 .cardd-body label {
     font-size: 0.8rem;
     /* margin: -1rem; */
     
 } 
 .cardd-body input {
     font-size: 0.8rem;
     margin-bottom: -0.5rem;
     
 } 
 .btnn{
    font-size: 0.8rem;
    margin-bottom: 0.5rem;
 }
}
        
 </style>

  <main>  
    @include('partial.alert')


    <div class="card-body bg-white px-3" >
       {{--  style="margin-top:20px; margin-left: 100px; margin-right: 100px"; "--}}
            <div class="card " style="width: 100%" >
                <div class="card-header"><h5>Account</h5></div>
                <div class="cardd-body">
                    <div class="row"style="font-size:1.3rem; margin:0.5rem; hight:100%">
                        <div class="col-4">
                            @include('partial.sidebar')
                        </div>
                        <div class="col-5" style="width: 50%; margin-left: 3rem">
                            <h2 class=" text-uppercase mb-5" >Update your information   {{ $tenant->hospital_name }}</h2>
                            <form action="{{ route('update_account') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-4">
                                <label for="hospital_name">Hospital Name</label>
                                <input type="text" name="hospital_name" value="{{ old('hospital_name', $tenant->hospital_name) }}" class="form-control">
                                @error('hospital_name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="fullname">Full Name</label>
                                <input type="text" name="fullname" value="{{ old('fullname', $user->fullname) }}" class="form-control">
                                @error('fullname')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="email">Email Address</label>
                                <input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password"  class="form-control">
                                @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btnn btn-secondary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
       
      </div>
</main>


 

@endsection
