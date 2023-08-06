@extends('layouts.app')

@section('title','Erstellen oder bearbeiten Sie ein Foto-Slider')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            @isset($slider)
                Foto-Slider bearbeiten
            @else
                Foto-Slider erstellen
            @endisset
        </div>
        <div class="card-body">
            <form action="{{isset($slider) ? route('sliders.update' , $slider->id) : route('sliders.store')}}"
                  method="post" enctype="multipart/form-data">
                @csrf
                @isset($slider)
                   @method('PUT')
                @endisset
                <div class="mb-3">
                    <label for="image" class="form-label">Slider-Foto</label>
                    <input type="file" id="image" name="image" class="form-control" placeholder="Laden Sie das Slider-Foto hoch"
                           @error('name') is-invalid @enderror value="{{isset($slider) ? $slider->name : '' }}">
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                @isset($slider)
                    <img src="{{asset('storage/'.$slider->image)}}" alt="" width="100%" height="100%" class="rounded shadow">
                @endisset

                <button type="submit" class="btn btn-primary mt-3">
                    @isset($slider)
                        bearbeiten
                    @else
                        erstellen
                    @endisset
                </button>
            </form>
        </div>
    </div>

@endsection
