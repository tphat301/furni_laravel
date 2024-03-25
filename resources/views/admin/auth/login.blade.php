@extends('admin.layouts.app')
@section('title', 'Đăng nhập admin')

@section('content')
<div class="container" style="padding: 50px 0; margin-top: 120px">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h4 class="mb-2 text-center">Đăng nhập</h4>
          <form id="formAuthentication" class="mb-3" action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="email">{{ __('Email') }}</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Nhập email của bạn" autocomplete="email" autofocus/>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between flex-wrap">
                <label class="form-label" for="password">{{ __('Password') }}</label>
                <a href="{{ route('admin.password.request') }}" title="{{ __('Forgot Your Password?') }}">
                  <small>{{ __('Forgot Your Password?') }}</small>
                </a>
              </div>
              <div class="d-flex col-md-12 position-relative">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Nhập mật khẩu của bạn"  autocomplete="current-password"/>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill eye-toggle-admin" viewBox="0 0 16 16" style="position: absolute; right: 10px; top:50%; transform: translateY(-50%); cursor: pointer;">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                </svg>
              </div>
              @error('password')
                <span class="invalid-feedback d-block" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember-me" {{ old('remember') ? 'checked' : '' }}/>
                <label class="form-check-label" for="remember-me"> {{ __('Remember Me') }} </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">{{ __('Login') }}</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
