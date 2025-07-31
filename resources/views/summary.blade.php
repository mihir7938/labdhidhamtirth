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
       <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Booking Summary <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">Booking Summary</h1>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section">
  <div class="container">
    <div class="profile-section summary-section">
      @include('shared.alert')
      @if (count($errors) > 0)
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form id="payment-form" name="payment-form" action="{{route('booking.paynow')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Booking Summary<a href="{{route('booking')}}">Edit Details</a></h3>
        <div class="border-1 p-15">
          <div class="row">
            <div class="col-md-4">
              <span><strong>Check in Date :</strong></span>
            </div>
            <div class="col-md-8">
              <span>{{ date("d M Y", strtotime($room_booking[0]->check_in_date)) }} {{ date("g:i a", strtotime($room_booking[0]->check_in_time)) }}</span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <span><strong>Check out Date :</strong></span>
            </div>
            <div class="col-md-8">
              <span>{{ date("d M Y", strtotime($room_booking[0]->check_out_date)) }} {{ date("g:i a", strtotime($room_booking[0]->check_out_time)) }}</span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <span><strong>Total Days :</strong></span>
            </div>
            <div class="col-md-8">
              <span>{{$room_booking[0]->days}}</span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <span><strong>Room Type :</strong></span>
            </div>
            <div class="col-md-8">
              <span>{{$room_booking[0]->room_type->name}}</span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <span><strong>Customer Name :</strong></span>
            </div>
            <div class="col-md-8">
              <span>{{$room_booking[0]->customer_name}}</span>
            </div>
          </div>
          @if($room_booking[0]->company_name)
            <div class="row">
              <div class="col-md-4">
                <span><strong>Company Name :</strong></span>
              </div>
              <div class="col-md-8">
                <span>{{$room_booking[0]->company_name}}</span>
              </div>
            </div>
          @endif
          <div class="row">
            <div class="col-md-4">
              <span><strong>Address :</strong></span>
            </div>
            <div class="col-md-8">
              <span>{{$room_booking[0]->address}}</span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <span><strong>City :</strong></span>
            </div>
            <div class="col-md-8">
              <span>{{$room_booking[0]->city}}</span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <span><strong>State :</strong></span>
            </div>
            <div class="col-md-8">
              <span>{{$room_booking[0]->state}}</span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <span><strong>Pincode :</strong></span>
            </div>
            <div class="col-md-8">
              <span>{{$room_booking[0]->pin_code}}</span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <span><strong>Gender :</strong></span>
            </div>
            <div class="col-md-8">
              <span>{{$room_booking[0]->gender}}</span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <span><strong>Email :</strong></span>
            </div>
            <div class="col-md-8">
              <span>{{$room_booking[0]->email}}</span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <span><strong>Mobile :</strong></span>
            </div>
            <div class="col-md-8">
              <span>{{$room_booking[0]->phone}}</span>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <span><strong>ID Proof :</strong></span>
            </div>
            <div class="col-md-8">
              @if($room_booking[0]->id_proof == 'aadhaar')
                <span>Aadhar</span>
              @elseif($room_booking[0]->id_proof == 'driving_license')
                <span>Driving license</span>
              @elseif($room_booking[0]->id_proof == 'pan_card')
                <span>PAN card</span>
              @endif
            </div>
          </div>
        </div>   
        <div id="edit-booking-form">
          <div class="room-details border-top-0">
            <div class="w-500">
              <div class="row heading">
                <div class="col">Room No</div>
                <div class="col">Bed</div>
                <div class="col">Extra Bed</div>
                <div class="col">Rate</div>
                <div class="col">Ex Bed Rate</div>
                <div class="col">Amount</div>
              </div>
              @foreach($room_booking as $booking)
                <div class="row">
                  <div class="col">{{ $booking->room->roomname }}</div>
                  <div class="col">{{ $booking->room->noofbed }}</div>
                  <div class="col">{{ $booking->extra_bed }}</div>
                  <div class="col">{{ $booking->room->amount }}</div>
                  <div class="col">{{ $booking->room->extrabedamt }}</div>
                  <div class="col">{{ $booking->amount }}</div>
                </div>
              @endforeach
              <div class="row align-items-center mb-0 pt-2">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col">Total Amount : <strong class="total">₹{{ $booking->total_amount }}</strong></div>
              </div>
            </div>
          </div> 
        </div>
        <div class="pay_now">
          <button type="submit" name="pay_now" class="btn btn-primary">Pay Now</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
@section('footer')
@endsection