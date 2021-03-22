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

   
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 

</head>
<body>
    <div id="app">
        <nav style="z-index:8000;" class="position-fixed navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" style="justify-content: space-around;">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a class="navbar-brand" href="{{ url('/products') }}">
                    Products
                </a>
                <!-- <a class="navbar-brand" href="{{ url('/main') }}"> -->
                <a href="{{ url('/main') }}" style="color:black;text-decoration:none;cursor:pointer;" class="navbar-brand"><i class="material-icons">search</i></a>
                <!-- </a> -->


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div style="widht:100%;" class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text-center">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{ route('login') }}"><h6>{{ __('Login') }}</h6></a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="{{ route('register') }}"><h6>{{ __('Register') }}</h6></a>
                                </li>
                            @endif
                        @else
                             <li class="nav-item dropdown" style="">
                             <a class='dropdown-trigger bg-dark text-decoration-none'  data-target='dropdown1'>menu</a>
                            </li> 
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


  <!-- Dropdown Structure -->
  <ul id='dropdown1' class='dropdown-content'>
  <li><a style="text-decoration:none;" href="{{ route('userHome',['name'=>'action']) }}">home</a></li>
    <li><a style="text-decoration:none;" href="{{ url('/add') }}">Add</a></li>
    <li><a style="text-decoration:none;" href="/main">Main</a></li>
    <li class="divider" tabindex="-1"></li>
    <div class="" aria-labelledby="">
 
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
  </ul>

        <main style="width:100%;top:12vh;" class="position-relative py-4">
            @yield('content')
        </main>



    </div>

    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>

$('.dropdown-trigger').dropdown();

  </script>

</body>
</html>
