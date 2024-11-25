@extends('layouts.admin-app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Booking Details</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="card-title">View Record</h3>
        </div>
        <div class="card-body">
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>Check in Date :</strong></span>
              </div>
              <div class="col-md-10">
                <span>{{ date("d M Y", strtotime($bookingDetails[0]->check_in_date)) }} {{ date("g:i a", strtotime($bookingDetails[0]->check_in_time)) }}</span>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>Check out Date :</strong></span>
              </div>
              <div class="col-md-10">
                <span>{{ date("d M Y", strtotime($bookingDetails[0]->check_out_date)) }} {{ date("g:i a", strtotime($bookingDetails[0]->check_out_time)) }}</span>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>Total Days :</strong></span>
              </div>
              <div class="col-md-10">
                <span>{{$bookingDetails[0]->days}}</span>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>Room Type :</strong></span>
              </div>
              <div class="col-md-10">
                <span>{{$bookingDetails[0]->room_type->name}}</span>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>Customer Name :</strong></span>
              </div>
              <div class="col-md-10">
                <span>{{$bookingDetails[0]->customer_name}}</span>
              </div>
            </div>
            @if($bookingDetails[0]->company_name)
              <div class="row mb-2">
                <div class="col-md-2">
                  <span><strong>Company Name :</strong></span>
                </div>
                <div class="col-md-10">
                  <span>{{$bookingDetails[0]->company_name}}</span>
                </div>
              </div>
            @endif
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>Address :</strong></span>
              </div>
              <div class="col-md-10">
                <span>{{$bookingDetails[0]->address}}</span>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>City :</strong></span>
              </div>
              <div class="col-md-10">
                <span>{{$bookingDetails[0]->city}}</span>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>State :</strong></span>
              </div>
              <div class="col-md-10">
                <span>{{$bookingDetails[0]->state}}</span>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>Pincode :</strong></span>
              </div>
              <div class="col-md-10">
                <span>{{$bookingDetails[0]->pin_code}}</span>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>Gender :</strong></span>
              </div>
              <div class="col-md-10">
                <span>{{$bookingDetails[0]->gender}}</span>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>Email :</strong></span>
              </div>
              <div class="col-md-10">
                <span>{{$bookingDetails[0]->email}}</span>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>Mobile :</strong></span>
              </div>
              <div class="col-md-10">
                <span>{{$bookingDetails[0]->phone}}</span>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>ID Proof :</strong></span>
              </div>
              <div class="col-md-10">
                @if($bookingDetails[0]->id_proof == 'aadhaar')
                  <span>Aadhar</span>
                @elseif($bookingDetails[0]->id_proof == 'driving_license')
                  <span>Driving license</span>
                @elseif($bookingDetails[0]->id_proof == 'pan_card')
                  <span>PAN card</span>
                @endif
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>View ID Proof :</strong></span>
              </div>
              <div class="col-md-10">
                <a href="{{asset('assets/'.$bookingDetails[0]->id_proof_document)}}" target="_blank">View</a>
              </div>
            </div>
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>Total Amount :</strong></span>
              </div>
              <div class="col-md-10">
                <span>₹{{$bookingDetails[0]->total_amount}}</span>
              </div>
            </div>
            @foreach($bookingDetails as $booking)
                <div class="row mb-2">
                  <div class="col-md-2">
                    <span><strong>Room No :</strong></span>
                  </div>
                  <div class="col-md-10">
                    <span>{{ $booking->room->roomname }} (Extra Bed : {{ $booking->extra_bed }})</span>
                  </div>
                </div>
            @endforeach
            <div class="row mb-2">
              <div class="col-md-2">
                <span><strong>Receipt :</strong></span>
              </div>
              <div class="col-md-10">
                <a href="#">Download</a>
              </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection