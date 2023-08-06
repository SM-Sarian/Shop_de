@extends('auth.passwords.body')
@section('title',' E-Mail-Versand für neues Passwort ')
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

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="w-100" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <label for="email"
                               class="">{{ __('Geben Sie die E-Mail-Adresse ein, mit der Sie sich registriert haben') }}</label>
                        <input id="email" type="email" class="form-control" @error('email') is-invalid @enderror
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <div class="row mb-0 mt-5">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Neues Passwort-Link per E-Mail senden') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
