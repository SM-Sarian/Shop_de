@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-right">
                Antwort auf Kommentar {{ $comment->user->name }}
            </div>

            <div class="card-body text-right">
                <div class="form-group">
                    <textarea cols="5" rows="5" class="form-control" disabled>{{ $comment->content }}</textarea>
                </div>
                <form action="{{ route('comments.reply', $comment->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <textarea name="contents" cols="5" rows="5" placeholder="schreibe die Antwort"
                                  class="form-control @error('contents') is-invalid @enderror" ></textarea>
                        @error('contents')
                        <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm btn-block">Antwort</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
