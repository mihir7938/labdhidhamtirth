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
       <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="{{route('donor')}}">Donor <i class="fa fa-chevron-right"></i></a></span> <span>{{$donor_category->title}} <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">{{$donor_category->title}}</h1>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section gallery-section">
  <div class="container">
    <div class="row">
      @foreach($donors as $donor)
        <div class="col-lg-3">
          <span class="image">
            <img class="img-fluid rounded" src="{{asset('assets/'.$donor->image)}}">
            <div class="title">{{$donor->title}}</div>
            @if($donor->content)
              <div class="title">{!! $donor->content !!}</div>
            @endif
          </span>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
@section('footer')
@endsection