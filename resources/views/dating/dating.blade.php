<?php use Carbon\Carbon; 
use App\Like;
?>

@extends('layouts.dating_layout')
@section('content')
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        @if(!empty(Auth::user()->image))
        <img class="masthead-avatar mb-5" src="{{ asset('image/'.Auth::user()->image) }} " alt="" />
        @else
        <img class="masthead-avatar mb-5" src="https://dummyimage.com/300x200/1ec9bb/ffffff.png&text=NO+IMAGE" alt=""/>
        @endif
        <h1 class="masthead-heading mb-0">{{ Auth::user()->name }}</h1>
        <p class="masthead-subheading font-weight-light mb-0">({{ Carbon::parse(Auth::user()->date_of_birth )->age}} y/o) </p>
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <p class="masthead-subheading font-weight-light mb-0">Location: {{ Auth::user()->location }}</p>
        <p class="masthead-subheading font-weight-light mb-0">Total Mutual: </p>
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
    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
    <!-- Portfolio Grid Items-->
    <div class="row"></div>
    <div class="card-deck">
        <div class="row">
            @foreach ($users as $user)
                    <div class="col-md-4">
                    <div class="card" style="border-radius:20px 20px 20px 20px; margin-bottom: 20px;">
                        @if(empty($user['image']))
                            <img src="https://dummyimage.com/300x200/1ec9bb/ffffff.png&text=NO+IMAGE" style="border-radius:18px 18px 0 0; height:300px; weight:200px;" class="card-img-top" alt="">
                        @else
                        <img src="{{ asset('image/'.$user['image']) }}" style="border-radius:18px 18px 0 0; height:300px; weight:200px;" class="card-img-top" alt="">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$user['name']}}</h5>
                            <p class="card-text"> <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; Age : {{$user['age']}} y/o</p>
                            <p class="card-text"> <i class="fa fa-transgender" aria-hidden="true"></i>&nbsp; Gender : {{ucfirst($user['gender'])}}</p>
                            <p class="card-text"> <i class="fa fa-location-arrow" aria-hidden="true"></i> &nbsp; Location : {{$user['location']}}</p>
                            <p class="card-text"> <i class="fa fa-road" aria-hidden="true"></i>&nbsp; Distance from you : ≈ {{$user['distance']}} km</p>
                        </div>
                        <?php 
                            $status = 0;  $status = Like::where(['user_id'=>Auth::user()->id,'target_user_id'=>$user['id'],'like_status'=>1])->count(); 
                        ?>
                        <div class="card-footer" style="align-items: center;">
                        @if ($status==0)
                        <a title="Like" class="updateLikeStatus btn btn-info" id="target-{{$user['id']}}" target_user_name="{{$user['name']}}" target_user_id="{{$user['id']}}"href="javascript:void(0)">Like</a>
                        @else
                            <a title="Dislike" class="updateLikeStatus btn btn-info" id="target-{{$user['id']}}" target_user_name="{{$user['name']}}" target_user_id="{{$user['id']}}"href="javascript:void(0)">Dislike</a>
                        @endif
                        </div>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>  
@endsection
