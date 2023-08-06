<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
    <title>@yield('title')</title>

    <!--site logo------------------------------------>
    <link rel="icon" href="{{asset('files/images/logoSarian.png')}}" type="image/x-icon">

    <!--font------------------------------------>
    <link rel="stylesheet" href="{{asset('files/icon/css/all.min.css')}}">

    <!--bootstrap------------------------------->
    <link rel="stylesheet" href="{{asset('files/css/bootstrap.css')}}">
    <!--owl.carousel---------------------------->
    <link rel="stylesheet" href="{{asset('files/css/owl.carousel.min.css')}}">
    <!--responsive------------------------------>
    <link rel="stylesheet" href="{{asset('files/css/responsive.css')}}">
    <!--main style------------------------------>
    <link rel="stylesheet" href="{{asset('files/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('files/css/main.cart.css')}}">

</head>

<body>
@if(!request()->is(['login','register']))
    <!--header------------------------------------->
    <header>
        <div class="container-main">
            <div class="col-lg-8 col-md-8 col-xs-12 pull-right">
                <div class="header-right">
                    <div class="logo">
                        <a href="{{route('fronts.index')}}">
                            <h2 style="margin-top: 15px;">Sarian Shop</h2>
                        </a>
                    </div>
                    <div class="col-lg-9 col-md-9 col-xs-12 pull-right">
                        <div class="search-header">
                            @include('layouts.search')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 pull-left">
                @auth()
                    <div class="header-left">
                        <ul class="nav-lr">
                            <li class="nav-item-account">
                                <a href="#">
                                    <img src="{{asset('files/images/user.png')}}" alt="user">
                                    <p>{{auth()->user()->name}}</p>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="dropdown-menu-item text-left">
                                                <a href="{{ route('logout') }}" class="dropdown-item"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    <i class="mdi mdi-account-card-details-outline"></i>
                                                    Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="header-left text-left">
                        <a href="{{route('login')}}" class="btn btn-primary ml-2">Login</a>
                        <a href="{{route('register')}}" class="btn btn-primary">Register</a>
                    </div>
                @endauth
            </div>
            <div class="overlay-search-box"></div>
        </div>
        <!--        menu------------------------------->
        <nav class="main-menu">
            <div class="container-main">
                <div>
                    <ul class="list-menu">
                        <li class="item-list-menu megamenu mr-5">
                            <a href="{{route('fronts.index')}}" style="font-size: x-large;">Startseite</a>
                        </li>
                        @foreach($categories as $category)
                            <li class="item-list-menu megamenu lp-drop">
                                @if($category->parents()->count())
                                    <a href="#">
                                        {{$category->name}}
                                        @if($category->parents()->count())
                                            <i class="fa fa-angle-down"></i>
                                        @endif
                                    </a>
                                @else
                                    <a href="{{route('fronts.category', $category->id)}}">
                                        {{$category->name}}
                                    </a>
                                @endif
                                @if($category->parents()->count())
                                    <div class="dropdown-menu dlp-menu">
                                        <ul>
                                            @foreach($category->parents as $parent)
                                                <li>
                                                    <a href="{{route('fronts.category', $parent->id)}}" class="dropdown-item">
                                                        <i class="mdi mdi-account-card-details-outline"></i>{{$parent->name}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                        <li class="item-list-menu megamenu lp-drop">
                            <a href="{{route('fronts.terms')}}" >Bedingungen</a>
                        </li>
                        <li class="item-list-menu megamenu lp-drop">
                            <a href="{{route('fronts.about')}}">über uns</a>
                        </li>
                        <li class="item-list-menu megamenu lp-drop">
                            <a href="{{route('fronts.contact')}}">kontaktiere uns</a>
                        </li>
                        <li class="nav-item-account nav-item-cart">
                            <a href="#">Einkaufswagen
                                <span class="count">{{Cart::getContent()->count()}}</span>
                                <i class="fa-duotone fa-basket-shopping-simple"></i>
                            </a>
                            <div class="dropdown-menu-cart">
                                <div class="dropdown-header text-center">
                                    <span class=" ml-4" style="color: white">meine Einkäufe</span>
                                </div>
                                <div class="wrapper">
                                    <div class="scrollbar" id="style-1">
                                        <div class="force-overflow">
                                            <ul class="dropdown-list">
                                                @foreach($itemCarts as $itemCart)
                                                    <a class="text-center"
                                                       href="{{route('fronts.product', $itemCart->attributes->slug)}}">
                                                        <li class="dropdown-item">
                                                            <div class="title-cart">
                                                                <img
                                                                    src="{{asset('storage/'.$itemCart->attributes->image)}}" alt="">
                                                                <div class="price" style="color: #A6D0E0;">
                                                                    {{$itemCart->name}}
                                                                </div>
                                                                <br>
                                                                <div
                                                                    class="price text-center">{{number_format($itemCart->price)}}
                                                                    <span> Euro </span>
                                                                </div>
                                                                <button class="btn-delete">
                                                                    <span class="mdi mdi-close"></span>
                                                                </button>
                                                            </div>
                                                        </li>
                                                    </a>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-dropdown">
                                    <div class="amount-total-buy">
                                        <div class="price">
                                            <span class="total">Gesamtkaufbetrag : </span>
                                            <span class="toman">
                                            @if(empty(Cart::getTotal()))
                                                    <span>Keine Produkte ausgewählt</span>
                                                @else
                                                    {{number_format(Cart::getTotal())}}
                                                    <span>Euro</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <a href="{{route('fronts.cart')}}" class="checkout">Einkaufswagen anzeigen</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!--        menu------------------------------->
            <div class="nav-btn nav-slider">
                <span class="linee1"></span>
                <span class="linee2"></span>
                <span class="linee3"></span>
            </div>
        </nav>

        <!--    menu-responsiver----------------------->
        <nav class="sidebar">
            <div class="nav-header">
                <div class="header-cover"></div>
                <div class="logo-wrap">
                    <a class="logo-icon" href="{{route('fronts.index')}}"><h3>Sarian Shop</h3></a>
                </div>
            </div>
            <ul class="nav-categories ul-base">
                @foreach($categories as $category)
                    <li class="mb-2">
                        @if($category->parents()->count())
                            <a class="item-list-menu megamenu" style="color: #CCE5FF; !important;" href="#">{{$category->name}}</a>
                        @else
                            <a href="{{route('fronts.category', $category->id)}}">{{$category->name}}</a>
                        @endif
                        @if($category->parents()->count())

                            <ul class="mb-3">
                                @foreach($category->parents as $parent)
                                    <li>
                                        <a href="{{route('fronts.category', $parent->id)}}">- {{$parent->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
                <li class="mb-3">
                    <a href="{{route('fronts.terms')}}" class="list-category">Bedingungen</a>
                </li>
                <li class="mb-3">
                    <a href="{{route('fronts.about')}}" class="list-category">über uns</a>
                </li>
                <li class="mb-3">
                    <a href="{{route('fronts.contact')}}" class="list-category">kontaktiere uns</a>
                </li>
            </ul>
        </nav>
        <div class="overlay"></div>
        <!--    menu-responsiver----------------------->

    </header>
    <div class="nav-categories-overlay"></div>
    <!--header------------------------------------->
@endif
<!--    slider--------------------------------->
@yield('content')


@if(!request()->is(['login','register']))
    <!--footer------------------------------------->
    <footer class="footer">
        <div class="row">
            <div class="footer-jumpup">
                <div class="container">
                    <a href="#">
                        <span href="#" class="footer-jumpup-container"><i class="fa fa-angle-up"></i></span>
                    </a>
                </div>
            </div>
        </div>
        <article class="container-main">
            <div class="footer-more-info">
                <div class="footer-description-content">
                    <div class="col-xs-8 col-md-8 col-xs-12 pull-right">
                        <div class="footer-content ">
                            <article class="footer-seo mt-3 text-justify">
                                <h1>Sarian Shop</h1>
                                <p>
                                    Dieser Shop ist für Portfolio gedacht und die aufgeführten Produkte sind nicht echt.
                                    Diese Seite ist ein Test und ein Kauf ist nicht möglich. Alle Rechte dieser Website
                                    liegen bei ihrem Entwickler Seyed Mohammad Sarian.
                                </p>
                            </article>
                        </div>
                        <div class="footer-community" style="width: 100%">
                            <div class="footer-social mb-4 mt-4">
                                <div class="footer-social">
                                    <ul class="footer-ul-social">
                                        <span>Sozialen Netzwerken:</span>
                                        <li class="footer-social-item">
                                            <a href="#" class="footer-social-link">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="footer-social-item">
                                            <a href="#" class="footer-social-link">
                                                <i class="fa-brands fa-whatsapp"></i>
                                            </a>
                                        </li>
                                        <li class="footer-social-item">
                                            <a href="#" class="footer-social-link">
                                                <i class="fa-brands fa-telegram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="col-lg-4 col-md-4 col-xs-12 pull-left">
                            <aside>
                                <ul class="footer-safety-partner mt-4 pull-left">
                                    <li class="footer-safety-partner-1">
                                        <a href="#">
                                            <img src="{{asset('files/images/footer1.jpg')}}" alt="">
                                        </a>
                                    </li>
                                    <li class="footer-safety-partner-1">
                                        <a href="#">
                                            <img src="{{asset('files/images/footer2.jpg')}}" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="footer-copyright-text">
                    Design by SM.Sarian © 2023
                </div>
            </div>
        </article>
    </footer>
    <!--footer------------------------------------->
</body>
@endif
<!--jquery--------------------------------------->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<!--bootstrap-------------------------------->
<script src="{{asset('files/js/bootstrap.js')}}"></script>
<!--    owl.carousel----------------------------->
<script src="{{asset('files/js/owl.carousel.min.js')}}"></script>
<!--main----------------------------------------->
<script src="{{asset('files/js/main.js')}}"></script>
</html>
