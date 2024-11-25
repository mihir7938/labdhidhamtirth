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
       <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>View Booking <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">View Booking</h1>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section">
  <div class="container">
    <div class="profile-section summary-section">
      <h3>Booking Details</h3>
      <div class="border-1 p-15">
        <div class="row">
          <div class="col-md-4">
            <span><strong>Booking ID :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{$bookingDetails[0]->booking_id}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Check in Date :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ date("d M Y", strtotime($bookingDetails[0]->check_in_date)) }} {{ date("g:i a", strtotime($bookingDetails[0]->check_in_time)) }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Check out Date :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ date("d M Y", strtotime($bookingDetails[0]->check_out_date)) }} {{ date("g:i a", strtotime($bookingDetails[0]->check_out_time)) }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Total Days :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{$bookingDetails[0]->days}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Room Type :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{$bookingDetails[0]->room_type->name}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Customer Name :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{$bookingDetails[0]->customer_name}}</span>
          </div>
        </div>
        @if($bookingDetails[0]->company_name)
          <div class="row">
            <div class="col-md-4">
              <span><strong>Company Name :</strong></span>
            </div>
            <div class="col-md-8">
              <span>{{$bookingDetails[0]->company_name}}</span>
            </div>
          </div>
        @endif
        <div class="row">
          <div class="col-md-4">
            <span><strong>Address :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{$bookingDetails[0]->address}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>City :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{$bookingDetails[0]->city}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>State :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{$bookingDetails[0]->state}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Pincode :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{$bookingDetails[0]->pin_code}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Gender :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{$bookingDetails[0]->gender}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Email :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{$bookingDetails[0]->email}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Mobile :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{$bookingDetails[0]->phone}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>ID Proof :</strong></span>
          </div>
          <div class="col-md-8">
            @if($bookingDetails[0]->id_proof == 'aadhaar')
              <span>Aadhar</span>
            @elseif($bookingDetails[0]->id_proof == 'driving_license')
              <span>Driving license</span>
            @elseif($bookingDetails[0]->id_proof == 'pan_card')
              <span>PAN card</span>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Total Amount :</strong></span>
          </div>
          <div class="col-md-8">
            <span>₹{{$bookingDetails[0]->total_amount}}</span>
          </div>
        </div>
        @foreach($bookingDetails as $booking)
            <div class="row">
              <div class="col-md-4">
                <span><strong>Room No :</strong></span>
              </div>
              <div class="col-md-8">
                <span>{{ $booking->room->roomname }} (Extra Bed : {{ $booking->extra_bed }})</span>
              </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endsection
@section('footer')
@endsection