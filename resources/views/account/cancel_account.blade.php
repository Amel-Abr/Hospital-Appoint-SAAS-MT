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
    .cardd-body h1{
    font-size: 1.3rem;
     } 
     
     .cardd-body .cont{
        margin-left: 3rem;
      }
    
    
    
    .btnP{
        padding: 1rem 1rem;
        font-size: 1.5rem;
        color: #fff;
        border-color: #14265c;
        border-radius: 9%;
        background: var(--movvv-color);
        cursor: pointer;
    }
    .btnP:hover {
        color: lightsteelblue;
      
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
    
        .cardd-body h1{
         font-size: 0.8rem;
         width: 80%;
      
        
         /* margin-bottom: -0.5rem; */
    
        
     } 
     .cardd-body th{
         font-size: 0.8rem;
         width: 80%;
      
    
     } 
     .cardd-body td{
         font-size: 0.8rem;
         width: 80%;
     }
     .cardd-body .cont{
        margin-left: 1.5rem;
      }
    
      .btnP{
        padding: 0.8rem 0.8rem;
        font-size: 0.8rem;
      
    }
    }
    

    </style>

    <main>
  
      
    @include('partial.alert')


    <div class="card-body bg-white px-3" >
      
            <div class="card " style="width: 100%" >
                 <div class="card-header"><h5>Cancel Account</h5></div>
                <div class="cardd-body">
                    <div class="row"style="font-size:1.3rem; margin:1rem; hight:100%">
                        <div class="col-4">
                            @include('partial.sidebar')
                        </div>
                        <div class="cont col-5" style="width: 60%;">
                                              
                           <h1 class="h5 text-uppercase  mb-4 ">Pause Account</h1>
                      
                           <form action="{{ route('do_pause_account') }}" method="post">
                            @csrf
                            <div class="form-group text-center">
                                <button type="submit" class="btnP">
                                    {{ $subscription->onPausedGracePeriod() ? 'Continue my account' : 'Pause my account' }}
                                </button>
                            </div>
                           </form>


                        <br>
                        <hr>
                        <br>
                        <h1 class="h5 text-uppercase  mb-4" >Terminate my account permanantly</h1>
                        <form action="{{ route('do_terminate_account') }}" method="post">
                            @csrf
                            <div class="form-group text-center">
                                <button type="submit" class="btnP">
                                   Yes, sure! Terminate my account now
                                </button>
                            </div>
                           </form>
                        </div>
                    </div>
                </div>    
            </div>    
   </div>        
</main>


 

@endsection    