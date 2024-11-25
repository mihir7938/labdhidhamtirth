@extends('layouts.app')
@section('title') Pacific - Free Bootstrap 4 Template by Colorlib @endsection
@section('header')
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta name="description" content="" />
<meta name="keywords" content="" />
@endsection
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate pb-5 text-center">
       <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Room Amenities <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">Room Amenities</h1>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="profile-section">
        @include('shared.alert')
        <h3>Room Amenities</h3>
        <div class="d-block">
          <div class="row">
            <div class="col-md-6">
              @foreach($amenities as $amenity)
                @if($amenity->active == 1)
                  <div class="am"><span class="icon fa fa-check-circle"></span><span class="ml-2">{{$amenity->title}}</span></div>
                @endif
              @endforeach
            </div>
            <div class="col-md-6">
              @foreach($amenities as $amenity)
                @if($amenity->active == 0)
                  <div class="am"><span class="icon fa fa-times-circle"></span><span class="ml-2">{{$amenity->title}}</span></div>
                @endif
              @endforeach
            </div>
          </div>
        </div>    
      </div>
    </div>
  </div>
</section>
@endsection
@section('footer')
@endsection