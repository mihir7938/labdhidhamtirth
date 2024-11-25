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
       <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Booking <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">Booking</h1>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section">
  <div class="container">
    <div class="profile-section edit-booking-section">
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
      <form id="edit-booking-form" name="edit-booking-form" class="edit-profile" action="{{route('booking.save')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Booking Details</h3>
        <div class="booking-details">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="customer_name" name="customer_name" placeholder="Name*" class="form-control" value="{{ $booking_rooms[0]->customer_name }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="company_name" name="company_name" placeholder="Company Name" class="form-control" value="{{ $booking_rooms[0]->company_name }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" id="address" name="address" placeholder="Address*" class="form-control" value="{{ $booking_rooms[0]->address }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="city" name="city" placeholder="City*" class="form-control" value="{{ $booking_rooms[0]->city }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <select id="state" name="state" placeholder="State*" class="form-control">
                  <option value="Andhra Pradesh" @if($booking_rooms[0]->state == "Andhra Pradesh") selected @endif>Andhra Pradesh</option>
                  <option value="Arunachal Pradesh" @if($booking_rooms[0]->state == "Arunachal Pradesh") selected @endif>Arunachal Pradesh</option>
                  <option value="Assam" @if($booking_rooms[0]->state == "Assam") selected @endif>Assam</option>
                  <option value="Bihar" @if($booking_rooms[0]->state == "Bihar") selected @endif>Bihar</option>
                  <option value="Chhattisgarh" @if($booking_rooms[0]->state == "Chhattisgarh") selected @endif>Chhattisgarh</option>
                  <option value="Gujarat" @if($booking_rooms[0]->state == "Gujarat") selected @endif>Gujarat</option>
                  <option value="Haryana" @if($booking_rooms[0]->state == "Haryana") selected @endif>Haryana</option>
                  <option value="Himachal Pradesh" @if($booking_rooms[0]->state == "Himachal Pradesh") selected @endif>Himachal Pradesh</option>
                  <option value="Jammu and Kashmir" @if($booking_rooms[0]->state == "Jammu and Kashmir") selected @endif>Jammu and Kashmir</option>
                  <option value="Goa" @if($booking_rooms[0]->state == "Goa") selected @endif>Goa</option>
                  <option value="Jharkhand" @if($booking_rooms[0]->state == "Jharkhand") selected @endif>Jharkhand</option>
                  <option value="Karnataka" @if($booking_rooms[0]->state == "Karnataka") selected @endif>Karnataka</option>
                  <option value="Kerala" @if($booking_rooms[0]->state == "Kerala") selected @endif>Kerala</option>
                  <option value="Madhya Pradesh" @if($booking_rooms[0]->state == "Madhya Pradesh") selected @endif>Madhya Pradesh</option>
                  <option value="Maharashtra" @if($booking_rooms[0]->state == "Maharashtra") selected @endif>Maharashtra</option>
                  <option value="Manipur" @if($booking_rooms[0]->state == "Manipur") selected @endif>Manipur</option>
                  <option value="Meghalaya" @if($booking_rooms[0]->state == "Meghalaya") selected @endif>Meghalaya</option>
                  <option value="Mizoram" @if($booking_rooms[0]->state == "Mizoram") selected @endif>Mizoram</option>
                  <option value="Nagaland" @if($booking_rooms[0]->state == "Nagaland") selected @endif>Nagaland</option>
                  <option value="Odisha" @if($booking_rooms[0]->state == "Odisha") selected @endif>Odisha</option>
                  <option value="Punjab" @if($booking_rooms[0]->state == "Punjab") selected @endif>Punjab</option>
                  <option value="Rajasthan" @if($booking_rooms[0]->state == "Rajasthan") selected @endif>Rajasthan</option>
                  <option value="Sikkim" @if($booking_rooms[0]->state == "Sikkim") selected @endif>Sikkim</option>
                  <option value="Tamil Nadu" @if($booking_rooms[0]->state == "Tamil Nadu") selected @endif>Tamil Nadu</option>
                  <option value="Telangana" @if($booking_rooms[0]->state == "Telangana") selected @endif>Telangana</option>
                  <option value="Tripura" @if($booking_rooms[0]->state == "Tripura") selected @endif>Tripura</option>
                  <option value="Uttarakhand" @if($booking_rooms[0]->state == "Uttarakhand") selected @endif>Uttarakhand</option>
                  <option value="Uttar Pradesh" @if($booking_rooms[0]->state == "Uttar Pradesh") selected @endif>Uttar Pradesh</option>
                  <option value="West Bengal" @if($booking_rooms[0]->state == "West Bengal") selected @endif>West Bengal</option>
                  <option value="Andaman and Nicobar Islands" @if($booking_rooms[0]->state == "Andaman and Nicobar Islands") selected @endif>Andaman and Nicobar Islands</option>
                  <option value="Chandigarh" @if($booking_rooms[0]->state == "Chandigarh") selected @endif>Chandigarh</option>
                  <option value="Dadra and Nagar Haveli" @if($booking_rooms[0]->state == "Dadra and Nagar Haveli") selected @endif>Dadra and Nagar Haveli</option>
                  <option value="Daman and Diu" @if($booking_rooms[0]->state == "Daman and Diu") selected @endif>Daman and Diu</option>
                  <option value="Delhi" @if($booking_rooms[0]->state == "Delhi") selected @endif>Delhi</option>
                  <option value="Lakshadweep" @if($booking_rooms[0]->state == "Lakshadweep") selected @endif>Lakshadweep</option>
                  <option value="Puducherry" @if($booking_rooms[0]->state == "Puducherry") selected @endif>Puducherry</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="pin_code" name="pin_code" placeholder="Pin Code*" class="form-control" value="{{ $booking_rooms[0]->pin_code }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <select name="gender" id="gender" class="form-control" placeholder="Gender*">
                  <option value="Male" @if($booking_rooms[0]->gender == "Male") selected @endif>Male</option>
                  <option value="Female" @if($booking_rooms[0]->gender == "Female") selected @endif>Female</option>
                  <option value="Other" @if($booking_rooms[0]->gender == "Other") selected @endif>Other</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Email*" class="form-control" value="{{ $booking_rooms[0]->email }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" id="phone" name="phone" placeholder="Mobile Number*" class="form-control" value="{{ $booking_rooms[0]->phone }}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <select name="id_proof" id="id_proof" class="form-control" placeholder="ID Proof*">
                  <option value="aadhaar" @if($booking_rooms[0]->id_proof == "aadhaar") selected @endif>Aadhaar</option>
                  <option value="driving_license" @if($booking_rooms[0]->id_proof == "driving_license") selected @endif>Driving license</option>
                  <option value="pan_card" @if($booking_rooms[0]->id_proof == "pan_card") selected @endif>PAN card</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <div class="input-group">
                  <div class="custom-file">             
                    <input type="file" class="custom-file-input" id="id_proof_doc" name="id_proof_doc">
                    <label class="custom-file-label form-control" for="id_proof_doc">Upload ID Proof*</label>
                  </div>              
                </div>
              </div>
              @if($booking_rooms[0]->id_proof_document)
                  <a href="{{asset('assets/'.$booking_rooms[0]->id_proof_document)}}" class="btn btn-primary" target="_blank">View ID Proof</a>
              @endif
            </div>
          </div>
        </div>
        <div id="results">
          @include('room-details', ['booking_rooms' => $booking_rooms])
        </div>
        <div class="form-group mt-4 d-flex justify-content-end">
          <input type="hidden" name="booking_id" id="booking_id" value="{{$booking_id}}">
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
@section('footer')
<script>
  (function() {
    $('#edit-booking-form').validate({
      rules: {
        customer_name: {
          required: true
        },
        address: {
          required: true
        },
        city: {
          required: true
        },
        state: {
          required: true
        },
        pin_code: {
          required: true,
          digits: true,
          minlength: 6,
          maxlength: 6
        },
        gender: {
          required: true
        },
        email: {
          required: true,
          alphanumeric: true,
          maxlength: 155,
        },
        phone: {
          required: true,
          digits: true,
          minlength: 10
        },
        id_proof: {
          required: true
        },
        @if(!$booking_rooms[0]->id_proof_document)
          id_proof_doc: {
            required: true,
            maxsize: 2000000
          }
        @endif
      },
      messages:{
        customer_name:{
          required: "Please enter name."
        },
        address:{
          required: "Please enter address."
        },
        city:{
          required: "Please enter city."
        },
        state:{
          required: "Please select state."
        },
        pin_code:{
          required: "Please enter pin code."
        },
        gender:{
          required: "Please select gender."
        },
        email:{
          required: "Please enter email.",
          email: "Please provide a valid email."
        },
        phone:{
          required: "Plese enter mobile number.",
        },
        id_proof:{
          required: "Please select id proof."
        },
        @if(!$booking_rooms[0]->id_proof_document)
          id_proof_doc: {
            required: "Please upload id proof.",
            maxsize: "File size must be less than 2MB."
          }
        @endif
      },
      errorPlacement: function(error, element) {
        if (element.attr("name") == "id_proof_doc" ) {
            $(".input-group").after(error);
        } else {
            error.insertAfter(element);
        }
      }
    });
    $('.custom-file-input').on('change', function(e) {
        let fileName = $(this).val().split('\\').pop();
        $(this).siblings('.custom-file-label').addClass('selected').html(fileName);
    });
    const $placeholder = $("select[placeholder]");
    if ($placeholder.length) {
      $placeholder.each(function() {
        const $this = $(this);
        $this.addClass("placeholder-shown");
        console.log($this.attr('id'));
        const placeholder = $this.attr("placeholder");
        if($this.attr('id') == 'state') {
          @if ($booking_rooms[0]->state == '')
            $this.prepend(`<option value="" selected>${placeholder}</option>`);
          @else
            $this.removeClass("placeholder-shown").addClass("placeholder-hidden");
          @endif
        }
        if($this.attr('id') == 'gender') {
          @if ($booking_rooms[0]->gender == '')
            $this.prepend(`<option value="" selected>${placeholder}</option>`);
          @else
            $this.removeClass("placeholder-shown").addClass("placeholder-hidden");
          @endif
        }
        if($this.attr('id') == 'id_proof') {
          @if ($booking_rooms[0]->id_proof == '')
            $this.prepend(`<option value="" selected>${placeholder}</option>`);
          @else
            $this.removeClass("placeholder-shown").addClass("placeholder-hidden");
          @endif
        }
        $this.on("change", (event) => {
          const $this = $(event.currentTarget);
          if ($this.val()) {
            $this.removeClass("placeholder-shown").addClass("placeholder-hidden");
          } else {
            $this.addClass("placeholder-shown").removeClass("placeholder-hidden");
          }
        });
      });
    }
    $(document).on("change", ".extrabed", function() {
      $('#ftco-loader').addClass('show');
      const extrabed = {
              @foreach($booking_rooms as $booking)
                {{$booking->id}}:$("#extrabed{{$booking->id}}").val(),
              @endforeach
            };
      $.ajax({
        url: "{{ route('booking.room.update') }}",
        method: "POST",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          'booking_id' : $("#booking_id").val(),
          'extrabed' : extrabed,
        },
        success: function (data) {
          $('#ftco-loader').removeClass('show');
          $("#results").html('');
          $('#results').append(data);
        },
      });
    });
  })();
</script>
@endsection