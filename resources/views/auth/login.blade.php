@extends('layouts.app')

@section('content')
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="/upload/assets/2.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <!-- <div class="brand-wrapper">
                <img src="/upload/assets/2.jpg" alt="logo" class="logo">
              </div> -->
              <p class="login-card-description">Login</p>
              <form method="POST" action="{{ route('login') }}">
              @csrf
                  <div class="form-group">
                    <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">{{ __('Password') }}</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="*********">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="form-group mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                  </div>
                  <button type="submit"  class="btn btn-block login-btn mb-4">
                                    {{ __('Login') }}
                    </button>
                    
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection


