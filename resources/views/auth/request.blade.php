@extends('layouts.app')

@section('title') Login @stop

@section('content')

<!-- FORGOT PASSWORD FORM -->
<div class="text-center" style="padding:50px 0">
  <div class="logo">forgot password</div>
  <!-- Main Form -->
  <div class="login-form-1">
    <form id="forgot-password-form" class="text-left">
      <div class="etc-login-form">
        <p>When you fill in your registered email address, you will be sent instructions on how to reset your password.</p>
      </div>
      <div class="login-form-main-message"></div>
      <div class="main-login-form">
        <div class="login-group">
          <div class="form-group">
            <label for="fp_email" class="sr-only">Email address</label>
            <input type="text" class="form-control" id="fp_email" name="fp_email" placeholder="email address">
          </div>
        </div>
        <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
      </div>
      <div class="etc-login-form">
        <p>already have an account? <a href="#">login here</a></p>
        <p>new user? <a href="#">create new account</a></p>
      </div>
    </form>
  </div>
  <!-- end:Main Form -->
</div>

<!-- <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Verify Your Email Address') }}</div>

        <div class="card-body">
          @if (session('resent'))
          <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
          </div>
          @endif

          {{ __('Before proceeding, please check your email for a verification link.') }}
          {{ __('If you did not receive the email') }},
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
          </form>
        </div>
      </div>
    </div>
  </div>
</div> -->

@endsection