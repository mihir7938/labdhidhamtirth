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
       <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Gallery <i class="fa fa-chevron-right"></i></span> <span>Event Photos <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">Event Photos</h1>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section gallery-section">
  <div class="container">
    <div class="row">
      @foreach($albums as $album)
        <div class="col-lg-3">
          <a href="{{route('gallery.album', ['id' => $album->id])}}" class="image">
            <img class="img-thumbnail" src="{{asset('assets/'.$album->image)}}" alt="{{$album->title}}">
            <div class="title">{{$album->title}}</div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
@section('footer')
@endsection