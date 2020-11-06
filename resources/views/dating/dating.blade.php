<?php use Carbon\Carbon; ?>
@extends('layouts.dating_layout')
@section('content')
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <img class="masthead-avatar mb-5" src="{{ asset('image/cake.png')}} " alt="" />
        <h1 class="masthead-heading mb-0">{{ Auth::user()->name }}</h1>
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <p class="masthead-subheading font-weight-light mb-0">Location: {{ Auth::user()->location }}</p>
        <p class="masthead-subheading font-weight-light mb-0">Total Mutual: </p>
        <p class="masthead-subheading font-weight-light mb-0">Age: {{ Carbon::parse(Auth::user()->date_of_birth )->age}}</p>
    </div>
</header>
<br>
<section class="page-section " id="">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h1 class="page-section-heading text-center text-uppercase text-secondary mb-0">User Around You</h1>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row"></div>
        <div class="card-deck">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="border-radius:20px 20px 20px 20px; margin-bottom: 20px;">
                        <img src="{{ asset('image/cake.png')}}" style="border-radius:18px 18px 0 0" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Name</h5>
                            <p class="card-text"> <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; Age : 20 y/o</p>
                            <p class="card-text"> <i class="fa fa-transgender" aria-hidden="true"></i>&nbsp; Gender : Male</p>
                            <p class="card-text"> <i class="fa fa-location-arrow" aria-hidden="true"></i> &nbsp; Location : Dhaka</p>
                            <p class="card-text"> <i class="fa fa-road" aria-hidden="true"></i>&nbsp; Distance : Around 5km</p>
                        </div>
                            <div class="card-footer" style="align-items: center;">
                            <button class="btn btn-info" type="submit"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp; LIKE</button>
                            <button class="btn btn-info" type="submit"><i class="fa fa-thumbs-down" aria-hidden="true"></i>&nbsp; DISLIKE</button>
                            </div>
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="border-radius:20px 20px 20px 20px; margin-bottom: 20px;">
                        <img src="{{ asset('image/cake.png')}}" style="border-radius:18px 18px 0 0" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Name</h5>
                            <p class="card-text"> <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; Age : 20 y/o</p>
                            <p class="card-text"> <i class="fa fa-transgender" aria-hidden="true"></i>&nbsp; Gender : Male</p>
                            <p class="card-text"> <i class="fa fa-location-arrow" aria-hidden="true"></i> &nbsp; Location : Dhaka</p>
                            <p class="card-text"> <i class="fa fa-road" aria-hidden="true"></i>&nbsp; Distance : Around 5km</p>
                        </div>
                            <div class="card-footer">
                            <button class="btn btn-info" type="submit"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp; LIKE</button>
                            <button class="btn btn-info" type="submit"><i class="fa fa-thumbs-down" aria-hidden="true"></i>&nbsp; DISLIKE</button>
                            </div>
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="border-radius:20px 20px 20px 20px; margin-bottom: 20px;">
                        <img src="{{ asset('image/cake.png')}}" style="border-radius:18px 18px 0 0" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Name</h5>
                            <p class="card-text"> <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; Age : 20 y/o</p>
                            <p class="card-text"> <i class="fa fa-transgender" aria-hidden="true"></i>&nbsp; Gender : Male</p>
                            <p class="card-text"> <i class="fa fa-location-arrow" aria-hidden="true"></i> &nbsp; Location : Dhaka</p>
                            <p class="card-text"> <i class="fa fa-road" aria-hidden="true"></i>&nbsp; Distance : Around 5km</p>
                        </div>
                            <div class="card-footer">
                            <button class="btn btn-info" type="submit"><i class="fa fa-thumbs-up" aria-hidden="true"></i>&nbsp; LIKE</button>
                            <button class="btn btn-info" type="submit"><i class="fa fa-thumbs-down" aria-hidden="true"></i>&nbsp; DISLIKE</button>
                            </div>
                        </div>
                </div>
                
            </div>
                
        </div>
    </div>
</section>  
@endsection
