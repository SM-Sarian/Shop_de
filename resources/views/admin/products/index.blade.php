@extends('layouts.app')

@section('title','Produkte')

@section('content')
    <div class="card card-default" style="min-width: 1000px; right: 10px">
        <div class="card-header d-flex justify-content-between">
            <span class="mt-1">Produkte</span>
            <a href="{{route('products.create')}}" class="btn btn-success btn-sm">Produkterstellung</a>
        </div>
        <div class="card-body">
            <table class="table text-center">
                <thead class="border">
                <tr>
                    <th class="bg-primary-subtle">Nummer</th>
                    <th class="bg-primary-subtle">Name</th>
                    <th class="bg-primary-subtle">Marke</th>
                    <th class="bg-primary-subtle">Bild</th>
                    <th class="bg-primary-subtle">Kategoriename</th>
                    <th class="bg-primary-subtle">Preis(ohne Rabatt)</th>
                    <th class="bg-primary-subtle">Verkaufspreis(inkl. Rabatt)</th>
                    <th class="bg-primary-subtle">bearbeiten</th>
                    <th class="bg-primary-subtle">löschen</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $key=> $product)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$product->title_de}}</td>
                        <td>{{$product->brand}}</td>
                        <td>
                            <img src="{{asset('storage/'.$product->image)}}" alt="" width="80px" height="40px"
                                 class="rounded shadow">
                        </td>
                        <td>
                            <p>{{$product->category->name}}</p>
                        </td>
                        @if(isset($product->first_price))
                        <td>
                            <p>{{number_format($product->first_price)}} Euro </p>
                        </td>
                        @else
                            <td> - </td>
                        @endif
                        <td>
                            <p>{{number_format($product->price)}} Euro </p>
                        </td>
                        <td>
                            <a href="{{route('products.edit',$product->id)}}"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
                        </td>
                        <td>
                            <form action="{{route('products.destroy', $product->id)}}" method="post">
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
    {{$products->links()}}
@endsection
