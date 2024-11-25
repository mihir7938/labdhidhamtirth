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
       <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>News <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">News</h1>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section services-section">
  <div class="container">
    <div class="row pb-4">
      <div class="col-md-12 heading-section ftco-animate fadeInUp ftco-animated">
        <h3 class="font-weight-bolder">{{ $news->title }}</h3>
      </div>
    </div>
    <div class="row d-flex">
      <div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
        <div class="w-100">
          @if($news->content) {!! $news->content !!} @endif
          @if($news->pdf)
            <p><a href="{{asset('assets/'.$news->pdf)}}" class="btn btn-primary py-3 px-4" target="_blank">Download PDF</a></p>
          @endif
        </div>
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12 d-flex align-self-stretch ftco-animate">
            <div class="services">
              <img src="{{asset('assets/'.$news->image)}}" style="width: 100%;">
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