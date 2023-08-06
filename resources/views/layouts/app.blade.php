<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('build/assets/app-bbd6a014.css')}}">
    <script src="{{asset('build/assets/app-66e7f68a.js')}}"></script>
    {{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}

    <!------ CKEDITOR ------>
    <script src="{{asset('https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js')}}"></script>

</head>
<body>
<div class="py-4" id="app">
    <div class="container-fluid">
        <div class="row" style="margin-right: 0">
            <div class="col-md-2 mb-2" style="text-align: left">
                <nav class="navbar navbar-expand-md " style="padding: 0">
                    <div class="container">
                        <button class="navbar-toggler bg-body-secondary mb-2" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="list-group">
                                <li class="list-group-item bg-body-secondary text-center">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <strong> {{ Auth::user()->name }} </strong>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa fa-lg fa-home-user fa-sm" aria-hidden="true"></i>
                                    <a href="{{route('home')}}" class="text-decoration-none"><strong>Admin Panel</strong></a>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa fa-lg fa-list fa-sm" aria-hidden="true"></i>
                                    <a href="{{route('categories.index')}}" class="text-decoration-none">Kategorien</a>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa fa-lg fa-photo-film fa-sm" aria-hidden="true"></i>
                                    <a href="{{route('sliders.index')}}" class="text-decoration-none">Foto-Slider</a>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa fa-lg fa-image fa-sm" aria-hidden="true"></i>
                                    <a href="{{route('posters.index')}}" class="text-decoration-none">Die Poster</a>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa fa-lg fa-user fa-sm" aria-hidden="true"></i>
                                    <a href="{{route('users.index')}}" class="text-decoration-none">Benutzer</a>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa fa-lg fa-box fa-sm" aria-hidden="true"></i>
                                    <a href="{{route('products.index')}}" class="text-decoration-none">Produkte</a>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa  fa-comments fa-sm" aria-hidden="true"></i>
                                    <a href="{{route('comments.index')}}" class="text-decoration-none">Kommentare</a>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa fa-lg fa-cart-shopping fa-sm" aria-hidden="true"></i>
                                    <a href="{{route('orders.index')}}" class="text-decoration-none">Bestellungen</a>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa fa-lg fa-book fa-sm" aria-hidden="true"></i>
                                    <a href="{{route('terms.index')}}" class="text-decoration-none">Bedingungen</a>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa fa-lg fa-contact-card fa-sm" aria-hidden="true"></i>
                                    <a href="{{route('contact.index')}}" class="text-decoration-none">kontaktiere
                                        uns</a>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa fa-lg fa-circle-info fa-sm" aria-hidden="true"></i>
                                    <a href="{{route('about.index')}}" class="text-decoration-none">über uns</a>
                                </li>
                                <li class="list-group-item bg-body-secondary text-center">
                                    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-md-10">
                @include('layouts.flash')
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script src="{{asset('files/js/main.js')}}"></script>
<script src="{{asset('files/js/owl.carousel.min.js')}}"></script>

</html>
