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
       <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Transaction Summary <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">Transaction Summary</h1>
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
      @if($result->responseCode == '000' || $result->responseCode == '0000')
        <div class="pay_now">
          <a href="{{route('generate_pdf', ['id' => $result->addlParam1])}}" class="btn btn-primary">Download Receipt</a>
        </div>
      @endif
      <h3>Transaction Summary</h3>
      <div class="border-1 p-15">
        <div class="row">
          <div class="col-md-4">
            <span><strong>Transaction Description :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->respDescription }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Transaction ID:</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->txnID }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Payment ID :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->paymentID }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Amount :</strong></span>
          </div>
          <div class="col-md-8">
            <span>₹{{ $result->amount }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Payment Mode :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->paymentMode }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Payment Date :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ date("d M Y g:i a", strtotime($result->paymentDateTime)) }}</span>
          </div>
        </div>
      </div>
      <h3 class="mt-4">Booking Summary</h3>
      <div class="border-1 p-15">
        <div class="row">
          <div class="col-md-4">
            <span><strong>Booking ID :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->addlParam1 }}</span>
          </div>
        </div>
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
            <span><strong>Mobile No:</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{$room_booking[0]->phone}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Email ID:</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{$room_booking[0]->email}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Address :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{$room_booking[0]->address}}, {{$room_booking[0]->city}}, {{$room_booking[0]->state}}-{{$room_booking[0]->pin_code}}</span>
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
        @foreach($room_booking as $booking)
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