@extends('layouts.front')
@section('title','über uns')
@section('content')

    <article class="container-main">
        <div class="col-lg-12 col-md-12 col-xs-12 pull-right">
            <div class="section-slider-product mb-4 mt-3">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <h5 class="card-title">über uns</h5>
                    </header>
                    <div class="col-12">
                        <div class="adplacement-container-row mb-4 " style="height:1000px; !important;">
                            <div class="col-12 col-lg-12">
                                @foreach($abouts as $about)
                                    <div class="title-one">
                                        <h4 style="color: #b1d0e0;">
                                            {{$about->title}}
                                        </h4>
                                    </div>
                                    <br>
                                    <div>
                                        <div class="mt-4">
                                            <img src="{{asset('storage/'.$about->image)}}" class="img-fluid" alt="">
                                        </div>
                                        <br>

                                        <div class="m-lg-5 mt-sm-5 text-justify preserveLines" style="color: #b1d0e0; line-height: 30px;">
                                            <p>{!! $about->body !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
