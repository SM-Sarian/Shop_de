@extends('layouts.front')
@section('title','Produkt')
@section('content')
    <div class="nav-categories-overlay"></div>
    <div class="container-main">
        <div class="col-12">
            <div class="breadcrumb-container">
                <ul class="js-breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('fronts.index')}}" class="breadcrumb-link">Startseite</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('fronts.category', $product->category->id)}}" class="breadcrumb-link">
                            {{$product->category->name}}
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-link active-breadcrumb">{{$product->title_de}}</a>
                    </li>
                </ul>
            </div>

            <article class="product">
                <div class="col-lg-4 col-xs-12 pb-5 pull-left">
                    <div class="product-gallery">
                        <div>
                            <img src="{{asset('storage/'.$product->image)}}" alt="" class="img-pro rounded mt-5">
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xs-12 pull-left">
                    <section class="product-info">
                        <div class="product-headline">
                            <h1 class="product-title">{{$product->title_de}}
                                <span class="product-title-en">{{$product->title_en}}</span>
                            </h1>
                        </div>
                        <div class="product-attributes">
                            <div class="col-lg-6 col-xs-12 pull-left">
                                <div class="product-config">
                                    <div class="product-config-wrapper">
                                        <div class="product-directory">
                                            <ul>
                                                <li>
                                                    <span>Marke : </span>
                                                    <span class="product-brand-title">{{$product->brand}}</span>
                                                </li>
                                                <li>
                                                    <span>Garantie : </span>
                                                    <span class="product-brand-title">{{$product->guarantee}}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-params">
                                            <ul>
                                                <ins>Produktmerkmale</ins>
                                                @php
                                                    $explode = explode(PHP_EOL, $product->option)
                                                @endphp
                                                @foreach($explode as $row => $pro)
                                                    <li @if($row > 1) class="product-params-more" @endif>
                                                        <span>{{$pro}}</span>
                                                    </li>
                                                @endforeach
                                                <li class="product-params-more-handler">
                                                    <a href="#" class="more-attr-button">
                                                        <span class="show-more">+ Weiter</span>
                                                        <span class="show-less">- schließen</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-xs-12 pull-right">
                                <div class="product-summary">
                                    <div class="product-seller-info">
                                        <div class="seller-info-changable">
                                            @if(isset($product->first_price))
                                                <div class="product-seller-row price last_item">
                                                    <div class="product-seller-price-info price-value mb-3">
                                                        <span class="title">Preis : </span>
                                                    </div>
                                                    <div class="product-seller-price-info price-value mb-3">
                                                    <span class="amount">
                                                        <s style="color: red">{{number_format($product->first_price)}}
                                                        <span>Euro</span>
                                                        </s>
                                                    </span>
                                                    </div>
                                                </div>

                                                <div class="product-seller-row price last_item">
                                                    <div class="product-seller-price-info price-value mb-3">
                                                        <span class="title">Preis inklusive Rabatt : </span>
                                                    </div>
                                                    <div class="product-seller-price-info price-value mb-3">
                                                    <span class="amount text-danger">{{number_format($product->price)}}
                                                        <span>Euro</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            @else
                                            <div class="product-seller-row price last_item">
                                                <div class="product-seller-price-info price-value mb-3">
                                                    <span class="title">Preis : </span>
                                                </div>
                                                <div class="product-seller-price-info price-value mb-3">
                                                    <span class="amount text-danger">{{number_format($product->price)}}
                                                        <span>Euro</span>
                                                    </span>
                                                </div>
                                            </div>
                                            @endif
                                            <br>
                                            <div class="parent-btn">
                                                <form action="{{route('carts.storeCart')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$product->id}}" name="id">
                                                    <input type="hidden" value="{{$product->title_de}}" name="name">
                                                    <input type="hidden" value="{{$product->price}}" name="price">
                                                    <input type="hidden" value="{{$product->guarantee}}" name="guarantee">
                                                    <input type="hidden" value="{{$product->slug}}" name="slug">
                                                    <input type="hidden" value="{{$product->image}}" name="image">
                                                    <input type="hidden" value="1" name="quantity">
                                                    <button class="dk-btn dk-btn-info at-c as-c">In den Einkaufswagen legen</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </article>
        </div>

        <div class="col-lg-12 col-md-12 col-xs-12 pull-left">
            <div class="section-slider-product mb-4 mt-3">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <span class="title-one" style="margin: 10px">Ähnliche Produkte</span>
                        <h3 class="card-title" style="float: right"><a href="{{route('fronts.category', $product->category_id)}}">Alle ansehen</a></h3>
                    </header>
                    <div class="product-carousel owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
                        <div class="owl-stage-outer pull-left">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1493px;">
                                @foreach($similars as $similar)
                                    <div class="owl-item active" style="width: 203.25px; margin-left: 10px;">
                                        <div class="item">
                                            <a href="{{route('fronts.product',$similar->slug)}}">
                                                <div class="stars-plp">
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                    <span class="mdi mdi-star active"></span>
                                                </div>
                                                <img src="{{asset('storage/'.$similar->image)}}" class="img-fluid" alt="">
                                            </a>
                                            <h2 class="post-title">
                                                <a href="{{route('fronts.product',$similar->slug)}}">{{$similar->title_de}}</a>
                                            </h2>
                                            <div class="price text-center" style="color: #019dea">
                                                <span>{{number_format($similar->price)}}<span>Euro</span></span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav">
                            <button type="button" role="presentation" class="owl-prev disabled">
                                <i class="fa fa-angle-right"></i>
                            </button>
                            <button type="button" role="presentation" class="owl-next">
                                <i class="fa fa-angle-left"></i
                                ></button>
                        </div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="tabs mt-4 pt-3 mb-5">
                <div class="tabs-product">
                    <div class="tab-wrapper">
                        <ul class="box-tabs">
                            <li class="box-tabs-tab tabs-active">
                                <p class="box-tab-item"><i class="mdi mdi-glasses"></i>Rezension</p>
                            </li>
                            <li class="box-tabs-tab">
                                <p class="box-tab-item"><i class="mdi mdi-comment-question-outline"></i>Frage und Antwort</p>
                            </li>
                        </ul>
                    </div>
                    @include('layouts.flash')
                    <div class="tabs-content">
                        <div class="content-expert">
                            <section class="tab-content-wrapper" style="display:block;">
                                <article>
                                    <h2 class="params-headline">
                                        <span>Rezension {{$product->title_de}}</span>
                                    </h2>
                                    <section class="content-expert-summary">
                                        <div class="mask pm-3">
                                            <div class="mask-text">
                                                <p>{!! $product->body !!}</p>
                                            </div>
                                            <a href="#" class="mask-handler">
                                                <span class="show-more">+ Weiter</span>
                                                <span class="show-less">- schließen</span>
                                            </a>
                                            <div class="shadow-box"></div>
                                        </div>
                                    </section>
                                </article>
                            </section>

                            <section class="tab-content-wrapper">
                                <div class="faq-headline">Kommentare
                                    <span>Äußern Sie Ihre Meinung zum Produkt</span>
                                </div>
                                <div class="form-faq">
                                    @auth()
                                        <form action="{{route('comment', $product->id)}}" method="post">
                                            @csrf
                                            <div class="form-faq-row mt-3">
                                                <div class="form-faq-col">
                                                    <div class="ui-textarea">
                                                        <textarea title="Fragetext" name="contents"
                                                                  class="ui-textarea-field"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-faq-row mt-3">
                                                <div class="form-faq-col form-faq-col-submit">
                                                    <button class="btn-tertiary">Registrieren Sie einen Kommentar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <div class="alert alert-success">
                                            Melden Sie sich zuerst an, um einen Kommentar zu posten
                                        </div>
                                    @endauth
                                </div>
                                <div id="product-questions-list">
                                    @foreach($product->comments as $comment)
                                        <div class="questions-list">
                                            <ul class="faq-list">
                                                <li class="is-question">
                                                    <div class="section">
                                                        <div class="faq-header">
                                                            <img src="{{asset('files//images/user.png')}}"
                                                                 alt="{{$comment->user->name}}">
                                                            <p class="h5"><span>{{$comment->user->name}}</span></p>
                                                        </div>
                                                        <p>{{$comment->content}}</p>
                                                        <div class="faq-date">
                                                            <em>{{$comment->updated_at}}</em><br>
                                                            <em>{{$comment->updated_at->diffForHumans()}}</em>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        @if($comment->replies()->count())
                                            @foreach($comment->replies as $reply)
                                                <div class="questions-list answer-questions">
                                                    <ul class="faq-list">
                                                        <li class="is-question">
                                                            <div class="section">
                                                                <div class="faq-header">
                                                                    <img src="{{asset('files//images/user.png')}}"
                                                                         alt="{{$comment->user->name}}">
                                                                    <p class="h5"><span>{{$reply->user->name}}</span></p>
                                                                </div>
                                                                <p>
                                                                    <span class="text-white"> Antwort auf {{$comment->user->name}} :</span>
                                                                </p><br><br><br>
                                                                <p>{{$reply->content}}</p>
                                                                <div class="faq-date">
                                                                    <em>{{$reply->updated_at}}</em><br>
                                                                    <em>{{$reply->updated_at->diffForHumans()}}</em>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
