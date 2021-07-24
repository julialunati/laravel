@extends('layouts.app')

@section('title') Login @stop

@section('content')

<!-- Where all the magic happens -->
<!-- LOGIN FORM -->
<div class="text-center" style="padding:50px 0">
  <div class="logo">login</div>

  <!-- Main Form -->
  <div class="login-form-1">
    <form method="POST" action="{{ route('login') }}" id="login-form" class="text-left">
      @csrf
      <div class="login-form-main-message"></div>
      <div class="main-login-form">
        <div class="login-group">
          <div class="form-group">

            <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

          </div>
          <div class="form-group">
            <label for="password" class="sr-only">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="current-password">
          </div>
          <div class="form-group login-group-checkbox">
            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : ''}}>
            <label for="remember"> {{ __('Remember Me') }}</label>
          </div>
        </div>
        <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
      </div>
      <div class="etc-login-form">
        <p>forgot your password?
          @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">click here</a>
        </p>
        @endif

        <p>new user? <a href="{{ route('register') }}">create new account</a></p>
      </div>
    </form>

  </div>
  <!-- end:Main Form -->
</div>

@endsection