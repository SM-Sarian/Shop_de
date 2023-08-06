@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header text-right">
                Kommentar bearbeiten
            </div>
            <div class="card-body text-right">
                <form action="{{ route('comments.update', $comment->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{ $comment->user->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{ $comment->product->title_de }}" disabled>
                    </div>
                    <div class="form-group">
                        <textarea name="contents" cols="30" rows="10"
                                  class="form-control" @error('content') is-invalid @enderror>{{ $comment->content }}</textarea>
                        @error('contents')
                        <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="status" class="form-select">
                            <option value="1" @if($comment->status ==1)  selected @endif >bestätigt</option>
                            <option value="0" @if($comment->status ==0)  selected @endif >nicht bestätigt</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-sm btn-block">bearbeiten</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
