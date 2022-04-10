<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbars/">
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
  <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<!-- Custom styles for this template -->
<link href="navbar.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">

<nav class="nav nav-pills nav-fill bg-dark p-2">
  <a class="nav-item nav-link active col-2 bg-light h-100 text-dark  " href="{{ route('home') }}" >El-HED Store</a>
    <form method="POST" action="{{route('search1')}}" class="form-inline  col-8">
    @csrf
                        @method("POST")
        <input class="form-control mr-sm-2 col-10 " name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i>
        </button>
    </form>


  @guest
  <a class="nav-item nav-link col-1 float-right text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
      @if (Route::has('register'))
      <a class="nav-item nav-link col-1 my-2 my-lg-0 text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
      @endif
  @else
  <li class="nav-item dropdown col-2 float-right">
        <a class="nav-link dropdown-toggle float-right text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
            <a href="{{ route('logout') }}"
                class="dropdown-item font-weight-bold text-dark"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                 Déconnexion 
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden text-dark">
                {{ csrf_field() }}
            </form>
            @if(Auth::user()->status)
                   <span class="dropdown-item font-weight-bold disabled text-dark">Edit</span>
                    <div class="dropdown-divider text-dark"></div>
                    <a class="dropdown-item pr-3 text-dark" href="{{ route('show.commande') }}">Commandes</a>
                    <a class="dropdown-item pr-3 text-dark" href="{{ route('show.product') }}">Products</a>
            @endif                 
        </div>
       
      </li>
      @endguest
</nav>

<div class="container mt-4">
    @include('alert.message')
    @yield('content')
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    @yield('js')

</body>
</html>
