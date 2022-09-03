@if ($errors->any())
    
    <div class="alert alert-danger alert-block" style="width: 40% ; margin-left:5% ">
    {{-- <div class="flag note note--error" style="margin-top:50px"> --}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-left:100% ">
        <span aria-hidden="true">&times;</span>
      </button>
      @foreach ($errors->all() as $error)
        {{-- <div class="flag__image note__icon">
          <i class="fa fa-times"></i>
        </div> --}}
          <div class="flag__body note__text">
            {{ $error }}
          </div>
        {{-- <a href="#" class="note__close"> --}}
          
      @endforeach
      
      {{-- <a href="#" type="button" class="close" data-dismiss="alert">
          <i class="fa fa-times"></i>
        </a> --}}
    {{-- </div> --}}
    </div>
@endif
{{-- @if ($message = Session::get('errors'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif --}}
{{--  
  @if(session('success'))
  <div class="flag note note--success" style="margin-top:50px">
    <div class="flag__image note__icon">
      <i class="fa fa-check"></i>
    </div>
    <div class="flag__body note__text">
      {{ session('success') }}
    </div>
    <a href="#" class="note__close">
      <i class="fa fa-times"></i>
    </a>
  </div>
@endif  --}}
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
  

   
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
   
@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
