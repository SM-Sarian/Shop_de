
@extends('layouts.front')
@section('title','Login')
@section('content')
    <section class="account-box">
        <div class="register-logo">
            <a href="{{route('fronts.index')}}">
                <h2>Sarian Shop</h2>
            </a>
        </div>
        <div class="register login mb-5">
            <div class="headline">Login Formular</div>
            <div class="content">
                <form class="w-100" method="POST" action="{{ route('login') }}">
                    @csrf
                    <label class="d-block mt-4" for="email">E-Mailadresse</label>
                    <input id="email" name="email" type="email" placeholder="Geben sie ihre E-Mailadresse ein"
                           @error('email') is-invalid @enderror value="{{ old('email') }}" autocomplete="email" autofocus>
                       @error('email')
                           <span class="text-danger">{{$message}}</span>
                      @enderror
                    <label class="d-block mt-4" for="password">Passwort</label>
                    <input id="password" type="password" placeholder="Geben Sie Ihr Passwort ein"
                           @error('password') is-invalid @enderror name="password" autocomplete="current-password">
                         @error('password')
                             <span class="text-danger">{{$message}}</span>
                        @enderror
                            <div class="mt-4">
                                <input class="form-check-input mt-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-light" for="remember" style="margin-left: 40px">mich erinnern</label>
                            </div>
                    <div class="mt-5">
                    <button type="submit">Login</button>
                    </div>
                </form>
            </div>
            <div class="foot login-foot">
                <span>Sind Sie ein neuer Benutzer?</span>
                <p><a href="{{route('register')}}">Registrieren Sie sich im Sarian Shop</a></p>
            </div>

            <div class="foot login-foot">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Haben Sie Ihr Passwort vergessen?') }}
                </a>
            @endif
            </div>
        </div>
    </section>
@endsection
