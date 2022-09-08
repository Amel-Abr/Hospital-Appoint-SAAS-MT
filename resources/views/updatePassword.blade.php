<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hospital Appointements</title>
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <script>/js/app.js</script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="http://unicons.iconscout.com/release/v4.0./css/line.css">
 <link rel="stylesheet" href="/css/styles.css">
 <link rel="stylesheet" href="/css/app.css">



 

</head>
<body>
<style>
    .BtnUpd{
    padding: 1rem 0.5rem;
    font-size: 1.2rem;
    color: #fff;
    border-color: #14265c;
    background: var(--movvv-color);
    border-radius: 10%;
    cursor: pointer;
    margin-left: 25%;
    margin-top: -0.5rem;
    }
</style>


    <!-- header  -->
    <header name="welcm">
        <div class="logo">
            <img src="/images/logo4.jpg" alt="">
               Med<span style="color:blueviolet">Care</span>
          </div>
    </header>
{{-- header end  --}}

{{--  home section  --}}
<section class="home" id="home">
  
   
 <div class="logContent ">
  <br>

@if ($message = Session::get('status'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
   <div class="forms" >
       <div class="form login" >
        <p style="font-size: 1.4rem ; text-align: center;">RESET PASSWORD</p>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ request()->token }}">

            <div class="row mb-3">
                <label for="email" class="col-md-3 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-7">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-3 col-form-label text-md-end">{{ __('Password') }}</label>

                <div class="col-md-7">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="password-confirm" class="col-md-3 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                <div class="col-md-7">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class=input-field>
                <button type="submit" class="BtnUpd" >
                    Reset Password
                </button>
         </div>
        </form>
     </div>

    
   
  
    
  </div>
</div>

<div class="imglog"> <img src="/images/loginDoc1.png" ></div>




   
</section>






<script src="/js/script.js"></script>

</body>
</html>