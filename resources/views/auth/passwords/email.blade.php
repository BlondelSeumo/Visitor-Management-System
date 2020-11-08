@extends('layouts.site')

@section('content')
<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center no-gutters min-vh-100">
        <div class="col-12 col-md-5 col-lg-4 py-8 py-md-11">

            <!-- Heading -->
            <h1 class="font-bold text-center">{{ __('Reset Password') }}</h1>
            <form method="POST" action="{{ route('password.email') }}" class="mb-6" >
            @csrf

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

                <button class="btn btn-lg btn-block btn-primary" type="submit">{{ __('Send Password Reset Link') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
