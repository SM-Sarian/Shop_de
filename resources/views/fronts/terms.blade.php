@extends('layouts.front')
@section('title','Bedingungen')
@section('content')

    <article class="container-main">
        <div class="col-lg-12 col-md-12 col-xs-12 pull-right">
            <div class="section-slider-product mb-4 mt-3">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <h5 class="card-title">Bedingungen</h5>
                    </header>
                    <div class="col-12">
                        <div class="adplacement-container-row mb-4 " style="min-height:1000px; !important;">
                            <div class="col-12 col-lg-12">
                                @foreach($terms as $term)
                                    <div class="title-one">
                                        <h4 style="color: #b1d0e0;">{{$term->title}}</h4>
                                    </div>
                                    <br>
                                    <div class="m-lg-5 mt-sm-5 text-justify" style="color: #b1d0e0; line-height: 30px;">
                                        {!! $term->body !!}
                                    </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </article>
@endsection
