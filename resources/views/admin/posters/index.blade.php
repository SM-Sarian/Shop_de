@extends('layouts.app')

@section('title','Die Poster')

@section('content')
    <div class="card card-default" style="min-width: 600px; right: 10px">
        <div class="card-header d-flex justify-content-between">
            <span class="mt-1">Die Poster</span>
            @if($posters->count()<10)<a href="{{route('posters.create')}}" class="btn btn-success btn-sm" >Poster erstellen</a>@endif
        </div>
        <div class="card-body">
            <table class="table text-center">
                <thead class="border">
                <tr>
                    <th class="bg-primary-subtle">Nummer</th>
                    <th class="bg-primary-subtle">Name</th>
                    <th class="bg-primary-subtle">Bild</th>
                    <th class="bg-primary-subtle">url</th>
                    <th class="bg-primary-subtle">bearbeiten</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posters as $key=> $poster)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$poster->name}}</td>
                        <td>
                            <img src="{{asset('storage/'.$poster->image)}}" alt="" width="80px"  height="40px" class="rounded shadow">
                        </td>
                        <td>
                            <p>{{$poster->url}}</p>
                        </td>
                        <td>
                            <a href="{{route('posters.edit',$poster->id)}}"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                        </td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
