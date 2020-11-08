@extends('layouts.site')

@section('content')
<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center no-gutters min-vh-100">
        <div class="col-12 col-md-5 col-lg-4 py-8 py-md-11">

            <!-- Heading -->
            <h1 class="font-bold text-center">{{ __('Reset Password') }}</h1>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email" class="sr-only">Email Address</label>
                    <input id="email" type="email" placeholder="Email"
                           class="form-control  form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                         </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password" class="sr-only">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control  form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                         </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="sr-only">{{ __('Confirm Password') }}</label>

                    <input id="password-confirm" type="password" class="form-control  form-control-lg {{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" name="password_confirmation" required autocomplete="new-password">
                    @if ($errors->has('password-confirm'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password-confirm') }}</strong>
                         </span>
                    @endif
                </div>

                <button class="btn btn-lg btn-block btn-primary" type="submit">{{ __('Reset Link') }}</button>
            </form>
        </div>
    </div>
</div>


@endsection
