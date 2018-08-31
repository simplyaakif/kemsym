<?php $title='REGISTER'; ?>

@extends('partials.template')

@section('page_data')
<section id="" class="page">
    <div class="bdcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-uppercase">
                        {{$title}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
 


    <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="card mx-4">
                  <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @csrf
                    <h1>Register</h1>
                    <p class="text-muted">Create your account</p>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="icon-user"></i>
                        </span>
                      </div>
                      <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i>@</i>
                        </span>
                      </div>
                      <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="icon-lock"></i>
                        </span>
                      </div>
                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                    </div>
                    <div class="input-group mb-4">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="icon-lock"></i>
                        </span>
                      </div>
                      <input id="password-confirm" type="password" placeholder="Repeat Password" class="form-control" name="password_confirmation" required>
                    </div>
                    <button class="btn btn-block btn-success" type="submit">{{ __('Register') }}</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
</section>
@endsection
