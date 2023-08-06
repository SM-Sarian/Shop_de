@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header text-center bg-body-secondary">
            <strong>{{ __('Admin Panel') }}</strong>
        </div>
        <div class="row m-3 mt-4 text-center border border-2 bg-body-secondary">
            <div name="categories" class="col-4">
                <img class="mt-3 rounded-3 img-thumbnail" src="{{asset('/files/images/category.jpg')}}" alt="">
                <p class="mt-2 "><strong><ins>Kategorien : {{$categories}}</ins></strong></p>
            </div>
            <div name="products" class="col-4">
                <img class="mt-3 rounded-3 img-thumbnail" src="{{asset('/files/images/product.jpg')}}" alt="">
                <p class="mt-2 "><strong><ins>Produkte : {{$products}}</ins></strong></p>
            </div>
            <div name="itemCarts" class="col-4">
                <img class="mt-3 rounded-3 img-thumbnail" src="{{asset('/files/images/order.jpg')}}" alt="">
                <p class="mt-2 "><strong><ins>Bestellungen : {{$orders}}</ins></strong></p>
            </div>
        </div>
        <div class="row m-3 mt-4 text-center border border-2 bg-body-secondary">
            <div name="comments" class="col-4 ">
                <img class="mt-3 rounded-3 img-thumbnail" src="{{asset('/files/images/comment.jpg')}}" alt="">
                <p class="mt-2 "><strong><ins>Kommentare : {{$comments}}</ins></strong></p>
            </div>
            <div name="online_users" class="col-4 ">
                <img class="mt-3 rounded-3 img-thumbnail" src="{{asset('/files/images/admin.jpg')}}" alt="">
                <p class="mt-2 "><strong><ins>Admins : {{$admin_users}}</ins></strong></p>
            </div>
            <div name="users" class="col-4 ">
                <img class="mt-3 rounded-3 img-thumbnail" src="{{asset('/files/images/user.jpg')}}" alt="">
                <p class="mt-2 "><strong><ins>Benutzer : {{$users}} <p></p></ins></strong></p>
            </div>
        </div>
    </div>
@endsection
