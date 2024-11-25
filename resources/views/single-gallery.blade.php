@extends('layouts.app')
@section('title') Pacific - Free Bootstrap 4 Template by Colorlib @endsection
@section('header')
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
@endsection
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate pb-5 text-center">
       <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span class="mr-2"><a href="{{route('gallery')}}">Event Photos <i class="fa fa-chevron-right"></i></a></span> <span>{{$album->title}} <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">{{$album->title}}</h1>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section gallery-section">
  <div class="container">
    <div class="row">
      @foreach($photos as $photo)
        <div class="col-lg-3">
          <a href="{{asset('assets/'.$photo->image)}}" data-toggle="lightbox" data-gallery="gallery" class="image">
            <img class="img-fluid rounded" src="{{asset('assets/'.$photo->image)}}">
            @if($photo->title)
              <div class="title">{{$photo->title}}</div>
            @endif
          </a>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script type="text/javascript">
  $(document).on("click", '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox({
      alwaysShowClose: true
    });
  });
</script>
@endsection