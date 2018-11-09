
@extends('admin.template.admin')
@section('content')
    

      <main class="main">
        <div class="container-fluid">
          <div class="admin-home">
          <h2 class="text-uppercase">Admin Dashboard</h2>
          <div class="row">
            <div class="col-12">
              
              <div class="card">
                <div class="card-body">
                    <div class="row">
                          <div class="col-sm-2">
                            <div class="callout callout-info">
                              <small class="text-muted">Pending Clients</small><br>
                              <strong class="h4">{{ $pending_client_count }}</strong>
                            </div>
                          </div><!--/.col-->
                          <div class="col-sm-2">
                            <div class="callout callout-danger">
                              <small class="text-muted">Total Client Accounts</small><br>
                              <strong class="h4">{{ $total_client_count }}</strong>
                            </div>
                          </div><!--/.col-->
                          <div class="col-sm-2">
                            <div class="callout callout-warning">
                              <small class="text-muted">Orders Generated</small><br>
                              <strong class="h4">{{ $orders }}</strong>
                            </div>
                          </div><!--/.col-->
                          <div class="col-sm-2">
                            <div class="callout callout-success">
                              <small class="text-muted">Monthly Subscriptions</small><br>
                            <strong class="h4">{{ $subs }}</strong>
                            </div>
                          </div><!--/.col-->
                          {{--  <div class="col-sm-2">
                            <div class="callout">
                              <small class="text-muted">CTR</small><br>
                              <strong class="h4">23%</strong>
                            </div>
                          </div><!--/.col-->
                          <div class="col-sm-2">
                            <div class="callout callout-primary">
                              <small class="text-muted">Bounce Rate</small><br>
                              <strong class="h4">5%</strong>
                            </div>
                          </div><!--/.col-->  --}}
                        </div><!--/.row-->
                  </div>
                      
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </main>
      


@endsection