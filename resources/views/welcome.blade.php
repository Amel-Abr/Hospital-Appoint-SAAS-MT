<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hospital Appointements</title>

 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="/css/styles.css">
 {{-- <style src="{{ asset('/css/styles.css') }}"></style> --}}
 

</head>

<body>
<style>
     @media (min-width: 320px) and (max-width: 480px) {

header{
   height: 9%;
   width: 100%;
}
  .logo span {
  margin-bottom: 1rem;

 
}
.home .welContent{
    margin-top: 50%;
   max-width: 65rem;
   align-items: center;
  
   
}

.home .welContent h3{
   font-size: 2rem;
   text-transform: uppercase;
   color:var(--pink-color);
}

.home .welContent p{
   font-size: 1.2rem;
   

}

.imgg{ 
    /* display: none; */
    width: 10%;
   height: 30%;
   left: -2px;
   top: 4rem;
}
 }

</style>
    <!-- header  -->
    <header name="welcm">
       
    <div class="logo">
      <img src="images/logo4.jpg" alt="">
         Med<span style="color:blueviolet">Care</span>
    </div>
    </header>
{{-- header end  --}}

{{--  home section  --}}
<section class="home" id="home">

          <div class="imgg"> <img src="/images/welcom.png"  ></div>
    <div class="welContent">
        <h3>Best Hospital Appointements App </h3>
        <p>Welcome to our application, that enables entering and viewing 
                the appointments of doctors working in a hospital.
        </p>

        
            <br>
        @include('partial.alert')
        <br>
        @guest
       
          <a href="{{url('login') }}" class="btn btn-outline-primary">
            Login
           </a>
        @endguest
        @auth
        <a href="{{url('/home') }}" class="btn btn-outline-primary">
         Home
        </a>
        @endauth

       {{-- <div class="form">
           <h2>Login</h2>
           <form method="POST" action="{{ route('login') }}" >
           
                @csrf

               <div class=" row mb-2">
                //<label for="email" class="col-md-4 col-form-label text-md-left">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                       <input id="email" type="email" name="email" class="input @error('email') is-invalid @enderror
                       " value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 ">
                // <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                 <div class="col-md-6">
                     <input id="password" type="password" name="password" class="input @error('password') is-invalid @enderror
                    " data-type="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                   </div>
                </div>
 
            

               <div class="row mb-0">
                 <div class="col-md-8 offset-md-4">
                         <button type="submit" class="btn btn-primary" >
                            {{ __('Login') }}
                         </button>
                       

                         //<label for="show" class="btn">Login now</label> 
                  </div>
                </div>
            </form>
        </form>
        </div> --}}
    </div>


   
</section>












<script>src="/js/script.js"</script>


</body>
</html>