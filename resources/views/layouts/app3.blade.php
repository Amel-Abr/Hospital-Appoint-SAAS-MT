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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="/css/styles.css">
  <style src="{{ asset('/css/styles.css') }}"></style>
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/> --}}
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  @yield('style')
  @paddleJS
</head>



<style>

.main-header ul{
    padding: 0;
    margin:0;
    list-style: none;
}

.main-header .navigation{
/* width/:400px; */
/* margin-top: 10px; */
/* background-color: #eee; */
/* padding: 0 20px; */
/* min-height: 48px; */

}
.main-header .navigation > li{
    /* padding: 15px 10px; */
   
    float:left;

}

.navigation .menu{
    margin-top: 8px;
    margin-left:890px;
    padding-right: -800px; 
     padding-top:6px; 
     position: absolute;
     /* height: 30px; */
 
     
}


.submenu{
 margin:10px; 
 padding: 20px;
 position: absolute;
 top: 34px;
 height: 80px;
 width: 150px;
 background-color:#fff;
-webkit-box-shadow: 1px 1px 1px rgba(0, 0, 0, .5);
-moz-box-shadow: 1px 1px 1px rgba(0, 0, 0, .5);
box-shadow: 1px 1px 1px rgba(0, 0, 0, .5);
display: none;
}
.submenu li{
    margin-left: 17px;
    padding-bottom: 7px;
    padding-top: 5px;
  
}

.submenu li a{
    color: rgb(65, 63, 63);
    text-decoration: none;
   
}
.submenu li a:hover {
    /* color: #2477BF; */
  color: lightsteelblue;
}

.navigation .submenu:before{
    content:"";
    border-right: 6px solid transparent;
    border-left: 6px solid transparent;
    border-bottom: 6px solid #fff;
    height: 0;
    width: 0;
    position: absolute;
    left: 30px;
    top: -6px;
}

.navigation .menu:hover .submenu{
    display: block;

}
    @media (min-width: 320px) and (max-width: 480px) {

      
.sidebar {

    width: 150px;
    position: fixed;
    left: 0;
    top: 0;
    height: 100%;
    background: var(--maiin-color);
    /* z-index: 100; */
    transition: width 300ms;
}

.main-header{
    background: #fff;
    display: flex;
    font-size: 1rem;

    justify-content:none;
    padding: 2rem 1.7rem ;
    box-shadow: 2px 2px 5px var(--main1-color);
    position: fixed;
    left: 150px;
    width: calc(100% - 120px);
    height: 6.2%;
    top: 0;
    z-index: 100;
    transition: left 300ms;
}
.main-header li h2 { 
  font-size: 1.5rem;

}
.main-header li .menu  a {
  font-size: 1rem;

  
 } 

.sidebar-brand h2 span{
    left: -1rem;
    font-size: 2rem;
}

.sidebar-menu a{
  

  font-size: 1.2rem;

}

.main-content {
    margin-left: 90px;
    transition: margin-left 300ms; 
    width: 100%;
}



main{
    margin-top: 85px;
    padding: 1rem 1rem;
    background:#e6d8ff;
    min-height: calc(100vh - 85px);
   
}


}
.sidebar-menu a.active {
    padding-top: 1rem;
    padding-bottom: 1rem;
    padding-left: 0.7rem;
    margin-left: -0.6rem;
   
    background: #fff;
    color: var(--pink-color);
    border-radius: 30px 0px 0px 30px ;
}

.sidebar-menu a:hover {
    padding-top: 1rem;
    padding-bottom: 1rem;
    padding-left: 0.7rem;
    margin-left: -0.6rem;
    color: var(--pink-color);

}




</style>
<body>
 
{{--  home section  --}}
<input type="checkbox" id="nav-toggle">


@php
              
$isAdmin=Auth::user()->isAdmin;


if($isAdmin)
{
    $liN="dashboard";
    $icon="home";
    $home="admin/dashboard";
    $url="admin";
    $name=Auth::user()->fullname;
    $img="admin";
    $action="action1";
    $act="'act1'";
    $route="dashboard";
    $routeD="admin.";
}
else {
    $liN="profile";
    $icon="user-alt";
    $home="/home";
    $url="doctor";
    $name=Auth::user()->fullname;
    $img="doct";
    $action="action2";
    $act="'act2'";
    $route="home";
    $routeD="";
}
     

@endphp

 

<div class="sidebar">
   <div class="sidebar-brand">
      
      <h2><div class="logo">
           <img src="/images/logo4.jpg" alt="">
               <span> Med<span style="color:blueviolet">Care</span></span>
          </div>
     </h2>
       </div>
       
   <div class="sidebar-menu" id="sidebare">
       <ul>
         @if (!$isAdmin || Auth::user()->hasSubscription()) 
        <li>
          {{-- --}}
            <a href=" {{ url( $home) }}"   class="{{ Route::currentRouteName() == $route  ? 'active' : ''  }}" style="text-decoration: none" ><span class=" fa fa-{{$icon}}" ></span>
            <span>{{ $liN }}</span></a>
          </li> 
           
          <li>
            <a href="{{ url($url.'/doctors') }}"   class="{{ Route::currentRouteName() == $routeD.'doctors' ? 'active' : ''  }}" style="text-decoration: none"><span class="fas fa-user-md"></span> 
          <span>Doctors</span></a>
          </li>
          <li >
            <a href="{{ url($url.'/appointments') }}" class="{{ Route::currentRouteName() == 'appointments' ? 'active' : ''  }}"  style="text-decoration: none"><span class="far fa-calendar-alt"></span> 
          <span>Appointments</span></a>
          </li>
          <li >
            <a href="{{ url($url.'/patients') }}" class="{{ Route::currentRouteName() == 'patients' ? 'active' : ''  }}" " style="text-decoration: none"><span class="fas fa-procedures"></span> 
          <span>Patients</span></a>
        </li>
        <li class="nav-log">
            <a href="#" class=" text-danger" style="text-decoration: none" onclick="event.preventDefault(); 
            document.getElementById('logout-form').submit();" >
                <span ><img src="/images/logout1.png"  width="23px" height="23px" alt="" ></span>
                <span>Logout</span> 
            </a>
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
       </li>
           
       @else
           
       <li>
        <a href="javascript:void(0)" title="You haven\'t subscribed until now"  class=" text-black-50"  style="text-decoration: none"  ><span class="fa fa-{{$icon}} " ></span>
        <span>{{ $liN }}</span></a>
      </li> 
       
      <li>
        <a href="javascript:void(0)" title="You haven\'t subscribed until now" class=" text-black-50" style="text-decoration: none" ><span class="fas fa-user-md "></span> 
      <span>Doctors</span></a>
      </li>
      <li>
        <a href="javascript:void(0)" title="You haven\'t subscribed until now" class=" text-black-50" style="text-decoration: none"><span class="far fa-calendar-alt "></span> 
      <span>Appointments</span></a>
      </li>
      <li>
        <a href="javascript:void(0)" title="You haven\'t subscribed until now" class=" text-black-50" style="text-decoration: none"><span class="fas fa-procedures "></span> 
      <span>Patients</span></a>
    </li>
    <li class="nav-log">
        <a href="#" class=" text-danger" style="text-decoration: none" onclick="event.preventDefault(); 
        document.getElementById('logout-form').submit();" >
            <span ><img src="/images/logout1.png"  width="23px" height="23px" alt="" ></span>
            <span>Logout</span> 
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
   </li>

       @endif
       </ul>
   </div>
</div>


<div class="main-content">
    <header class="main-header">
    <ul class="navigation">
        <li>
           <h2>
            <label for="nav-toggle">
                <span class="las la-bars"></span>
            </label> 
            @yield('titl')

            </h2>
        </li>
        {{-- @yield('imgUser') --}}
        {{-- <li></li> --}}
        {{-- <div class="user-wrapper"> --}}
            {{-- <img src="/images/{{$img}}.png" width="30px" height="30px" alt=""> --}}
            <li class="menu">
                <a style="font-size: 1.5rem">Hello  {{ $name }} </a>
                <ul class="submenu">
                  @if ($isAdmin)
               <li><a href="{{ route('account') }}" style="font-size: 1.3rem"> My Account</a></li>
                 @else
                    <br>
                 @endif


               <li class="nav-log">
                <a href="#" class=" text-danger" onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();" >
                    <span ><img src="/images/logout1.png"  width="20px" height="20px" alt="" ></span>
                        <span style="font-size: 1.3rem">    Logout</span> 
                </a>
                                        
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
               </form>
               </li>

                </ul>
            </li>
            
    </ul>
    </header>



    
    @yield('content_main')
    
    
            @yield('content')

</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>/js/script.js</script>





</body>
</html>

