@extends('layouts.app')

@section('title') Register @stop

@section('content')

<!-- REGISTRATION FORM -->
<div class="text-center" style="padding:50px 0">
  <div class="logo">register</div>
  <!-- Main Form -->
  <div class="login-form-1">

    <form method="POST" action="{{ route('register') }}" id="register-form" class="text-left">
      @csrf

      <div class="login-form-main-message"></div>
      <div class="main-login-form">
        <div class="login-group">

          <div class="form-group">
            <label for="name" class="sr-only">{{ __('Name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="full name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>


          <div class="form-group">
            <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password" class="sr-only">{{ __('Password') }}</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password-confirm" class="sr-only">{{ __('Confirm Password') }}</label>
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="confirm password" required autocomplete="new-password">
          </div>
          
          <!-- <div class="form-group login-group-checkbox">
            <input type="checkbox" class="" id="reg_agree" name="reg_agree">
            <label for="reg_agree">i agree with <a href="#">terms</a></label>
          </div> -->
        </div>
        <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i>{{ __('Register') }}</button>
      </div>
      <div class="etc-login-form">
        <p>already have an account? <a href="{{ route('login') }}">login here</a></p>
      </div>
    </form>
  </div>
  <!-- end:Main Form -->
</div>

@endsection