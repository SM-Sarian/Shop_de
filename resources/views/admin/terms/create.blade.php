@extends('layouts.app')

@section('title','Erstellen Sie Inhalte für die Seite Bedingungen')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            @isset($term)
                Seite bearbeiten
            @else
                Seite erstellen
            @endisset
        </div>
        <div class="card-body">
        <form  action="{{isset($term) ? route('terms.update' , $term->id) : route('terms.store')}}"
               method="post" enctype="multipart/form-data">
            @csrf
            @isset($term)
                @method('PUT')
            @endisset

                <div class="mb-3">
                    <label for="title" class="form-label">Titel</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Geben Sie den Titel der Seite ein"
                           @error('title') is-invalid @enderror value="@if(isset($term)){{$term->title}}@else{{old('title')}}@endif">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Haupttext</label>
                    <textarea type="text" class="form-control CKEDITOR" style="height: 300px;" id="body" name="body" p
                              laceholder="Geben Sie den Haupttext ein"
                              @error('body') is-invalid @enderror>@if(isset($term)){!! $term->body !!}@else{{old('body')}}@endif</textarea>
                    @error('body')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    @isset($term)
                        bearbeiten
                    @else
                        erstellen
                    @endisset
                </button>
            </form>
        </div>
    </div>

@endsection
