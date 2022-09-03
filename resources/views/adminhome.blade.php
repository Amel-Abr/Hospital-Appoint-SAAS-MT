@extends('layouts.app3')

@section('titl')
Dashboard
@endsection
@section('imgUser')admin
@endsection 

@section('user')
<h5>admin</h5>


@endsection


@section('content_main')
<main>
    @php
        $tenant = auth()->user();
        $tenant_ID = $tenant->Tenant_ID;
        $nbrD = \App\Models\User::where('Tenant_ID', $tenant_ID)->count()-1;
        $nbrA = \App\Models\Appointment::where('Tenant_ID', $tenant_ID)->count();
        $nbrP = \App\Models\Patient::where('Tenant_ID', $tenant_ID)->count();
    @endphp
    <div class="cards">
        <div class="card-single">
            <div>
                <h1>{{ $nbrD}} </h1>
                <a href="{{ url('admin/doctors') }}"> 
                <span style='font-size:16px'>Doctors</span>
                </a>
            </div>
            <div class="imgDash">
                <img src="/images/doctor1.png" width="120px" height="90px" alt="">
            </div>
        </div>
        
        <div class="card-single">
            <div>
                <h1>{{  $nbrA}} </h1>
                <a href="{{ url('admin/appointments') }}"> 
                <span style='font-size:16px'>Appointments</span>
                </a>
            </div>
            <div class="imgDash">
                <img src="/images/appoint1.png" width="100px" height="90px" alt="">
            </div>
        </div>
       
        <div class="card-single">
            <div>
                <h1>{{ $nbrP}} </h1>
                <a href="{{ url('admin/patients') }}"> 
                <span style='font-size:16px'>Patients</span>
                </a>
            </div>

            <div class="imgDash">
                <img src="/images/patieDash.png" width="100px" height="100px" alt="">
            </div>
        </div>
    </div>

</main>
@endsection
 