@extends('layouts.front')
@section('title','kontaktiere uns')
@section('content')

    <article class="container-main">
        <div class="col-lg-12 col-md-12 col-xs-12 ">
            <div class="section-slider-product mb-4 mt-3">
                <div class="widget widget-product card">
                    <header class="card-header">
                        <h5 class="card-title">kontaktiere uns</h5>
                    </header>
                    <div class="col-12">
                        <div class="adplacement-container-row mb-4 owl-height" style="height:1000px; !important;">
                            <div class="col-12 col-lg-12">
                                @foreach($contacts as $contact)
                                    <div class="title-one my-5" style="color: #b1d0e0;">
                                       <u>
                                           <h4>{{$contact->title}}</h4>
                                       </u>
                                    </div>
                                    <div class="row mt-5 preserveLines">
                                        <div class="item col-lg-6 float-lg-right mr-0 text-justify text-center" style="color: #b1d0e0; line-height: 30px;">
                                            <p>{!! $contact->body !!}</p>
                                        </div>
                                @endforeach
                                        <div class=" col-lg-6">
                                            <iframe class="img-thumbnail" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d8639.109736906192!2d50.903424661722376!3d35.79969348083755!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1690823851663!5m2!1sen!2sus" style = "width:500px; height:250px;"></iframe>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
