
@extends('layouts.auth')

@section('content')
<!-- ============================================================= Content Start ============================================================= -->
<div class="limiter">
        <div class="container-login100" style="background-image: url('{!! asset(Setting()->HomePicture) !!}');">
            <div class="wrap-login100">
                <form method="POST" action="{{ route('donor.login') }}" class="login100-form validate-form">
                @csrf
                    <span class="login100-form-logo">
                        <a class="zmdi zmdi-landscape" href="{!! url('/') !!}"><img src="{{ asset(Setting()->LogoPicture) }}" alt="logo-image"></a>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        {{--  {{ __('Login') }}  --}}
                        DONOR LOGIN
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "Enter E-Mail">
                        <input id="email" type="email" class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"       required autofocus placeholder="E-Mail Address">
                        <span class="focus-input100"></span>
                         @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter Password">
                        <input id="password" type="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required
                               placeholder="Password">
                               <span class="focus-input100"></span>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="contact100-form-checkbox">
                        <input id="ckb1" class="input-checkbox100" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="label-checkbox100" for="ckb1">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="container signin text-center">
                        <p style="color: #ffffff;
                        text-align: center;">Create account? <a href="{{route('donor.register')}}" style="color:#eb8715">Sign Up</a>.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- ============================================================= Content end ============================================================= -->
@endsection
