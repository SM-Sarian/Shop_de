@extends('auth.passwords.body')
@section('title',' Neues Passwort')
@section('content')

    <section class="account-box">
        <div class="register-logo">
            <a href="{{route('fronts.index')}}">
                <h2>Sarian Shop</h2>
            </a>
        </div>
        <div class="register login">
            <div class="headline">{{ __('Neues Passwort') }}</div>
            <div class="content text-center">
                <form class="w-100" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <label for="email" class="mt-5 mb-0">{{ __('Email Adresse') }}</label>
                    <input id="email" type="email" class="form-control" @error('email') is-invalid @enderror
                           name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                    <label for="password" class="mt-3 mb-0">{{ __('Passwort') }}</label>
                    <input id="password" type="password" class="form-control" @error('password') is-invalid @enderror
                           name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror


                    <label for="password-confirm" class="mt-3 mb-0">{{ __('Bestätige das Passwort') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required autocomplete="new-password">

                    <div class="row mb-0 mt-5">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Neues Passwort') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </section>

@endsection
