@extends('layouts.auth')

@section('content')
  <div id="auth">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css')}}">
    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <div class="auth-logo">
            <a href="/" class="d-flex align-items-center">
              <img src="{{ asset('assets/images/logo/logo.png')}}" alt="Logo" style="height: 60px">
            </a>
          </div>
          <h1 class="auth-title text-success">Log in.</h1>
          <form method="post" action="">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="text" class="form-control form-control-xl" placeholder="Email" name="email">
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
              @error('email')
                <span class="text-danger fw-bold">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
              <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
              </div>
              @error('password')
                <span class="text-danger fw-bold">{{ $message }}</span>
              @enderror
            </div>
            <button class="btn btn-success btn-block btn-lg shadow-lg mt-5">Log in</button>
          </form>
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right" style="background-image: url(/assets/images/ub.jpg); background-position: center;">
        </div>
      </div>
    </div>
  </div>
@endsection