@extends('layouts.app')

@section('title','Foto-Slider')

@section('content')
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <span class="mt-1">Foto-Slider</span>
            <a href="{{route('sliders.create')}}" class="btn btn-success btn-sm">Foto-Slider erstellen</a>
        </div>
        <div class="card-body">
            <table class="table text-center">
                <thead class="border">
                <tr>
                    <th class="bg-primary-subtle">Nummer</th>
                    <th class="bg-primary-subtle">Bild</th>
                    <th class="bg-primary-subtle">bearbeiten</th>
                    <th class="bg-primary-subtle">löschen</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $key=> $slider)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                            <img src="{{asset('storage/'.$slider->image)}}" alt="" width="80px"  height="40px" class="rounded shadow">
                        </td>
                        <td>
                            <a href="{{route('sliders.edit',$slider->id)}}"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <form action="{{route('sliders.destroy', $slider->id)}}" method="post">
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
    </div>
@endsection
