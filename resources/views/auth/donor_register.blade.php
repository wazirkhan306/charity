@extends('layouts.auth')

@section('content')
<div class="limiter">
        <div class="container-login100" style="background-image: url('{!! asset(Setting()->HomePicture) !!}');">

            <div class="wrap-login100">
                <form method="POST" action="{{ route('donor.save') }}" class="login100-form">
                @csrf
                    <span class="login100-form-logo">
                        <a class="zmdi zmdi-landscape" href="{!! url('/') !!}"><img src="{{ asset(Setting()->LogoPicture) }}" alt="logo-image"></a>
                    </span>
                    <span class="login100-form-title p-b-34 p-t-27">
                        DONOR REGISTER
                    </span>
                    <div class="wrap-input100">
                        <input id="name" type="text" class="input100{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  autofocus placeholder="Username">
                        <span class="focus-input100"></span>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Enter E-Mail">
                        <input id="email" type="email" class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  placeholder="E-Mail Address">
                        <span class="focus-input100"></span>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Enter Password">
                       <input id="password" type="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                               placeholder="Password">
                        <span class="focus-input100"></span>
                         @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password">
                       <input id="password-confirm" type="password"  name="password_confirmation"  placeholder="Confirm Password" class="input100">
                       <span class="focus-input100"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            {{ __('Register') }}
                        </button>
                    </div>
                    <div class="container signin text-center">
                        <p style="color: #ffffff;
                        text-align: center;">Already have an account? <a href="{{route('donor.login')}}" style="color:#eb8715">Sign in</a>.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- ============================================================= Content Start ============================================================= -->
@endsection
