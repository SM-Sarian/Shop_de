@extends('layouts.app')

@section('title','Erstellen Sie Inhalte für die Seite Über uns')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            @isset($about)
                Seite bearbeiten
            @else
                Seite erstellen
            @endisset
        </div>
        <div class="card-body">
        <form  action="{{isset($about) ? route('about.update' , $about->id) : route('about.store')}}"
               method="post" enctype="multipart/form-data">
            @csrf
            @isset($about)
                @method('PUT')
            @endisset

                <div class="mb-3">
                    <label for="title" class="form-label">Titel</label>
                    <input type="text" id="title" name="title" placeholder="Geben Sie den Titel der Seite ein" class="form-control"
                           @error('title') is-invalid @enderror value="@if(isset($about)){{ $about->title}}@else{{old('title')}}@endif">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Haupttext</label>
                    <textarea type="text" class="form-control CKEDITOR" style="height: 300px;" id="body" name="body"
                              placeholder="Geben Sie den Haupttext ein"
                              @error('body') is-invalid @enderror>@if(isset($about)){!! $about->body !!}@else{{old('body')}}@endif</textarea>
                    @error('body')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label">Seitenbild</label>
                    <input type="file" id="image" name="image"  class="form-control"
                           placeholder="Seitenbild hochladen" @error('image') is-invalid @enderror>
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                @isset($about)
                    <img src="{{asset('storage/'.$about->image)}}" alt="" width="30%" height="30%" style="display: block;
                       margin-left: auto;margin-right: auto;" class="rounded shadow">
                @endif

                <button type="submit" class="btn btn-primary mt-3">
                    @isset($about)
                        bearbeiten
                    @else
                        erstellen
                    @endisset
                </button>
            </form>
        </div>
    </div>

@endsection
