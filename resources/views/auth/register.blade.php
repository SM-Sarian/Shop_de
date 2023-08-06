
@extends('layouts.front')
@section('title','Anmeldung')
@section('content')
    <section class="account-box">
        <div class="register-logo">
            <a href="{{route('fronts.index')}}">
                <h2>Sarian Shop</h2>
            </a>
        </div>
        <div class="register">
            <div class="headline">Anmeldeformular</div>
            <div class="content">
                <span class="hint">Wenn Sie sich bereits registriert haben, ist eine erneute Registrierung nicht erforderlich</span>
                <form class="w-100" method="POST" action="{{ route('register') }}">
                    @csrf
                    <label for="name">Nutzername</label>
                    <input id= "name" name="name" type="text" placeholder="Name"
                           @error('name') is-invalid @enderror
                           value="{{ old('name') }}"  autocomplete="name" autofocus>
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <label for="email">E-Mailadresse</label>
                    <input id="email" type="email" placeholder="E-Mailadresse" @error('email') is-invalid @enderror name="email"
                           value="{{ old('email') }}"  autocomplete="email">
                        @error('email')
                        <span class="text-danger">{{$message}}</span>
                         @enderror

                    <label for="phone">Telefon</label>
                    <input id="phone" type="number" placeholder="09111111111" @error('phone') is-invalid @enderror name="phone"
                           value="{{ old('phone') }}"  autocomplete="phone">
                    @error('phone')
                    <span class="text-danger">{{'Geben Sie die richtige Telefonnummer mit mindest 11 Nummer ein'}}</span>
                    @enderror

                    <label for="postcode">Postleitzahl</label>
                    <input id="postcode" type="number" placeholder="Postleitzahl" @error('postcode') is-invalid @enderror
                    name="postcode" value="{{ old('postcode') }}" autocomplete="postcode">
                    @error('postcode')
                    <span class="text-danger">{{'Geben Sie eine gültige Postleitzahl mit 10 Ziffern ein'}}</span>
                    @enderror

                    <label for="state">Provinz</label>
                    <input id="state" type="text" placeholder="Provinz" @error('state') is-invalid @enderror name="state"
                           value="{{ old('state') }}"  autocomplete="state">
                    @error('state')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <label for="city">Stadt</label>
                    <input id="city" type="text" placeholder="Stadt" @error('city') is-invalid @enderror name="city"
                           value="{{ old('city') }}"  autocomplete="city">
                    @error('city')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <label for="address">Vollständige Adresse</label>
                    <input id="address" name="address" type="text" placeholder="Vollständige Adresse"
                           @error('address') is-invalid @enderror  value="{{ old('address') }}"  autocomplete="address">
                    @error('address')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <label for="password">Passwort</label>
                    <input id="password" type="password" name="password"
                           placeholder="Mindestens 8 Zeichen, darunter ein Großbuchstabe, eine Zahl und Sonderbuchstaben"
                           @error('password') is-invalid @enderror   autocomplete="new-password">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <label for="password-confirm">Bestätige das Passwort</label>
                    <input id="password-confirm"  name="password_confirmation" type="password" class="form-control"
                           placeholder="Wiederholen Sie das Passwort"  autocomplete="new-password">
                    @error('password_confirmation')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <div class="acc-agree mt-5">
                        <label for="agree">
                            <input id="agree" name="agree" type="checkbox" >
                            <a href="{{route('fronts.terms')}}">Bedingungen</a>
                            <p style="font-size: 12px; line-height: 14px">
                                Ich habe die Bedingungen der Sarian Shop-Website gelesen und bin mit allen einverstanden.
                            </p>
                        </label>
                    </div>
                    @error('agree')
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                    <button class="mt-4" type="submit">Anmeldung</button>
                </form>
            </div>

            <div class="foot">
                <div>
                    <span>Haben Sie sich bereits in Sarian Shop registriert?</span>
                    <a href="{{route('login')}}">Login</a>
                </div>
            </div>
        </div>
    </section>
    <br><br>
@endsection
