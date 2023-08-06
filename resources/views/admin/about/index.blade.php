@extends('layouts.app')

@section('title','über uns')

@section('content')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <span class="mt-1"> über uns </span>
            @if($abouts->count() == 0)
            <a href="{{route('about.create')}}" class="btn btn-success btn-sm">erstellen</a>
            @endif
        </div>
        <div class="card-body">
            <table class="table text-center">
                <thead class="border">
                <tr>
                    <th class="bg-primary-subtle">Nummer</th>
                    <th class="bg-primary-subtle">Titel</th>
                    <th class="bg-primary-subtle">Bild</th>
                    <th class="bg-primary-subtle">bearbeiten</th>
                    <th class="bg-primary-subtle">löschen</th>
                </tr>
                </thead>
                <tbody>
                @foreach($abouts as $key=> $about)
                    <tr>
                        <td>{{1}}</td>
                        <td>{{$about->title}}</td>
                        <td>
                            <img src="{{asset('storage/'.$about->image)}}" alt="" width="80px"  height="40px" class="rounded shadow">
                        </td>
                        <td>
                            <a href="{{route('about.edit',$about->id)}}"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <form action="{{route('about.destroy', $about->id)}}" method="post">
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
@endsection
