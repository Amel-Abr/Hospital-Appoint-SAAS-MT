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
 
 .cardd-body .cont{
    margin-left: 3rem;
  }

.btnS{
    padding: 1rem 1rem;
    font-size: 1.5rem;
    color: #fff;
    border-color: #14265c;
    border-radius: 9%;
    /* background: var(--movvv-color); */
    cursor: pointer;
}
.btnS:hover {
    color: lightsteelblue;
  
}
.btnSC{
          background: var(--movvv-color);    
}
.radio-tile-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .input-container {
            display: inline-table;
            position: relative;
            /* height: 7rem; */
            width: 35%;
            margin: 0.7rem;
        }
        .input-container .radio-button {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            margin: 0;
            cursor: pointer;
        }
        .input-container .radio-tile {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;

            border: 1.6px solid var(--movvv-color);
            border-radius: 5px;
            padding: 1rem;
            transition: transform 300ms ease;
        }
        .input-container .icon svg {
            fill: var(--movvv-color);
            width: 3rem;
            height: 3rem;
        }
        .input-container .radio-tile-label {
            text-align: center;
            font-size: 1rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--movvv-color);
        }
        .input-container .radio-button:checked + .radio-tile {
            background-color: var(--movvv-color);
            border: 2px solid var(--movvv-color);
            color: white;
            transform: scale(1.1, 1.1);
        }
        .input-container .radio-button:checked + .radio-tile .icon svg {
            fill: white;
            background-color: var(--movvv-color);
        }
        .input-container .radio-button:checked + .radio-tile .radio-tile-label {
            color: white;
            background-color: var(--movvv-color);
        }
        .input-container ul, .input-container li {
            margin: 0;
            padding: 0;
        }
        .input-container ul {
            list-style: none;
            text-align: center;
        }
        .input-container li {
            text-align: left;
            width: 140%;
        }


/* *************************** */
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

    .cardd-body h1{
     font-size: 0.8rem;
     width: 80%;
  
     margin: -0.7rem;
     /* margin-bottom: -0.5rem; */

    
 } 
 .cardd-body p{
     font-size: 0.8rem;
     width: 80%;
  

 } 
 .cardd-body h3{
     font-size: 0.8rem;
     width: 80%;
 }
 .cardd-body .cont{
    margin-left: 1.5rem;
  }
  
 .btnS{
    padding: 0.8rem 0.8rem;
    font-size: 0.8rem;
   
}


        .input-container {
            width: 40%;
            margin: 0.5rem;
        }
        .input-container .radio-button {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            height: 80%;
            width: 100%;
            margin: 0;
            cursor: pointer;
        }
        .input-container .radio-tile {
            width: 80%;
            height: 80%;

           
            padding: 1rem;
        }
        .input-container .icon svg {
            width: 3rem;
            height: 3rem;
        }
        .input-container .radio-tile-label {
       
            font-size: 0.7rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--movvv-color);
        }
 
        .input-container ul, .input-container li {
            margin: 0;
            padding: 0;
        }
        .input-container ul {
            list-style: none;
            text-align: center;
        }
        .input-container li {
            text-align: left;
            width: 100%;
        }
        .radio-tile-group .icon  {
     font-size: 0.8rem;
     /* margin: -1rem; */
     
 } 
 .radio-tile-group  li {
     font-size: 0.6rem;

     
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
       {{--  --}}
            <div class="card " style="width: 100%" >
                 <div class="card-header" ><h5>Subscriptions</h5></div>
                <div class="cardd-body">
                    <div class="row"style="font-size:1.3rem; margin:1rem; hight:100%">
                        <div class="col-4">
                            @include('partial.sidebar')
                        </div>
                        <div class="cont col-5" style="width: 60%; ">
                                              
                           <h1 class="h5 text-uppercase  mb-4"  >Your Subscription to plan: {{ $userPlanName}}</h1>
          
                            @if ($userNextPaymentDate != '')
                              <p>Your next payment will be on {{ $userNextPaymentDate }} with amount: ${{ $userNextPaymentAmount }}</p>
                              
                            @endif

                            @if ($userPlanTrail != '')
                              <p>Your trail subscription will end on : {{ $userPlanTrail }}</p>
                              
                            @endif
                           <h3 class =" text-uppercase  mb-5"> Personal plans:</h3>

                           <div class="text-center mb-4">
                            <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                                <a href="{{ route('subscriptions', ['interval' => 'month']) }}" class="btnS  {{ !request('interval') || request('interval') == 'month' ? 'btnSC' : ' btn-secondary' }}">Monthly</a>
                                <a href="{{ route('subscriptions', ['interval' => 'year']) }}" class="btnS {{ request('interval') == 'year' ? 'btnSC' : ' btn-secondary' }}">Yearly</a>
            
                            </div>
                           </div>


                           <form action="{{ route('subscribe') }}" method="post">
                            @csrf
                            <div class="radio-tile-group mb-5">
                                @foreach($plans as $plan)
                                    <div class="input-container">
                                        <input type="radio" name="plan" id="plan_{{ \Illuminate\Support\Str::snake($plan->name) }}"  class="radio-button "  value="{{ $plan->id }}"  
                                        {{ $plan->id == $userPlanId ? 'checked' : '' }}  />
                                        <div class="radio-tile">
                                            <div class="icon walk-icon">
                                                {{ $plan->id . ' - ' . $plan->name }}
                                            </div>
                                            <label for="plan_{{ \Illuminate\Support\Str::snake($plan->name) }}" class="radio-tile-label">${{ (int)$plan->price }}</label>
                                        </div>
    
                                        <ul class="mt-2">
                                            @foreach($plan->features as $feature)
                                                <li>{{ $feature->value == 100000 ? 'Unlimited' : $feature->value }} {{ $feature->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                            

                            <div class="row">
                              <div class="col-12">
                                @error('plan')<span class="text-danger">{{ $message }}</span>@enderror
                                <div class="form-group text-center">
                                  <button type="submit" class="btnn">
                                    {{ $userPlanName == 'Free' ? 'Subscribe' : 'Update your subscription'  }}
                                  </button>
                                </div>
                              </div>
                            </div>

                          </form> 
    
                           
                        </div>
                    </div>
                </div>    
            </div>    
    </div>        
</main>


 

@endsection    