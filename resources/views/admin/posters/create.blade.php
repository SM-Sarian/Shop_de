@extends('layouts.app')

@section('title','Erstellen oder bearbeiten Sie ein Poster')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            @isset($poster)
                Poster bearbeiten
            @else
                Poster erstellen
            @endisset
        </div>
        <div class="card-body">

            <form action="{{isset($poster) ? route('posters.update' , $poster->id) : route('posters.store')}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @isset($poster)
                   @method('PUT')
                @endisset
                <div class="mb-3">
                    <label for="name" class="form-label">Name des Posters</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Geben Sie den Namen des Posters ein"
                           @error('name') is-invalid @enderror value="{{isset($poster) ? $poster->name : '' }}">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="url" class="form-label">URL des Posters</label>
                    <input type="text" id="url" name="url" class="form-control" placeholder="Geben Sie die URL des Posters ein"
                           @error('url') is-invalid @enderror value="{{isset($poster) ? $poster->url : '' }}">
                    @error('url')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Poster</label>
                    <input type="file" id="image" name="image"  class="form-control"  placeholder="Laden Sie das Poster hoch"
                           @error('image') is-invalid @enderror value="{{isset($poster) ? $poster->image : '' }}">
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

            @isset($poster)
                    <img src="{{asset('storage/'.$poster->image)}}" alt="" width="100%" height="100%" class="rounded shadow">
                @endisset
                <button type="submit" class="btn btn-primary mt-3">
                    @isset($poster)
                        bearbeiten
                    @else
                        erstellen
                    @endisset
                </button>
            </form>
        </div>
    </div>

@endsection
