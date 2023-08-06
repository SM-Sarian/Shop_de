@extends('layouts.front')
@section('title')
    Einkaufswagen
@endsection
@section('content')
    @include('layouts.flash')

    @php $totals = Cart::getTotal(); @endphp
    <section class="main-cart container">
        <div class="o-page__content">
            <div class="o-headline">
                <div id="main-cart">
                    <span class="c-checkout-text c-checkout__tab--active">Einkaufswagen</span>
                    <span class="c-checkout__tab-counter">{{Cart::getContent()->count()}}</span>
                </div>
            </div>
            <div class="c-checkout">
                <ul class="c-checkout__items" style="min-height: 1000px; !important;">
                    @foreach($itemCarts as $itemCart)
                        <li class="">
                            <div class="c-checkout__header float-right">
                                <form action="{{route('carts.removeCart')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$itemCart->id}}">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="c-checkout__row ml-3">
                                <div class="item mr-3">
                                    <a href="{{route('fronts.product', $itemCart->attributes->slug)}}">
                                        <img style="width: 150px; !important;"
                                             src="{{asset('storage/'.$itemCart->attributes->image)}}" alt=""></a>
                                </div>
                                <div class="c-checkout__col--desc mt-1">
                                    <a href="{{route('fronts.product', $itemCart->attributes->slug)}}">{{$itemCart->name}}</a>

                                    <div class="c-checkout__col c-checkout__col--price mt-3">
                                        <div class="c-checkout__price"
                                             style="padding-right: 0"> {{number_format($itemCart->price)}} Euro
                                        </div>
                                        <div style="color: #A1D0E0">
                                            Garantie : {{$itemCart->attributes->guarantee}}
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <form action="{{route('carts.updateCart')}}" method="post">
                                                @csrf
                                                <div class="input-group w-50">
                                                    <input type="number" class="form-control rounded" name="quantity"
                                                           value="{{$itemCart->quantity}}"
                                                           aria-label="Input group example"
                                                           aria-describedby="basic-addon1">
                                                    <input type="hidden" name="id" value="{{$itemCart->id}}">
                                                    <button class="input-group-text btn btn-primary" id="basic-addon1">
                                                        <i class="fa fa-cart-plus"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="c-checkout__to-shipping-sticky">
                    @if(Cart::getContent()->count())
                        <form action="{{route('pay.request')}}" method="post">
                            @csrf
                            <button class="c-checkout__to-shipping-link">mit dem Einkaufen fortfahren</button>
                        </form>
                    @endif
                    <div class="c-checkout__to-shipping-price-report">
                        <p class="text-justify">Bruttopreis</p>
                        <div class="c-checkout__to-shipping-price-report--price text-center">
                            @if($totals == 0)
                                <span>In Ihrem Einkaufswagen befindet sich kein Produkt</span>
                            @else
                                {{number_format($totals)}} <span> Euro</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <aside class="c-checkout__col col-lg-3 mt-5 ">
            <div class="c-checkout-aside mt-3">
                <div class="c-checkout-summary">
                    <ul class="c-checkout-summary__summary ">
                        <li>@if(Cart::getContent()->count() > 1)
                                <span> Preis für {{Cart::getContent()->count()}} Produkte </span>
                            @else
                                <span> Preis für 1 Produkt </span>
                            @endif
                            <span> {{number_format($totals)}} Euro </span>
                        </li>
                        <li class="has-devider">
                            <span>Postgebühr</span>
                            @if($totals == 0 )
                                <span>0 Euro </span>
                            @else
                                <span>10 Euro </span>
                            @endif
                        </li>
                        <li class="has-devider">
                            <span>VAT</span>
                            <span>{{number_format(($totals * 9 / 100))}}</span>
                        </li>
                        <li class="has-devider">
                        <li>
                            <span>Gesamtpreis Netto</span>
                            @if($totals == 0 )
                                <span>0 Euro </span>
                            @else
                                @php
                                    $calculation = ($totals * 9 / 100)+($totals+10);
                                    session()->put('total', $calculation);
                                @endphp
                                <span> {{number_format($calculation)}} Euro </span>
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="c-checkout-feature-aside">
                    <ul>
                        <li class="c-checkout-feature-aside__item c-checkout-feature-aside__item--guarantee"><i
                                class="fa-duotone fa-box-check ml-0 mr-3"></i>
                            Lieferung von Qualitätsprodukten
                        </li>
                        <li class="c-checkout-feature-aside__item c-checkout-feature-aside__item--cash"><i
                                class="fa-duotone fa-credit-card-front  ml-0 mr-3"></i>
                            Sichere Bezahlung
                        </li>
                        <li class="c-checkout-feature-aside__item c-checkout-feature-aside__item--express"><i
                                class="fa-duotone fa-truck  ml-0 mr-3"></i>Lieferung so schnell wie möglich
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
@endsection
