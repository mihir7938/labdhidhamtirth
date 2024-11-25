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
       <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Room <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">Check Room Availability</h1>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section ftco-no-pb">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="search-wrap-1 ftco-animate">
          <form action="{{route('search-rooms')}}" method="get" class="search-property-1">
            <div class="row no-gutters">
              <div class="col-lg d-flex">
                <div class="form-group p-4 border-0">
                  <label for="#">Check-in date</label>
                  <div class="form-field">
                    <div class="icon"><span class="fa fa-calendar"></span></div>
                    <input type="text" id="checkin_date" name="checkin_date" class="form-control checkin_date" placeholder="Check In Date" value="@if(array_key_exists('checkin_date', $search_values)) {{ $search_values['checkin_date'] }} @endif">
                  </div>
                </div>
              </div>
              <div class="col-lg d-flex">
                <div class="form-group p-4">
                  <label for="#">Days</label>
                  <div class="form-field">
                    <div class="select-wrap">
                      <div class="icon"><span class="fa fa-chevron-down"></span></div>
                      <select name="days" id="days" class="form-control">
                      <option value="">Select</option>
                      <option value="1" @if(array_key_exists('days', $search_values) && $search_values['days'] == 1) selected @endif>1 day</option>
                      <option value="2" @if(array_key_exists('days', $search_values) && $search_values['days'] == 2) selected @endif>2 days</option>
                      <option value="3" @if(array_key_exists('days', $search_values) && $search_values['days'] == 3) selected @endif>3 days</option>
                      <option value="4" @if(array_key_exists('days', $search_values) && $search_values['days'] == 4) selected @endif>4 days</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg d-flex">
                <div class="form-group p-4">
                  <label for="#">Room Types</label>
                  <div class="form-field">
                    <div class="select-wrap">
                      <div class="icon"><span class="fa fa-chevron-down"></span></div>
                      <select name="room_types" id="room_types" class="form-control">
                        <option value="">Select</option>
                        @foreach($roomTypes as $type)
                          <option value="{{$type->id}}" @if(array_key_exists('room_types', $search_values) && $search_values['room_types'] == $type->id) selected @endif>{{$type->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg d-flex">
                <div class="form-group d-flex w-100 border-0">
                  <div class="form-field w-100 align-items-center d-flex">
                    <input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary" id="search">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section ftco-no-pt">
  <div class="container">
    <div class="results ftco-animate" id="results">
      @if($booking_tag)
        @include('search', ['booking_tag' => $booking_tag, 'rooms' => $rooms])
      @endif
    </div>
  </div>
</section>
<!--<section class="ftco-section">
 <div class="container">
  <div class="row">
   <div class="col-md-4 ftco-animate">
    <div class="project-wrap hotel">
     <a href="#" class="img" style="background-image: url(images/hotel-resto-1.jpg);">
      <span class="price">$200/person</span>
    </a>
    <div class="text p-4">
      <p class="star mb-2">
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
      </p>
      <span class="days">8 Days Tour</span>
      <h3><a href="#">Manila Hotel</a></h3>
      <p class="location"><span class="fa fa-map-marker"></span> Manila, Philippines</p>
      <ul>
       <li><span class="flaticon-shower"></span>2</li>
       <li><span class="flaticon-king-size"></span>3</li>
       <li><span class="flaticon-mountains"></span>Near Mountain</li>
     </ul>
   </div>
 </div>
</div>
<div class="col-md-4 ftco-animate">
  <div class="project-wrap hotel">
   <a href="#" class="img" style="background-image: url(images/hotel-resto-2.jpg);">
    <span class="price">$200/person</span>
  </a>
  <div class="text p-4">
    <p class="star mb-2">
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
    </p>
    <span class="days">10 Days Tour</span>
    <h3><a href="#">Manila Hotel</a></h3>
    <p class="location"><span class="fa fa-map-marker"></span> Manila, Philippines</p>
    <ul>
     <li><span class="flaticon-shower"></span>2</li>
     <li><span class="flaticon-king-size"></span>3</li>
     <li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
   </ul>
 </div>
</div>
</div>
<div class="col-md-4 ftco-animate">
  <div class="project-wrap hotel">
   <a href="#" class="img" style="background-image: url(images/hotel-resto-3.jpg);">
    <span class="price">$200/person</span>
  </a>
  <div class="text p-4">
    <p class="star mb-2">
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
    </p>
    <span class="days">7 Days Tour</span>
    <h3><a href="#">Manila Hotel</a></h3>
    <p class="location"><span class="fa fa-map-marker"></span> Manila, Philippines</p>
    <ul>
     <li><span class="flaticon-shower"></span>2</li>
     <li><span class="flaticon-king-size"></span>3</li>
     <li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
   </ul>
 </div>
</div>
</div>

<div class="col-md-4 ftco-animate">
  <div class="project-wrap hotel">
   <a href="#" class="img" style="background-image: url(images/hotel-resto-4.jpg);">
    <span class="price">$200/person</span>
  </a>
  <div class="text p-4">
    <p class="star mb-2">
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
    </p>
    <span class="days">8 Days Tour</span>
    <h3><a href="#">Manila Hotel</a></h3>
    <p class="location"><span class="fa fa-map-marker"></span> Manila, Philippines</p>
    <ul>
     <li><span class="flaticon-shower"></span>2</li>
     <li><span class="flaticon-king-size"></span>3</li>
     <li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
   </ul>
 </div>
</div>
</div>
<div class="col-md-4 ftco-animate">
  <div class="project-wrap hotel">
   <a href="#" class="img" style="background-image: url(images/hotel-resto-5.jpg);">
    <span class="price">$200/person</span>
  </a>
  <div class="text p-4">
    <p class="star mb-2">
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
    </p>
    <span class="days">10 Days Tour</span>
    <h3><a href="#">Manila Hotel</a></h3>
    <p class="location"><span class="fa fa-map-marker"></span> Manila, Philippines</p>
    <ul>
     <li><span class="flaticon-shower"></span>2</li>
     <li><span class="flaticon-king-size"></span>3</li>
     <li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
   </ul>
 </div>
</div>
</div>
<div class="col-md-4 ftco-animate">
  <div class="project-wrap hotel">
   <a href="#" class="img" style="background-image: url(images/hotel-resto-6.jpg);">
    <span class="price">$200/person</span>
  </a>
  <div class="text p-4">
    <p class="star mb-2">
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
    </p>
    <span class="days">7 Days Tour</span>
    <h3><a href="#">Manila Hotel</a></h3>
    <p class="location"><span class="fa fa-map-marker"></span> Manila, Philippines</p>
    <ul>
     <li><span class="flaticon-shower"></span>2</li>
     <li><span class="flaticon-king-size"></span>3</li>
     <li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
   </ul>
 </div>
</div>
</div>
<div class="col-md-4 ftco-animate">
  <div class="project-wrap hotel">
   <a href="#" class="img" style="background-image: url(images/hotel-resto-7.jpg);">
    <span class="price">$200/person</span>
  </a>
  <div class="text p-4">
    <p class="star mb-2">
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
    </p>
    <span class="days">7 Days Tour</span>
    <h3><a href="#">Manila Hotel</a></h3>
    <p class="location"><span class="fa fa-map-marker"></span> Manila, Philippines</p>
    <ul>
     <li><span class="flaticon-shower"></span>2</li>
     <li><span class="flaticon-king-size"></span>3</li>
     <li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
   </ul>
 </div>
</div>
</div>
<div class="col-md-4 ftco-animate">
  <div class="project-wrap hotel">
   <a href="#" class="img" style="background-image: url(images/hotel-resto-8.jpg);">
    <span class="price">$200/person</span>
  </a>
  <div class="text p-4">
    <p class="star mb-2">
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
    </p>
    <span class="days">7 Days Tour</span>
    <h3><a href="#">Manila Hotel</a></h3>
    <p class="location"><span class="fa fa-map-marker"></span> Manila, Philippines</p>
    <ul>
     <li><span class="flaticon-shower"></span>2</li>
     <li><span class="flaticon-king-size"></span>3</li>
     <li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
   </ul>
 </div>
</div>
</div>
<div class="col-md-4 ftco-animate">
  <div class="project-wrap hotel">
   <a href="#" class="img" style="background-image: url(images/hotel-resto-9.jpg);">
    <span class="price">$200/night</span>
  </a>
  <div class="text p-4">
    <p class="star mb-2">
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
      <span class="fa fa-star"></span>
    </p>
    <span class="days">3 Days Tour</span>
    <h3><a href="#">Manila Hotel</a></h3>
    <p class="location"><span class="fa fa-map-marker"></span> Manila, Philippines</p>
    <ul>
     <li><span class="flaticon-shower"></span>2</li>
     <li><span class="flaticon-king-size"></span>3</li>
     <li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
   </ul>
 </div>
</div>
</div>
</div>
<div class="row mt-5">
  <div class="col text-center">
    <div class="block-27">
      <ul>
        <li><a href="#">&lt;</a></li>
        <li class="active"><span>1</span></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">&gt;</a></li>
      </ul>
    </div>
  </div>
</div>
</div>
</section>-->
@endsection
@section('footer')
<script>
  (function() {
    $(document).on("click", "#search", function(e) {
      $('.search-property-1').validate({
        rules: {
          checkin_date: {
            required: true
          },
          days: {
            required: true
          },
          room_types: {
            required: true
          }
        },
        messages:{
          checkin_date: {
            required: "Please enter check in date."
          },
          days:{
            required: "Please enter days."
          },
          room_types:{
            required: "Please enter room types."
          }
        },
        errorPlacement: function(error, element) {
          $(element).parent().after(error);
        },
        submitHandler: function (form) {
          $('#ftco-loader').addClass('show');
          $("#results").html('');
          popoluteRooms("{{ route('search-rooms') }}");
        }
      });
    });
    function popoluteRooms(url){
      var append = url.indexOf("?") == -1 ? "?" : "&";
      var finalURL = url + append + $('.search-property-1').serialize();
      //window.history.pushState({}, null, finalURL);
      $.get(finalURL, function(data) {
          $('#ftco-loader').removeClass('show');
          $('#results').append(data);
      });
    }
    $(document).on("click", "#booking_now", function(e) {
      $('#booking-form').validate({
        submitHandler: function (form) {
          if(!validateRooms()){
            $('.room-msg-area').html('<label class="error">Please select at least one room.</label>');
          } else {
            form.submit();
          }
        },
      });
    });
    function validateRooms(){
      let checked = [];
      $('.room_checkbox').each(function(i,v){
          if($(this).is(':checked')){
              checked.push(1);
          }
      });
      if(checked.length == 0){
          return false;
      }
      return true;
    }
  })();
</script>
@endsection