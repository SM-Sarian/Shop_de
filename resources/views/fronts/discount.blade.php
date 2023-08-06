@extends('layouts.front')
@section('title','Reduzierte Produkte')
@section('content')

    <article class="container-main">
        <div class="col-lg-12 col-md-12 col-xs-12 pull-left">
            <div class="section-slider-product mb-4 mt-3">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <h5 class="card-title">Reduzierte Produkte</h5>
                    </header>
                    <div class="col-12">
                        <div class="adplacement-container-row mb-4" style=" min-height:1500px; !important;">
                            @foreach($products as $product)
                                <div class="mt-4 col-lg-3 pull-left">
                                    <div class="item mt-4">
                                        <a href="{{route('fronts.product', $product->slug)}}">
                                            <img src="{{asset('storage/'.$product->image)}}" class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title mt-2" style="font-size: medium">
                                            <a href="{{route('fronts.product', $product->slug)}}">{{$product->title_de}}</a>
                                        </h2>
                                        <div class="price mb-3">
                                            <span style="color: red"><s>{{number_format($product->first_price)}} Euro</s></span>
                                        </div>
                                        <div class="price mb-5">
                                                <span style="font-size: large; color: white">{{number_format($product->price)}} Euro</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{$products->links()}}
            </div>
        </div>
    </article>
@endsection
