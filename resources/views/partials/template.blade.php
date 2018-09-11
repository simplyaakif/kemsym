
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title}} | Kemmet Systems</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="{{URL::asset('/admin/vendors/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::asset('/css/app.css')}}" />
    
</head>
<body>
    
    <header class="main">
        <section class="navigate">
            <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light ">
                            <a class="navbar-brand" href="{!! url('/'); !!}">
                                <img src="{{URL::asset('/img/logo.png')}}" style="max-width: 100px;" alt="" class="img-fluid">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                            </button>
                          
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                              <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                  <a class="nav-link" href="{!! url('/'); !!}">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="{!! url('/goals'); !!}">Goals</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="{!! url('/mission'); !!}">Mission</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="{!! url('/vision'); !!}">Vision</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="{!! url('/contact'); !!}">Contact us</a>
                                </li>
                                
                                @guest
                                <li class="nav-item">
                                  <a class="nav-link btn bk-o" href="{!! url('/login'); !!}"> <i class="fas fa-user"></i> Login/Sign up</a>
                                </li>
                                @else
                                <li class="nav-item dropdown">
                                        <a style="" id="navbarDropdown" class="nav-link dropdown-toggle caret-remove" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="icon-user"></i> 
                                            {{--  <span class="caret"></span>  --}}
                                        </a>
                                        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item">{{ Auth::user()->name }}</a>
                                            @if(Auth::user()->role=='admin')
                                            <a class="dropdown-item" href="{{url('/admin/dashboard')}}">Dashboard</a>
                                            @elseif (Auth::user()->verified=='0')
                                            <a class="dropdown-item" href="{{url('/register-pending')}}">Dashboard</a>
                                            @else
                                            <a class="dropdown-item" href="{{url('/visitor/dashboard')}}">Dashboard</a>
                                            @endif
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
         
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('product.shoppingCart')}}">
                                        {{-- <i class="fas fa-shopping-cart"></i> --}}
                                        <img class="cart" src="{{asset ('img/cart.png')}}" alt="" srcset="">
                                        <span class="cart-badge ">
                                            {{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}
                                        </span>
                                      </a>
                                  </li>
                              </ul>
                            </div>
                    </nav>
            </div>
        </section>
    </header>

    <div id="app">
    @yield('page_data')
    </div>

    <footer class="foot">
        <div class="u-foot">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="logo">
                            <a href="{!! url('/'); !!}">
                                <img src="{{URL::asset('img/greyLogo.png')}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="menu">
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="{!! url('/'); !!}">Home</a></li>
                                <li class="list-inline-item"><a href="{!! url('/goals'); !!}">Goals</a></li>
                                <li class="list-inline-item"><a href="{!! url('/mission'); !!}">Mission</a></li>
                                <li class="list-inline-item"><a href="{!! url('/vision'); !!}">Vision</a></li>
                                <li class="list-inline-item"><a href="{!! url('/contact'); !!}">Contact Us</a></li>
                                <li class="list-inline-item"><a href="{!! url('/login'); !!}">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-center conts">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>25 Glenn Hawthorne Blvd Mississauga, Ontario Canada L5R 3E6</p>
                    </div>
                    <div class="col-md-3 text-center conts">
                        <i class="fas fa-envelope"></i>
                        <p>Bismarckansong@kemmetsystems.com</p>
                    </div>
                    <div class="col-md-3 text-center conts">
                        <i class="fas fa-phone"></i>
                        <p>1-647-716-5476</p>
                    </div>
                    <div class="col-md-3 text-center conts">
                        <i class="fas fa-globe"></i>
                        <p>www.kemmetsystems.com</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="l-foot">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>© 2018 All Rights Reserved. </p>
                    </div>
                    <div class="col-md-6">
                        <ul class="text-right list-inline">
                            <li class="list-inline-item"><a href="facebook.com"><i class="fab fa-facebook-square"></i></a></li>
                            <li class="list-inline-item"><a href="twitter.com"><i class="fab fa-twitter-square"></i></a></li>
                            <li class="list-inline-item"><a href="instagram.com"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
     

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="{{URL::asset('/js/app.js')}}"></script>
</body>
</html>