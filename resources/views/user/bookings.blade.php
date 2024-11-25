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
       <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>My Bookings <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">My Bookings</h1>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section gallery-section">
  <div class="container">
    @if(isset($myBooking) && count($myBooking) > 0)
      <div class="booking_data">
        <div class="w-1100">
          <div class="row heading mb-4">
            <div class="col">Booking ID</div>
            <div class="col">Name</div>
            <div class="col">Room Type</div>
            <div class="col w-200">Check In Date</div>
            <div class="col w-200">Check Out Date</div>
            <div class="col">Amount</div>
            <div class="col">Action</div>
          </div>
          @foreach($myBooking as $booking)
            <div class="row mb-3">
              <div class="col">{{ $booking->booking_id }}</div>
              <div class="col">{{ $booking->customer_name }}</div>
              <div class="col">{{ $booking->room_type->name }}</div>
              <div class="col w-200">{{ date("d M Y", strtotime($booking->check_in_date)) }} {{ date("g:i a", strtotime($booking->check_in_time)) }}</div>
              <div class="col w-200">{{ date("d M Y", strtotime($booking->check_out_date)) }} {{ date("g:i a", strtotime($booking->check_out_time)) }}</div>
              <div class="col">₹{{ $booking->total_amount }}</div>
              <div class="col"><a href="{{route('user.booking.view', ['id' => $booking->booking_id])}}" data-toggle="tooltip" title="View Booking" class="mr-3"><span class="icon fa fa-eye"></span></a><a href="#" data-toggle="tooltip" title="Download Receipt"><span class="icon fa fa-download"></span></a></div>
            </div>
          @endforeach
        </div>
        @php
          $query_inputs = request()->query();
        @endphp
      </div>
      <div class="pagination-wrap">
          {{$myBooking->appends($query_inputs)->links('pagination::bootstrap-4')}}
      </div>
    @else
      <strong>No Data Found</strong>
    @endif
  </div>
</section>
@endsection
@section('footer')
<script type="text/javascript">
    $(document).ready(function() {
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    });
</script>
@endsection