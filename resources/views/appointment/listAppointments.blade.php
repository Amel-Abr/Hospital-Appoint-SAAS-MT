@extends('layouts.app3')

@section('titl')
Appointments
@endsection

@section('imgUser')admin
@endsection


@php
   $isAdmin=Auth::user()->isAdmin;
@endphp
@section('content_main')
<main>

 
  <style>
    .btnOf{
    font-size: 1.2rem;
    padding: 6px 16px;
    margin-top: 2rem;
    margin-bottom: 0.7rem;
    /* background: var(--movvv-color); */
    color: white;
    border: none ;
    border-radius: 4px;
    outline: none;
    text-decoration: none;
}
  </style>
  


    <h1 style="margin-top:10px;margin-bottom: 10px;">List Of Appointments <br><br></h1>
@include('partial.alert')

    @if (!$isAdmin)

    @if (auth()->user()->canAddAppointment() && !auth()->user()->pausedInfo())
    <button class="btnn btn-secondary mb-1 mt-2  ml-3" data-toggle="modal" data-target="#addAppointment">
        <i class="material-icons align-top mr-1">add</i>
        Add
   </button>
   @else
   <button class="btnOf btn-dark mb-1 mt-2 ml-3" >
    <i class="material-icons align-top mr-1">add</i>
    Add
  </button>
   @endif



   @endif
  <div class="card-body bg-white" style="margin: 20px">
       
    <table class="table table-striped table-bordered">
      <thead>
          <tr>
            <th>Patient Name</th>
            <th>Patient Phone</th>
            <th>Patient Address</th>
            <th>Patient email</th>
            <th>Doctor Name</th>
            <th>Date</th>
            <th>Time</th>
                   <th colspan="3">Actions</th>
           
          </tr>
      </thead>
      <tbody>
        @foreach ($appointments as $appointment)
          <tr>
            <td>{{ $appointment->patientName }}</td>
            <td>{{ $appointment->patientphone }}</td> 
            <td>{{ $appointment->patientAddress }}</td>
            <td>{{ $appointment->patientEmail }}</td>
            <td>{{ $appointment->doctornName }}</td>
            <td>{{ $appointment->date }}</td>
            <td>{{ $appointment->time }}</td>

            @if (auth()->user()->pausedInfo())

            <td class="text-center">
              <a href="javascript:void(0)"
               onclick="editAppointment({{$appointment->id}})">
                  <img src="/images/editblack.png" alt="edit" width="25">
              </a>
          </td>   
               @if ($isAdmin)
              <td class="text-center">
                <a href="javascript:void(0)" 
                onclick="deleteAppointment({{$appointment->id}})" >
                  <img src="/images/deleteblack.png" alt="delete" width="25">
                </a>
              </td>
              @endif


            @else
            <td class="text-center">
              <a href="javascript:void(0)"
               data-toggle="modal" data-target="#editAppointmentModal" 
               onclick="editAppointment({{$appointment->id}})">
                  <img src="/images/edit.png" alt="edit" width="25">
              </a>
          </td>   
               @if ($isAdmin)
              <td class="text-center">
                <a href="javascript:void(0)" 
                data-toggle="modal" data-target="#deleteAppointmentModal" 
                onclick="deleteAppointment({{$appointment->id}})" >
                  <img src="/images/delete.png" alt="delete" width="25">
                </a>
              </td>
              @endif
              @endif
          </tr>
        @endforeach
      </tbody>
    </table>
   
  </div>


     
{{-- *****************************************modals************************** --}}
<div class="modal fade" id="editAppointmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Appointment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editAppointmentForm"  action="{{ Route('admin.updateA') }}" method="POST">
          @csrf
            @method('PUT')
            <input type="hidden" name="id" id="id">

            <div class="col-auto">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="FullName">
              </div>
            </div>


            <div class="col-auto">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-phone"></i></div>
                </div>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
              </div>
            </div>

            <div class="col-auto">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-map-marker" aria-hidden="true"></i>
                  </div>
                </div>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
              </div>
            </div>

            <div class="col-auto">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
            </div>
             <div class="col-auto">
              <div class="input-group mb-2">
                 <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-user-md" aria-hidden="true"></i>  </div>
                </div>
                <input type="text" class="form-control" id="fullnameD" name="fullnameD" placeholder="Doctor Name">
              </div>
            </div>
           


            <div class="col-auto ">
              <div class="input-group mb-2 col-sm-6">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input type="date" class="form-control" id="date" name="date" placeholder="Date">
              </div>
            </div>
        
          <div class="col-auto ">
            <div class="input-group mb-2 col-sm-6">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-clock"></i></div>
              </div>
              <input type="time" class="form-control" id="time" name="time" placeholder="Time">
            </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btnn btn-secondary" data-dismiss="modal">Cancel</button>
              <input type="submit" value="Update" class="btnn btn-primary">
            </div>
          </form>
      </div>
      
    </div>
  </div>
</div>




  {{-- *****************************************edit patient************************** --}}
  <div class="modal fade" id="addAppointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Appointment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ Route('doctor.storeA') }}" method="POST">
            @csrf
              
            <div class="col-auto">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input type="text" class="form-control" id="fullname" name="fullnameP" placeholder="FullName">
              </div>
            </div>
            <div class="col-auto">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-phone"></i></div>
                </div>
                <input type="text" class="form-control" id="phone" name="phoneP" placeholder="Phone">
              </div>
            </div>
            <div class="col-auto">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-map-marker"></i></div>
                </div>
                <input type="text" class="form-control" id="address" name="addressP" placeholder="Address">
              </div>
            </div>
            <div class="col-auto">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                </div>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
            </div>
           
            <div class="col-auto ">
              <div class="input-group mb-2 col-sm-6">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input type="date" class="form-control" id="date" name="date" placeholder="Date">
              </div>
            </div>
        
          <div class="col-auto ">
            <div class="input-group mb-2 col-sm-6">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-clock"></i></div>
              </div>
              <input type="time" class="form-control" id="time" name="time" placeholder="Time">
            </div>
          </div>
  
  
           
              <div class="modal-footer">
                <button type="button" class="btnn btn-secondary" data-dismiss="modal">Cancel</button>
                <input type="submit" value="Add" class="btnn btn-primary">
              </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>
  

  {{-- *****************************************delete patient************************** --}}

<div class="modal fade" id="deleteAppointmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Appointment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Do you really want to remove this Appointment ?</p>
          <small class="font-weight-bold" style="color:#edb200;">
              <i class="fas fa-exclamation-triangle"></i>
              This action can not be canceled !
          </small>
          <div class="modal-footer">
            <button type="button" class="btnn btn-secondary" data-dismiss="modal">Cancel</button>
            <form id="deleteAppointmentForm" method="POST">
              @csrf
              @method('DELETE')
              <input type="submit" value="Delete" class="btnn btn-danger">
            </form>
            
          </div>
        </div>
        
      </div>
    </div>
  </div>
  


{{-- ********************************************js************************************* --}}

  <script>
     function editAppointment(id){
      $.get('/appointment/' + id, function(appointment){
        $('#fullname').val(appointment.patientName);
        $('#address').val(appointment.patientAddress);
        $('#phone').val(appointment.patientphone);
        $('#email').val(appointment.patientEmail);
        $('#fullnameD').val(appointment.doctornName);
        $('#date').val(appointment.date);
        $('#time').val(appointment.time);
        $('#id').val(appointment.id);
      });

     
    }
    


    function deleteAppointment(id){
      $('#deleteAppointmentForm').attr('action', '/appointment/' + id);
    }
  </script>
</main>
@endsection