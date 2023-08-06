@extends('layouts.app')

@section('title','Erstellen oder bearbeiten Sie ein Kategorien')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            @isset($category)
                <h5 class="mt-1">Kategorien bearbeiten</h5>
            @else
                <h5 class="mt-1">Kategorien erstellen</h5>
            @endisset
        </div>
        <div class="card-body">
            <form action="{{isset($category) ? route('categories.update' , $category->id) : route('categories.store')}}" method="post">
                @csrf
                @isset($category)
                   @method('PUT')
                @endisset
                <div class="mb-3">
                    <label for="name" class="form-label">Kategoriename</label>
                    <input type="text" id="name" name="name"  class="form-control"
                           placeholder="Geben Sie den Namen der Kategorie ein"
                           @error('name') is-invalid @enderror value="{{isset($category) ? $category->name : '' }}">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="parent_id" class="form-label">Kategorietyp</label>
                    <select name="parent_id" id="parent_id" class="form-select">
                        <option value="0">Hauptkategorie</option>
                        @foreach($categories as $cat)

{{--       <-------------- finding id ------------->--}}
                            <option value="{{$cat->id}}"
{{--       <------------- for edit page (if set a field for name on top field) ------------->--}}
                                 @isset($category)
{{--       <------------- category parent_id = category id (in foreach loop) then show it ------------->--}}
                                        @if($category->parent_id == $cat->id)
                                            selected
                                        @endif
                                    @endisset>
{{--       <------------- shwing bottom arow for parent categories ------------->--}}
                            @if( $cat->parent_id == 0)  <p>+</p>
                            @else <p>&nbsp; -</p>
                            @endif
                            {{$cat->name}} </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    @isset($category)
                        bearbeiten
                    @else
                        erstellen
                    @endisset
                </button>
            </form>
        </div>
    </div>

@endsection
