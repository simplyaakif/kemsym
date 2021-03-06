<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kemmet Systems</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
        crossorigin="anonymous">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">

    <link href="{{URL::asset('admin/vendors/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="{{URL::asset('/css/app.css')}}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <!-- <script src="app.js"></script> -->
</head>

<body>

    <header class="main main-h">
        <section class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a target="_blank" href="https://www.facebook.com/bansong">
                                    <img src="{{asset('img/facebook.png')}}" width="20" alt="">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a target="_blank" href="https://twitter.com/KemmetSystems?s=09">
                                    <img src="{{asset('img/twitter.png')}}" width="20" alt="">
                                </a></li>
                            <li class="list-inline-item">
                                <a target="_blank" href="https://www.instagram.com/kemmetsystems1/?utm_source=ig_profile_share&igshid=187jytufoe00u">
                                    <img src="{{asset('img/instagram.png')}}" width="20" alt="">
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="navigate">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="{!! url('/'); !!}">
                        <img src="{{URL::asset('/img/logo.png')}}" style="max-width: 100px;" alt="" class="img-fluid">
                    </a>

                    <a class="mobile-cart " href="{{ route('product.shoppingCart')}}">
                        {{-- <i class="fas fa-shopping-cart"></i> --}}
                        <img class="cart" src="{{asset ('img/cart.png')}}" alt="" srcset="">
                        <span class="cart-badge2 ">
                            {{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}
                        </span>
                    </a>

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
                                <a class="nav-link btn bk-o" href="{!! url('/login'); !!}"> <i class="fas fa-user"></i>
                                    Login/Sign up</a>
                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a style="" id="navbarDropdown" class="nav-link dropdown-toggle caret-remove" href="#"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    <i class="fas fa-user"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item">{{ Auth::user()->name }}</a>
                                    @if(Auth::user()->role=='admin')
                                    <a class="dropdown-item" href="{{url('/admin/dashboard')}}">Dashboard</a>
                                    @endif
                                    @if(Auth::user()->role=='visitor')
                                    <a class="dropdown-item" href="{{url('/visitor/dashboard')}}">Dashboard</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest

                            <li class=" desktop-cart">
                                <a class="" href="{{ route('product.shoppingCart')}}">
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


        <section>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset('images/slider-01.png')}}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('images/slider-02.png')}}" alt="Second slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
    </header>

    <section class="description">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">MAKE A <strong>BOLD</strong> STATEMENT</h2>
                    <p class="text-center">The reason we embarked on this project is that we have observed that
                        people’s identities and documents are harder to be verified and authenticated by institutions
                        and companies which offer services to these individuals. At best institutions do their
                        verification, validation and document authentication In-House and this exposes these companies
                        to a lot of risk such as individuals using fake documents and identities to acquire services by
                        these institutions. This exposes these companies to a lot of liabilities than they will want to
                        assume.</p>
                    <a href="{{url('/statement')}}" class="btn">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="crow">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-lg-6 about d-flex flex-wrap align-items-center">
                        <img src="{{asset('img/about.png')}}" alt="" class="img-fluid mx-auto">
                    </div>
                    <div class="col-md-12 col-lg-6 pricing">
                        <h2>ABOUT US</h2>
                        <p>The purpose of this company is to offer products and services that will add value to
                            organizations by verifying records and identities, validating them and authenticating them
                            so that these institutions or organizations will be able to eliminate, mitigate and avoid
                            risks involved in people using fake identities.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="market">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>MARKET</h2>
                    <img src="{{URL::asset('/img/globeObject.jpg')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>PRODUCTS AND SERVICES</h2>
                    <br>
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-2 text-center">
                            <a href="{{url('/products/consulting')}}">
                                <div class="ups-s"><img src="{{URL::asset('/img/ico01.png')}}" alt="" class="img-fluid">
                                    <p class="text-center">Consulting</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-2 text-center">
                            <a href="{{url('/products/company-screening')}}">
                                <div class="ups-s"><img src="{{URL::asset('/img/ico02.png')}}" alt="" class="img-fluid">
                                    <p class="text-center">Company screening</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-2 text-center">
                            <a href="{{url('/products/applicants-employees')}}">
                                <div class="ups-s"><img src="{{URL::asset('/img/ico03.png')}}" alt="" class="img-fluid">
                                    <p class="text-center">Screening of applicants and employees</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-2 text-center">
                            <a href="{{url('/products/verification-validation')}}">
                                <div class="ups-s"><img src="{{URL::asset('/img/ico04.png')}}" alt="" class="img-fluid">
                                    <p class="text-center">Identity and records Verification, Validation &amp;
                                        Authentication</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-2 text-center">
                            <a href="{{url('/products/document-authentication')}}">
                                <div class="ups-s"><img src="{{URL::asset('/img/ico05.png')}}" alt="" class="img-fluid">
                                    <p class="text-center">Document and record authentication</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-2 text-center">
                            <a href="{{url('/products/credit-rating')}}">
                                <div class="ups-s"><img src="{{URL::asset('/img/ico06.png')}}" alt="" class="img-fluid">
                                    <p class="text-center">Credit Rating, Credit Score &amp; Credit worthiness</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing">
        <div class="crow">

            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-6 pricing d-flex flex-wrap align-items-center">
                        <div>
                            <h2>PRICING STRATEGY</h2>
                            <p>Our pricing will be dependent on the number of services our clients will subscribe from
                                us and the contract nature. We will offer competitive prices for all products and
                                services at Kemmet Systems. A 5% discount Will be applied on the monthly subscription
                                for the following products: Company screening, Applicant and Employee screening,
                                Identity Verification and Validation and Document and record Authentication. This
                                discount will reflect on the monthly plan under the Cost plan for products and
                                services. All products and services will be priced in the United States dollars.</p>
                        </div>

                    </div>
                    <div class="col-md-12 col-lg-6 pricing d-flex flex-wrap align-items-center">
                        <div style="" class="">
                            <h2>PRICING STRUCTURE</h2>
                            <p>The pricing will be dependent on the problem or issue to be solved. An average price for
                                a minor issue to be solved will be $99.00. A more complex problem will attract a higher
                                cost.</p>
                            <a href="{{ url('/pricing-structure') }}" class="btn btn-pr">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="subscription">
        <div class="container ">
            <div class="row ">
                <div class="col-md-12">
                    <h2 class="text-center">
                        <strong>SUBSCRIPTION PLANS</strong>
                        FOR SERVICES
                    </h2>
                </div>
                <div class="offset-md-2 col-md-8 text-center">
                    <div class="plan">
                        <h3>Cost Plan</h3>
                        <p class="text-center">Cost Plans For Products and Services</p>
                        <a href="{{url('/subs')}}" class="btn bl-o">Get Started</a>
                    </div>
                </div>



            </div>
        </div>
    </section>

    <footer class="foot">
        <div class="u-foot">
            <div class="container">
                <div class="row">
                    <div class="offset-4 col-4 offset-md-5 col-md-2 text-center">
                        <div class="logo">
                            <a href="{!! url('/'); !!}">
                                <img src="{{URL::asset('img/logo.png')}}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="menu">
                            <ul class="list-inline" style="color:#fff;">
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
                    <div class="col-md-6 text-center text-md-left">
                        <p>© 2018 All Rights Reserved. </p>
                    </div>
                    <div class="col-12 col-md-6 text-center text-md-right">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a target="_blank" href="https://www.facebook.com/bansong">
                                    <img src="{{asset('img/facebook.png')}}" width="20" alt="">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a target="_blank" href="https://twitter.com/KemmetSystems?s=09">
                                    <img src="{{asset('img/twitter.png')}}" width="20" alt="">
                                </a></li>
                            <li class="list-inline-item">
                                <a target="_blank" href="https://www.instagram.com/kemmetsystems1/?utm_source=ig_profile_share&igshid=187jytufoe00u">
                                    <img src="{{asset('img/instagram.png')}}" width="20" alt="">
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>
