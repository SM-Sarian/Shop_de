@extends('layouts.front')
@section('title','Sarian Shop')
@section('content')

    <article class="container-main">
        <div class="page-row-main-top">
            <div class="col-lg-8 col-md-8 col-xs-12 pull-right">
                <!--    slider--------------------------------->
                <div class="main-slider-container">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach($sliders as $key => $slider)
                                <li data-target="#carouselExampleIndicators" data-slide-to="0"
                                    class="@if($key == 0) active  @endif"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($sliders as $key => $slider)
                                <div class="carousel-item @if($key == 0) active  @endif ">
                                    <img class="d-block w-100" src="{{asset('storage/'.$slider->image)}}" alt="First slide">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <i class="fa-duotone fa-chevrons-left"></i>
                            <span class="sr-only">Vorherige</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <i class="fa-duotone fa-chevrons-right"></i>
                            <span class="sr-only">Nächste</span>
                        </a>
                    </div>
                </div>
            </div>

            <!--adplacement-------------------------------->
            <div class="col-lg-4 col-md-4 col-xs-12 pull-left">
                <aside class="adplacement-container-column">
                    <a href="{{$posters[0]->url}}" class="adplacement-item adplacement-item-column">
                        <div class="adplacement-sponsored-box">
                            <img src="{{asset('storage/'.$posters[0]->image)}}" alt="">
                        </div>
                    </a>
                    <a href="{{$posters[1]->url}}" class="adplacement-item adplacement-item-column">
                        <div class="adplacement-sponsored-box">
                            <img src="{{asset('storage/'.$posters[1]->image)}}" alt="">
                        </div>
                    </a>
                </aside>
            </div>
        </div>

        <!--    product-slider------------------------->
        <div class="col-lg-9 col-md-9 col-xs-12 pull-right">
            <div class="section-slider-product mb-4 mt-3">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one m-2">neueste</span>
                        <h3 class="card-title" style=" float: right">
                            <a href="{{route('fronts.recent')}}">Alle ansehen</a>
                        </h3>
                    </header>
                    <div  class="product-carousel owl-carousel owl-theme owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                @foreach($products as $product)
                                    <div class="owl-item active" style="width: 309.083px; margin-left: 10px; margin-bottom: 10px">
                                        <div class="item">
                                            <a href="{{route('fronts.product', $product->slug)}}">
                                                <img src="{{asset('storage/'.$product->image)}}" class="img-fluid text-center" alt="">
                                            </a>
                                            <h2 class="post-title">
                                                <a href="{{route('fronts.product', $product->slug)}}">{{$product->title_de}}</a>
                                            </h2>
                                            <div class="price text-center mb-5">
                                                <ins>
                                                    <span>{{number_format($product->price)}}<span> Euro</span></span>
                                                </ins>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--slider-sidebar----------------------------->
        <div class="col-lg-3 col-md-3 col-xs-12 pull-left">
            <div class="promo-single mb-5 mt-3">
                <div class="widget-suggestion widget card">
                    <header class="card-header cart-sidebar">
                        <h3 class="card-title ts-3 mt-3">kaufe jetzt</h3>
                    </header>
                    <div id="progressBar">
                        <div class="slide-progress" style="width: 100%; transition: width 5000ms ease 0s;"></div>
                    </div>
                    <div id="suggestion-slider" class="owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(1369px, 0px, 0px); transition: all 0.25s ease 0s; width: 2190px;">
                                @foreach($suggests as $suggest)
                                    <div class="owl-item cloned" style="width: 273.75px;">
                                        <div class="item">
                                            <a href="{{route('fronts.product', $suggest->slug)}}">
                                                <img src="{{asset('storage/'.$suggest->image)}}" class="w-100" alt="">
                                            </a>
                                            <h3 class="product-title">
                                                <a href="{{route('fronts.product', $suggest->slug)}}"> {{$suggest->title_de}} </a>
                                            </h3>
                                            <div class="price text-center" style="color: #b1d0e0;">
                                                <span class="amount">{{number_format($suggest->price)}}<span> Euro</span></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <br>
                            <br>
                        </div>
                        <div class="owl-nav disabled">
                            <button type="button" role="presentation" class="owl-prev"><span aria-label="Vorherige">‹</span></button>
                            <button type="button" role="presentation" class="owl-next"><span aria-label="Nächste">›</span></button>
                        </div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>

        <!--    adplacemen-container----------------------------->
        <div class="col-12">
            <div class="adplacement-container-row mb-4">
                <div class="col-6 col-lg-3 pull-right" style="padding-left:0;">
                    <a href="{{$posters[2]->url}}" class="adplacement-item mb-4">
                        <div class="adplacement-sponsored-box">
                            <img src="{{asset('storage/'.$posters[2]->image)}}" alt="" title="">
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3 pull-right" style="padding-left:0;">
                    <a href="{{$posters[3]->url}}" class="adplacement-item mb-4">
                        <div class="adplacement-sponsored-box">
                            <img src="{{asset('storage/'.$posters[3]->image)}}" alt="" title="">
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3 pull-right" style="padding-left:0;">
                    <a href="{{$posters[4]->url}}" class="adplacement-item mb-4">
                        <div class="adplacement-sponsored-box">
                            <img src="{{asset('storage/'.$posters[4]->image)}}" alt="" title="">
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3 pull-right" style="padding-left:0;">
                    <a href="{{$posters[5]->url}}" class="adplacement-item mb-4">
                        <div class="adplacement-sponsored-box">
                            <img src="{{asset('storage/'.$posters[5]->image)}}" alt="" title="">
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-6 pull-right" style="padding-left:0;">
                    <a href="{{$posters[6]->url}}" class="adplacement-item">
                        <div class="adplacement-sponsored-box">
                            <img src="{{asset('storage/'.$posters[6]->image)}}" alt="" title="">
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-6 pull-right" style="padding-left:0;">
                    <a href="{{$posters[7]->url}}" class="adplacement-item">
                        <div class="adplacement-sponsored-box">
                            <img src="{{asset('storage/'.$posters[7]->image)}}" alt="" title="">
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!--    product-slider----------------------------------->
        <div class="col-lg-12 col-md-12 col-xs-12 pull-right">
            <div class="section-slider-product mb-4">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one m-2">Reduzierte Produkte</span>
                        <h3 class="card-title" style=" float: right"><a href="{{route('fronts.discount')}}">Alle ansehen</a></h3>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2234px;">
                                @foreach($discounts as $discount)
                                    <div class="owl-item active" style="width: 309.083px; margin-left: 10px;  margin-bottom: 10px">
                                        <div class="item">
                                            <a href="{{route('fronts.product', $discount->slug)}}">
                                                <img src="{{asset('storage/'.$discount->image)}}" class="img-fluid" alt="">
                                            </a>
                                            <h2 class="post-title">
                                                <a href="{{route('fronts.product', $discount->slug)}}">{{$discount->title_de}}</a>
                                            </h2>
                                            <div class="price text-center mb-5">
                                                    <p style="color: red"><s>{{(number_format($discount->first_price))}} Euro</s></p>
                                                    <p style="color: white">{{(number_format($discount->price))}} Euro</p>
                                                    <div class="stars-plp">
                                                        <span class="mdi mdi-star active"></span>
                                                        <span class="mdi mdi-star active"></span>
                                                        <span class="mdi mdi-star active"></span>
                                                        <span class="mdi mdi-star active"></span>
                                                        <span class="mdi mdi-star active"></span>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--    adplacemen-container----------------------------->
        <div class="col-12">
            <div class="adplacement-container-row mb-4">
                <div class="col-6 col-lg-6 pull-right" style="padding-left:0;">
                    <a href="{{$posters[8]->url}}" class="adplacement-item">
                        <div class="adplacement-sponsored-box">
                            <img src="{{asset('storage/'.$posters[8]->image)}}" alt="" title="">
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-6 pull-right" style="padding-left:0;">
                    <a href="{{$posters[9]->url}}" class="adplacement-item">
                        <div class="adplacement-sponsored-box">
                            <img src="{{asset('storage/'.$posters[9]->image)}}" title="" alt="">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </article>
@endsection
