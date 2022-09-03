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
    
    
    }
    
    </style>

    <main>   
    @include('partial.alert')


    <div class="card-body bg-white px-3" >
      
            <div class="card " style="width: 100%" >
                 <div class="card-header" ><h5>Receipts</h5></div>
                <div class="cardd-body">
                    <div class="row"style="font-size:1.3rem; margin:1rem; hight:100%">
                        <div class="col-4">
                            @include('partial.sidebar')
                        </div>
                        <div class="cont col-5" style="width: 60%; ">
                                              
                           <h1 class="h5 text-uppercase  mb-4 ">Receipts</h1>
                         
                           <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Paid at</th>
                                    <th>Amount</th>
                                    <th>Receipt</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($receipts as $receipt)
                                <tr>
                                    <td>{{ $receipt->paid_at->toFormattedDateString() }}</td>
                                    <td>{{ $receipt->amount() }}</td>
                                    <td><a href="{{ $receipt->receipt_url }}" target="_blank">Download</a></td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                           
                        </div>
                    </div>
                </div>    
            </div>    
   </div>        
</main>


 

@endsection    