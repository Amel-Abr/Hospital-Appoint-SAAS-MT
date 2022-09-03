<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hospital Appointements</title>

 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="http://unicons.iconscout.com/release/v4.0./css/line.css">
 <link rel="stylesheet" href="/css/styles.css">



 

</head>
<body>
<style>
    .BtnRest{
    padding: 1rem 1rem;
    font-size: 1.2rem;
    color: #fff;
    border-color: #14265c;
    background: var(--movvv-color);
    border-radius: 10%;
    cursor: pointer;
    margin-left: 1.6rem;
    margin-top: -0.5rem;
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
  
   
 <div class="logContent ">
 
   <div class="forms">
       <div class="form login">
        <p style="font-size: 1.4rem ; text-align: center;">RESET PASSWORD</p>
           <form method="POST" action="{{ route('login') }}" >
           
                @csrf

                        <div class="input-field">
                       <input id="email" type="email" name="email" placeholder= "Enter your email" class="input @error('email') is-invalid @enderror
                       " value="{{ old('email') }}" required autocomplete="email" autofocus>
                       <i class="fas fa-envelope icon"></i>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong><br><br><br>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class=input-field>
                        <button type="submit" class="BtnRest" >
                           SEND PASSWORD REST LINK
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