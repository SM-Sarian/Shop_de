@extends('layouts.app')

@section('title','Erstellen oder bearbeiten Sie ein Produkt')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            @isset($product)
                Produktbearbeitung
            @else
                Produkterstellung
            @endisset
        </div>
        <div class="card-body">
            <form action="{{isset($product) ? route('products.update' , $product->id) : route('products.store')}}"
                  method="post" enctype="multipart/form-data">
                @csrf
                @isset($product)
                    @method('PUT')
                @endisset
                <div class="mb-3">
                    <label for="category_id" class="form-label">Wählen Sie eine Produktkategorie aus</label>
                    <select name="category_id" class="form-select">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ (old("category_id") == $cat->id ? "selected":"") }}
                            @isset($product)
                                @if($product->category_id == $cat->id)
                                    selected
                                @endif
                                @endisset>
                                @if($cat->parent_id == 0) <p>{{ $cat->name }}</p>
                                @else <p>&nbsp; -{{ $cat->name }}</p>
                               @endif
                          </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="title_de" class="form-label">Produktname</label>
                    <input type="text" id="title_de" name="title_de" class="form-control" placeholder="Geben Sie den Produktnamen ein"
                           @error('title_de') is-invalid @enderror
                           value="@if(isset($product)){{$product->title_de}}@else{{old('title_de')}}@endif">
                    @error('title_de')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="title_en" class="form-label">Produktname auf Englisch</label>
                    <input type="text" id="title_en" name="title_en" class="form-control"
                           placeholder="Geben Sie den Produktnamen auf Englisch ein" @error('title_en') is-invalid @enderror
                           value="@if(isset($product)){{$product->title_en}}@else{{old('title_en')}}@endif">
                    @error('title_en')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="first_price" class="form-label">Produktpreis (ohne Rabatt)</label>
                    <input type="number" id="first_price" name="first_price" class="form-control"
                           placeholder="Wenn das Produkt einen Rabatt hat, sollte dieses Feld ausgefüllt werden."
                           @error('first_price') is-invalid @enderror
                           value="@if(isset($product)){{$product->first_price}}@else {{old('first_price')}} @endif">
                    @error('first_price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Verkaufspreis (inkl. Rabatt)</label>
                    <input type="number" id="price" name="price" class="form-control"
                           placeholder="Geben Sie den Preis des Produkts ein" @error('price') is-invalid @enderror
                           value="@if(isset($product)){{$product->price}}@else {{old('price')}} @endif">
                    @error('price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Produktbeschreibung</label>
                    <textarea type="text" class="form-control CKEDITOR " id="body" name="body"
                              placeholder="Geben Sie die Produktbeschreibung ein" @error('body') is-invalid @enderror>
                        @if(isset($product)){!! $product->body !!}@else{{old('body')}}@endif</textarea>
                    @error('body')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label">Produktbild</label>
                    <input type="file" id="image" name="image" class="form-control"
                           placeholder="Laden Sie ein Produktbild hoch" @error('image') is-invalid @enderror>
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                @isset($product)
                    <img src="{{asset('storage/'.$product->image)}}" alt="" width="30%" height="30%" style="display: block;
                       margin-left: auto;margin-right: auto;" class="rounded shadow">
                @endif

                <div class="mb-3">
                    <label for="brand" class="form-label">Produktmarke</label>
                    <input type="text" id="brand" name="brand" class="form-control"
                           placeholder="Geben Sie die Produktmarke ein" @error('brand') is-invalid @enderror
                           value="@if(isset($product)){{$product->brand}}@else{{old('brand')}}@endif">
                    @error('brand')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="guarantee" class="form-label">Garantie</label>
                    <input type="text" id="guarantee" name="guarantee" class="form-control"
                           placeholder="Produktgarantie"
                           @error('guarantee') is-invalid @enderror
                           value="@if(isset($product)){{$product->guarantee}}@else{{old('guarantee')}}@endif">
                    @error('guarantee')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="option" class="form-label">Produktmerkmale</label>
                    <textarea type="text" class="form-control description" id="option" name="option"
                              placeholder="Geben Sie die Produktmerkmale ein"
                              @error('option') is-invalid @enderror>@if(isset($product)){{$product->option}}@else{{old('option')}}@endif</textarea>
                    @error('option')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    @isset($product)
                        bearbeiten
                    @else
                        erstellen
                    @endisset
                </button>
            </form>
        </div>
    </div>

@endsection
