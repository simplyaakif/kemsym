
@extends('admin.template.admin')
@section('content')
    

      <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Admin</a>
          </li>
          <li class="breadcrumb-item active">Dashboard</li>
          <!-- Breadcrumb Menu-->
          <li class="breadcrumb-menu d-md-down-none">
            <div class="btn-group" role="group" aria-label="Button group">
              <span class="btn" href="#">
                <i class="icon-speech"></i>
              </span>
              <span class="btn" href="./">
                <i class="icon-graph"></i>  Dashboard</span>
              <span class="btn" href="#">
                <i class="icon-settings"></i>  Settings</span>
            </div>
          </li>
        </ol>
        <div class="container-fluid">
            <div id="app">
                <div class="card">
                    <div class="card-body">
                        Work in Progress
                    </div>
                </div>
            </div>
        </div>
      </main>
      


@endsection