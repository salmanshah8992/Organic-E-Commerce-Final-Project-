@extends('layouts.frontend_master')

@section('main_content')

<div class="container">
    <div class="about-us intro">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="intro-header">
                        <h3>Welcome To Organic E-Commerce</h3>
                    <p>We are providing fresh & natural product withvery reasonablr price</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="intro-left">
                        <div class="intro-item">
                            <p><img src="{{ asset('frontend') }}/img/intro-icon-1.png" alt="Intro Image"></p>
                            <h4>Always Fresh</h4>
                            <p>At Always Fresh, food is not just fuel.
                                Simple, good food is a way of life where sharing food with loved ones turns everyday moments 
                                into something special.</p>                        </div>

                        <div class="intro-item">
                            <p><img src="{{ asset('frontend') }}/img/intro-icon-3.png" alt="Intro Image"></p>
                            <h4>Super Healthy</h4>
                            <p>We subscribe to ecological agrarian methods of farming, abstaining from the use of pesticides and harmful fertilizers, 
                                to produce only the freshest food crop that is both nutritious and healthy.</p>                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="effect">
                        <a href="#">
                            <img class="img-responsive" src="{{ asset('frontend') }}/img/intro-1.png" alt="Intro Image">
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="intro-right">
                        <div class="intro-item">
                            <p><img src="{{ asset('frontend') }}/img/intro-icon-2.png" alt="Intro Image"></p>
                            <h4>100% Natural</h4>
 <p>We collect all the products from our own farm & production field.After Confirming 
                            order for everyday, we started to collected product from farm & field directly.There 
                            is no middleman options. For all these reasons, it is 100% natural</p>                        </div>

                        <div class="intro-item">
                            <p><img src="{{ asset('frontend') }}/img/intro-icon-4.png" alt="Intro Image"></p>
                            <h4>Premium Quality</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
