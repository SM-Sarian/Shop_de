@extends('layouts.app')

@section('title','Bedingungen')

@section('content')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <span class="mt-1"> Bedingungen </span>
            @if($terms->count() == 0)
            <a href="{{route('terms.create')}}" class="btn btn-success btn-sm">erstellen</a>
            @endif
        </div>
        <div class="card-body">
            <table class="table text-center">
                <thead class="border">
                <tr>
                    <th class="bg-primary-subtle">Nummer</th>
                    <th class="bg-primary-subtle">Titel</th>
                    <th class="bg-primary-subtle">bearbeiten</th>
                    <th class="bg-primary-subtle">löschen</th>
                </tr>
                </thead>
                <tbody>
                @foreach($terms as $key=> $term)
                    <tr>
                        <td>{{1}}</td>
                        <td>{{$term->title}}</td>
                        <td>
                            <a href="{{route('terms.edit',$term->id)}}"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <form action="{{route('terms.destroy', $term->id)}}" method="post">
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
