{{-- @extends('layouts.app')

@section('content') --}}
@section('title')
    {{ 'De Oro Mediko - Login' }}
@endsection
<x-app>
<div class="login-container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div> --}}
                <div class="img-banner">
                    <img  src="{{ asset('/images/deoro-pic.jpg') }}" alt="banner" >
                </div>

                <div class="login-card">
                    <form method="POST" action="{{ route('login') }}" class="login-form">
                        @csrf

                   
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}
                            <div class="pb-5" style=" margin: 0 auto !important;">
                            <a href="/"><img id="icon" src="{{ asset('/images/DeOroMedikoIcon.png') }}" alt="logo" style="width: 150px; object-fit: contain;"/></a>
                        </div>
                            <div class="form-group">
                                <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                      

                     
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                            <div class="form-group">
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                 

                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="btn-login">
                            <div class="btn-design">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            {{-- </div>
        </div>
    </div> --}}
</div>
</x-app>
