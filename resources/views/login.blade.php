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
           <h2>Login</h2>
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
               
                     <div class="input-field">
                     <input id="password" type="password" name="password" placeholder= "Enter your password" 
                     class="password input @error('password') is-invalid @enderror
                    " data-type="password" required autocomplete="current-password">
                    <i class="fas fa-lock icon"></i>
                    <i class="fas fa-eye-slash showHidePw"></i>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong><br><br><br>{{ $message }}</strong>
                        </span>
                    @enderror
                   </div>
  

                <div class="checkbox-text">
                    <div class="checkbox-content">
                        <input type="checkbox" id="logCheck">
                        <label for="logCheck" class="text"> Remember me</label>
                    </div>
                    <a href="{{ url('/rest') }}" class="text"> Forgot password?</a>
                </div>

               <div class=>
                 <div class=input-field>
                         <button type="submit" class="logBtn   " >
                            {{ __('Login') }}
                         </button>
                  </div>
                </div>
                <div class="login-singup">
                    <span class="text">Not a member?
                       <a href="javascript:void(0)" class="text signup-link">Signup now</a>
                    </span>
                </div>
     
            </form>
     </div>

    
   
  
      {{-- Registration form --}}
 
        
        <div class="form signup">
            <h2>Sign up</h2>
          <form method="POST" action="{{ route('registration') }}" >
            
                 @csrf
 
                 {{-- <div class="input-field">
                    <input id="name" type="text" name="fullname" placeholder= "Enter your name" class="input" required autocomplete="name" >
                    <i class="fas fa-user icon"></i>
                </div>  --}}

                <div class="input-field">
                    <input id="name" type="text" name="hospital_name" placeholder= "Enter your hospital name" class="input" required autocomplete="name" >
                    <i class="fas fa-user icon"></i>
                </div> 

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
          
            
                     <div class="input-field">
                        <input id="password" type="password" name="password" placeholder= "Create a password" 
                        class="password input @error('password') is-invalid @enderror
                       " data-type="password" required autocomplete="current-password">
                       <i class="fas fa-lock icon"></i>
   
                       @error('password')
                           <span class="invalid-feedback" role="alert">
                               <strong><br><br><br>{{ $message }}</strong>
                           </span>
                       @enderror
                      </div>

                      <div class="input-field">
                        <input id="password_confirmation" type="password" name="password_confirmation" placeholder= "Confirm a password" 
                        class="password input @error('password') is-invalid @enderror
                       " data-type="password" required autocomplete="current-password">
                       <i class="fas fa-lock icon"></i>
                       <i class="fas fa-eye-slash showHidePw"></i>
   
                       @error('password')
                           <span class="invalid-feedback" role="alert">
                               <strong><br><br><br>{{ $message }}</strong>
                           </span>
                       @enderror
                      </div>
          
                <div class=>
                  <div class=input-field>
                          <button type="submit" class="logBtn" >
                             {{ __('Sign Up') }}
                          </button> 
                         
 
                     </div>
                 </div>
                 <div class="login-singup">
                    <span class="text">A member?
                       <a href="javascript:void(0)" class="text login-link">login now</a>
                    </span>
                </div>
                
         </form>
     </div>  
  </div>
</div>

<div class="imglog"> <img src="/images/loginDoc1.png" ></div>




   
</section>






{{-- <script>
const container = document.querySelector(".logContent"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password");



pwShowHide.forEach(eyeIcon =>{
    eyeIcon.addEventListener("click", ()=>{
        pwFields.forEach(pwField =>{
            if(pwField.type ==="password"){
                pwField.type = "text";

                // pwShowHide.forEach(icon =>{
                // pwShowHide.classList.replace("fa-eye-slash",
                //     "fa-eye");
                // });
            }else{
                pwField.type = "password";
            //     pwShowHide.forEach(icon =>{
            //     pwShowHide.classList.replace("fa-eye",
            //         "fa-eye-slash");
            // })




         }
        })
    })
})




</script> --}}






<script src="/js/script.js"></script>

</body>
</html>