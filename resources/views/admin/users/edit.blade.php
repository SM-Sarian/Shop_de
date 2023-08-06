@extends('layouts.app')

@section('title','Benutzer bearbeiten')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            Benutzer bearbeiten
        </div>
        <div class="card-body">
            <form action="{{route('users.update' , $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nutzername</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Geben Sie den Benutzernamen ein"
                           @error('name') is-invalid @enderror value="{{$user->name}}">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Benutzer Email</label>
                    <input type="email" id="email" name="email" class="form-control"  placeholder="Geben Sie den Benutzernamen ein"
                           @error('name') is-invalid @enderror value="{{$user->email}}">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Telefon</label>
                    <input id="phone" type="number" class="form-control" placeholder="09111111111" @error('phone') is-invalid @enderror name="phone"
                           value="{{$user->phone}}"  autocomplete="phone">
                    @error('phone')
                    <span class="text-danger">{{'Geben Sie die richtige Telefonnummer mit mindest 11 Nummer ein'}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="postcode" class="form-label">Postleitzahl</label>
                    <input id="postcode" type="number" class="form-control" placeholder="Postleitzahl" @error('postcode') is-invalid @enderror
                    name="postcode" value="{{$user->postcode}}" autocomplete="postcode">
                    @error('postcode')
                    <span class="text-danger">{{'Geben Sie eine gültige Postleitzahl mit 10 Ziffern ein'}}</span>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="state" class="form-label">Provinz</label>
                    <input id="state" type="text" class="form-control" placeholder="Provinz" @error('state') is-invalid @enderror name="state"
                           value="{{$user->state}}"  autocomplete="state">
                    @error('state')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">Stadt</label>
                    <input id="city" type="text" class="form-control" placeholder="Stadt" @error('city') is-invalid @enderror name="city"
                           value="{{$user->city}}"  autocomplete="city">
                    @error('city')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Vollständige Adresse</label>
                    <input id="address" name="address" class="form-control" type="text" placeholder="Vollständige Adresse"
                           @error('address') is-invalid @enderror  value="{{$user->address}}"  autocomplete="address">
                    @error('address')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Benutzer-Passwort</label>
                    <input type="password" id="password" name="password" class="form-control"
                           placeholder="Geben Sie das Benutzerpasswort ein" @error('name') is-invalid @enderror value="">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Benutzertyp</label>
                    <select name="role" id="role" class="form-select">
                        @foreach($roles as $klid=> $role)
                            <option value="{{$klid}}"
                            @if($klid == $user->role)
                                selected
                            @endif
                            >{{$role}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    bearbeiten
                </button>
            </form>
        </div>
    </div>

@endsection
