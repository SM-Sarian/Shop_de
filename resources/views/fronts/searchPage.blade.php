@extends('layouts.front')
@section('title','suchen')
@section('content')

    <article class="container-main">
        <div class="col-lg-12 col-md-12 col-xs-12 pull-left">
            <div class="section-slider-product mb-4 mt-3">
                @if($products->count())
                    <div class="widget widget-product card" >
                        <header class="card-header">
                            <h5 class="card-title ">Suchergebnisse</h5>
                        </header>
                        <div class="col-12">
                            <div class="adplacement-container-row mb-4" style="min-height:1500px; !important;">
                                @foreach($products as $product)
                                    <div class="mt-4 col-lg-3 pull-left">
                                        <div class="item mt-4">
                                            <a href="{{route('fronts.product', $product->slug)}}">
                                                <img src="{{asset('storage/'.$product->image)}}" class="img-fluid" alt="">
                                            </a>
                                            <h2 class="post-title mt-2" style="font-size: medium">
                                                <a href="{{route('fronts.product', $product->slug)}}">{{$product->title_de}}</a>
                                            </h2>
                                            <div class="price mb-5">
                                                <ins>
                                                    <span style="color: white">{{number_format($product->price)}} <span>Euro</span></span>
                                                </ins>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{$products->links()}}
                    </div>
                @else
                    <div class="adplacement-container-row mb-4" style=" height:1500px; !important;">
                        <div class="alert alert-primary text-center">
                            <strong>Es gibt kein Produkt mit diesem Namen</strong>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
@endsection
