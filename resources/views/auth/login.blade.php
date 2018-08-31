<?php $title='LOGIN'; ?>

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
      <div class="col-md-8">
        <div class="card-group">
          <div class="card p-4">
            <div class="card-body">
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
              <h1>Login</h1>
              <p class="text-muted">Sign In to your account</p>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-user"></i>
                  </span>
                </div>
                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-primary px-4" type="submit">{{ __('Login') }}</button>
                </div>
                <div class="col-6 text-right">
                  <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                      {{ __('Forgot Password?') }}
                  </a>
                </div>
              </div>
            </form>
            </div>
          </div>
          <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              <div>
                <h2>Sign up</h2>
                <p>Dont have an account yet. Dont worry make one for yourself now. Its free after all. Just click the bottom button to go to the registration page</p>
                <a href="{!! url('/register'); !!}" class="btn btn-primary active mt-3" >Register Now!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
@endsection
