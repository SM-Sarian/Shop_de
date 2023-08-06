@extends('layouts.app')

@section('content')
    <div class="card card-default" style="min-width: 800px; right: 10px">
        <div class="card-header d-flex justify-content-between">
            <span class="mt-1">Kommentare</span>
        </div>
            <div class="card-body">
                <table class="table text-center">
                    <thead class="border">
                    <tr>
                        <th class="bg-primary-subtle">Nummer</th>
                        <th class="bg-primary-subtle">Nutzername</th>
                        <th class="bg-primary-subtle">Produktname</th>
                        <th class="bg-primary-subtle">Situation</th>
                        <th class="bg-primary-subtle">bearbeiten</th>
                        <th class="bg-primary-subtle">löschen</th>
                        <th class="bg-primary-subtle">Antwort</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($comments as $key=> $comment)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ $comment->product->title_de }}</td>
                            <td>
                                @if($comment->status == 0)
                                    <span class="text-danger">nicht bestätigt</span>
                                @else
                                    <span class="text-success">bestätigt</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('comments.edit', $comment->id) }}">
                                    <i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn" onclick="return confirm('Sind Sie sich sicher?')">
                                        <i class="fa fa-trash fa-lg" aria-hidden="true"></i></button>
                                </form>
                            </td>
                            <td>
                                @if($comment->child != null)
                                <span class="btn btn-success btn-sm shadow">
                                 beantwortet
                                </span>
                                @else
                                    <a href="{{ route('comments.show', $comment->id) }}" class="btn btn-success btn-sm shadow">Antwort</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><br>
    {{$comments->links()}}
@endsection
