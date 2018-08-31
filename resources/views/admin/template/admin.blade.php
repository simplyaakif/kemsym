<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.0.0
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">
  <head>
    <base href="./../">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>CoreUI Free Bootstrap Admin Template</title>
    <!-- Icons-->
    <link href="{{URL::asset('admin/vendors/@coreui/icons/css/coreui-icons.min.css')}}" rel="stylesheet">
    <link href="admin/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="admin/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="admin/css/style.css" rel="stylesheet">
    <link href="admin/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <span class="navbar-brand-full">KEMMET SYSTEMS</span>
        <span class="navbar-brand-minimized">KS</span>
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="nav navbar-nav d-md-down-none">
        {{--  <li class="nav-item px-3">
          <a class="nav-link" href="{{url('admin/dashboard')}}">Dashboard</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="#">Users</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="#">Settings</a>
        </li>  --}}
      </ul>
      <ul class="nav navbar-nav ml-auto">
        {{--  <li class="nav-item d-md-down-none">
          <a class="nav-link" href="#">
            <i class="icon-bell"></i>
            <span class="badge badge-pill badge-danger">5</span>
          </a>
        </li>
        <li class="nav-item d-md-down-none">
          <a class="nav-link" href="#">
            <i class="icon-list"></i>
          </a>
        </li>
        <li class="nav-item d-md-down-none">
          <a class="nav-link" href="#">
            <i class="icon-location-pin"></i>
          </a>
        </li>  --}}
        <li class="nav-item dropdown mr-4">
          <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Hi <span class="text-uppercase"> {{Auth::user()->name}} </span>
            <span class="icon-user"></span>
          </a> 
          <div class="dropdown-menu dropdown-menu-right">
            
            <div class="dropdown-header text-center">
              <strong>Settings</strong>
            </div>
            <a class="dropdown-item" href="#">
              <i class="fa fa-user"></i> Profile</a>
            
            <div class="divider"></div>
            
            <a class="dropdown-item" href="#">
              <i class="fa fa-lock"></i> Logout</a>
          </div>
        </li>
      </ul>

      
    </header>
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/dashboard')}}">
                <i class="nav-icon icon-speedometer"></i> Dashboard
                {{--  <span class="badge badge-primary">NEW</span>  --}}
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/contact')}}">
                <i class="nav-icon icon-envelope"></i> Contact Forms
              </a>
            </li>
            <li class="nav-title">Users Managment</li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/profile')}}">
                <i class="nav-icon icon-user"></i> Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('admin/users')}}">
                <i class="nav-icon icon-list"></i> Users</a>
            </li>
            <li class="nav-title">Plans</li>
            <li class="nav-item">
              <a class="nav-link" href="charts.html">
                <i class="nav-icon icon-pie-chart"></i> Subscriptions</a>
            </li>


            <li class="divider"></li>

            <li class="nav-item mt-auto">
                <a class="nav-link nav-link-primary" href="{{url('')}}" target="_top">
                  <i class="nav-icon icon-layers"></i> Go to 
                  <strong>SITE</strong>
                </a>
              </li>
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
    

    
    @yield('content')
    
    <!-- CoreUI and necessary plugins-->
    
    
    </div>
    <footer class="app-footer">
      <div>
        <a href="https://coreui.io">CoreUI</a>
        <span>&copy; 2018 creativeLabs.</span>
      </div>
      <div class="ml-auto">
        <span>Powered by</span>
        <a href="https://coreui.io">CoreUI</a>
      </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    <script src="admin/vendors/jquery/js/jquery.min.js"></script>
    <script src="admin/vendors/popper.js/js/popper.min.js"></script>
    <script src="admin/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="admin/vendors/pace-progress/js/pace.min.js"></script>
    <script src="admin/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
    <script src="admin/vendors/@coreui/coreui/js/coreui.min.js"></script>
  </body>
</html>