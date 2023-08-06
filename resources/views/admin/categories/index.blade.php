@extends('layouts.app')

@section('title','Kategorien')

@section('content')
    <div class="card card-default" style="min-width: 600px; right: 10px">
        <div class="card-header d-flex justify-content-between">
          <h5 class="mt-1">Kategorien</h5>
            <a href="{{route('categories.create')}}" class="btn btn-success btn-sm">Kategorie hinzufügen</a>
        </div>
        <div class="card-body">
            <table class="table text-center">
                <thead class="border">
                    <tr>
                        <th class="bg-primary-subtle">Nummer</th>
                        <th class="bg-primary-subtle">Name</th>
                        <th class="bg-primary-subtle">Kategorietyp</th>
                        <th class="bg-primary-subtle">bearbeiten</th>
                        <th class="bg-primary-subtle">löschen</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $key=> $category)
                    <tr class="align-middle">
                        <td>{{$key+1}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            @if($category->parent_id == 0)
                                <span>Hauptkategorie</span>
                            @else
                                <span>{{\App\Models\Category::find($category->parent_id)->name}}</span> Unterkategorie
                            @endif
                        </td>
                        <td>
                            <a href="{{route('categories.edit',$category->id)}}"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <form action="{{route('categories.destroy', $category->id)}}" method="post">
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
    {{$categories->links()}}
@endsection
