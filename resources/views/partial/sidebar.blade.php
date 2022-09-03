
<style>

.card{
  width: 100%;
}

.card-body{
    align-content: center;
}
    .card-body h5{
    font-size: 2rem;
    /* margin: -2rem; */

}

.card-body a {
    text-decoration: none;
}

.card-body strong{
   color: #9c65cf; 
   font-size:1.3rem;
   font-weight:bold;
}

.card-body .titl{
  margin-bottom: 3rem;
  /* mb-5 */
}

.card-body a strong:hover {
    color: lightsteelblue;
  
}

@media (min-width: 320px) and (max-width: 480px) {

  .card{
    width: 120%;
  }
.card-body{
    align-content: center;
}
   
    .card-body h5{
    font-size: 1.2rem;
    /* margin-left: 0.2rem; */
    /* margin-right: 0.2rem; */
    
}

.card-body a {
    text-decoration: none;
}

.card-body strong{
   color: #9c65cf; 
   font-size:0.8rem;
   font-weight:bold;
}



.card-body a strong:hover {
    color: lightsteelblue;
  
}
.card-body .titl{
  margin-bottom: 1rem ;
}
}
</style>

@php
    $user = auth()->user();
@endphp


<div class="card border-0 rounded-0 p-lg-4 bg-light" >
    <div class="card-body" style="width: 100%;">
        <h5 class=" mb-5" >Navigation</h5>
        <div class="titl pv-2 px-4  {{ Route::currentRouteName() == 'account' ?  '' : '' }}">
            <a href="{{ route('account') }}"  class="" >
                <strong class=" text-uppercase {{ Route::currentRouteName() == 'account' ? 'text-secondary' : '' }}" > Account</strong>
            </a>
        </div>

        <div class="titl pv-2 px-4 {{ Route::currentRouteName() == 'subscriptions' ?  '' : '' }}">
            <a href="{{ route('subscriptions') }}"  class="">
                <strong class=" text-uppercase {{ Route::currentRouteName() == 'subscriptions' ? 'text-secondary' : '' }}"  >Subscription</strong>
            </a>
        </div>
       @if (auth()->user()->hasSubscription())
        <div class="titl pv-2 px-4 {{ Route::currentRouteName() == 'payment_method' ?  '' : '' }}">
            <a href="{{ route('payment_method') }}" class="">
                <strong class=" text-uppercase {{ Route::currentRouteName() == 'payment_method' ? 'text-secondary' : '' }}" >Payment Method</strong>
            </a>
        </div>

        <div class="titl pv-2 px-4 {{ Route::currentRouteName() == 'receipts' ?  '' : '' }}">
            <a href="{{ route('receipts') }}"  class="">
                <strong class=" text-uppercase {{ Route::currentRouteName() == 'receipts' ? 'text-secondary' : '' }}" >Receipts</strong>
            </a>
        </div>

        <div class="titl pv-2 px-4 {{ Route::currentRouteName() == 'cancel_account' ?  '' : '' }}">
            <a href="{{ route('cancel_account') }}"  class="">
                <strong class=" text-uppercase {{ Route::currentRouteName() == 'cancel_account' ? 'text-secondary' : '' }}">Cancel Account</strong>
            </a>
        </div>

          
      @else
          

        <div class="titl pv-2 px-4  " data-toggle="modal" data-target="#deleteAccountModal" >
            <a href="javascript:void(0)" 
            data-toggle="modal" data-target="#deleteAccountModal" 
            onclick="deleteAccount({{$user->id}})"  class="">
                <strong class=" text-uppercase text-danger">Delete Account</strong>
            </a>
        </div>
       @endif
    </div>
</div>





  {{-- *****************************************delete Account************************** --}}

  <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Do you really want to remove this Account ?</p>
          <small class="font-weight-bold" style="color:#edb200;">
              <i class="fas fa-exclamation-triangle"></i>
              This action can not be canceled !
          </small>
          <div class="modal-footer">
            <button type="button" class="btnn btn-secondary" data-dismiss="modal">Cancel</button>
            <form id="deleteAccountForm" method="POST">
              @csrf
              @method('DELETE')
              <input type="submit" value="Delete" class="btnn btn-danger">
            </form>
            
          </div>
        </div>
        
      </div>
    </div>
  </div>
  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bandle.min.js"></script>

{{-- ********************************************js************************************* --}}

  <script>

    function deleteAccount(id){
      $('#deleteAccountForm').attr('action', '/admin/' + id);
    }
  </script>





