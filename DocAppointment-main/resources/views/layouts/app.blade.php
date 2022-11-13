<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"defer></script>



   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/dist/css/theme.min.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body>
    <div id="app">
        <nav style="font-weight:bold;font-size:14px;background:#3EACC2;color:#fff" class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <a style="font-size:18px" class="navbar-brand" href="{{ url('/') }}">
                    Doctor Booking
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a style="color:white;" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a style="color:white;" class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if(auth()->check() && auth()->user()->role->name === 'patient')
                            <li class="nav-item">
                                <a style="color:white;" class="nav-link" href="{{ route('my.booking') }}">{{ __('My Booking') }}</a>
                            </li>
                            <li class="nav-item">
                                <a style="color:white;" class="nav-link" href="{{ route('my.prescription') }}">{{ __('My Prescriptions') }}</a>
                            </li>

                            @endif
                            <li class="nav-item dropdown">
                                <a style="color:white; text-transform: capitalize;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div style="margin-right:-30px;max-width:90px;min-width:90px;" class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(auth()->check() && auth()->user()->role->name === 'patient')
                                    <a style="font-weight:bold;width:80px" href="{{url('user-profile')}}" class="dropdown-item">Profile</a>
                                    @else
                                    <a style="font-weight:bold;width:80px"  href="{{url('dashboard')}}" class="dropdown-item">Dashboard</a>
                                    @endif
                                    <a style="color:red;width:80px" class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                           
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        var dateToday=new Date();
  $( function() {
    // $( "#datepicker" ).datepicker({dateFormat:"yy-mm-dd"}).val();  //remove ...
   $("#datepicker").datepicker({
    dateFormat:"yy-mm-dd",
    showButtonPanel:true,
    numberOfMonths:2,
    minDate:dateToday,
   });
   });
  </script>
<style type="text/css">
body{
    background: #fff;
}
.ui-corner-all{
background:red;
color: #fff;
}
label.btn{
    padding: 0;
}
label.btn input{
    opacity: 0; 
    position: absolute;
}
label.btn span{
    text-align:center;
    padding: 6px 12px;
    display:block;
    min-width:80px; 
}
label.btn input:checked+span {
    background-color: rgb(80,110,228);
    color:#fff;
}
    </style>
</body>
</html>