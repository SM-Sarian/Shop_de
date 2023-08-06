@extends('layouts.app')

@section('title','Benutzer')

@section('content')
    <div class="card card-default" style="min-width: 600px; right: 10px">
        <div class="card-header d-flex justify-content-between">
          <span class="mt-1">Benutzer</span>
        </div>
        <div class="card-body">
            <table class="table text-center">
                <thead class="border">
                    <tr>
                        <th class="bg-primary-subtle">Nummer</th>
                        <th class="bg-primary-subtle">Nutzername</th>
                        <th class="bg-primary-subtle">Benutzer Email</th>
                        <th class="bg-primary-subtle">Benutzertyp</th>
                        <th class="bg-primary-subtle">bearbeiten</th>
                        <th class="bg-primary-subtle">löschen</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $key=> $user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->role == 'admin')
                                <span class="text-info">Admin</span>
                            @else
                                 <span class="">User</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('users.edit',$user->id)}}"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <form action="{{route('users.destroy', $user->id)}}" method="post">
                               @csrf
                                @method('DELETE')
                                <button class="btn" onclick="return confirm('Sind Sie sich sicher?')">
                                    <i class="fa fa-trash fa-lg" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div><br>
    {{$users->links()}}
@endsection
