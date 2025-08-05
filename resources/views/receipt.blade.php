<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Receipt</title>
    <style>
        body { font-family: sans-serif; }
        .header { text-align: center; font-size: 12px; color:#0067B1 }
        .header img { margin-left: 10px; }
        .details { margin-top: 20px; border-top: 1px solid #0067B1;}
        .details .main {
            clear: both;
        }
        .details .one-half {
            width: 50%;
            float: left;
            margin-bottom: 20px;
        }
        .details .row { font-size: 12px; margin-bottom: 8px; }
        .details table {
            font-size: 12px;
            border:0.5px solid #0067B1;
            border-spacing: 0;
            clear: both;
        }
        .details th {
            background: #004085;
            color: #fff;
        }
        .details th, .details td { 
            padding: 5px; 
            text-align: left; 
            border:0.5px solid #0067B1;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{public_path('images/logo.jpg')}}" width="80" style="margin: 0;">
        <h4 style="color:#B62EE7;font-size: 16px;">Shri Labdhi Vikram Raj Yashsurjiswari Jain Tirth.</h4>
        <img src="{{public_path('images/map.png')}}" width="8"> NH 8, Baleshwar, Gujarat <img src="{{public_path('images/phone.png')}}" width="10"> 09054972120 <img src="{{public_path('images/email.png')}}" width="10"> info@labdhidhamtirth.in
    </div>
    <div class="details">
        <div class="main">
            <div class="one-half">
                <h5 style="color: #0067B1;">Customer Details</h5>
                <div class="row"><strong>Name:</strong> {{ $room_booking[0]->customer_name }}</div>
                <div class="row"><strong>Company:</strong> {{ $room_booking[0]->company_name }}</div>
                <div class="row"><strong>Mobile:</strong> {{ $room_booking[0]->phone }}</div>
            </div>
        </div>
        <div class="main">
            <div class="one-half">
                <h5 style="color: #0067B1;">Booking Details</h5>
                <div class="row"><strong>Booking ID:</strong> {{ $room_booking[0]->booking_id }}</div>
                <div class="row"><strong>Check in:</strong> {{ date("d M Y", strtotime($room_booking[0]->check_in_date)) }} {{ date("g:i a", strtotime($room_booking[0]->check_in_time)) }}</div>
                <div class="row"><strong>Check out:</strong> {{ date("d M Y", strtotime($room_booking[0]->check_out_date)) }} {{ date("g:i a", strtotime($room_booking[0]->check_out_time)) }}</div>
                <div class="row"><strong>Room Type:</strong> {{$room_booking[0]->room_type->name}}</div>
            </div>
            <div class="one-half">
                <h5 style="color: #0067B1;">Transaction Details</h5>
                <div class="row"><strong>Transaction ID:</strong> {{ $room_booking[0]->txn_id }}</div>
                <div class="row"><strong>Payment ID:</strong> {{ $room_booking[0]->payment_id }}</div>
                <div class="row"><strong>Payment Date:</strong> {{ date("d M Y g:i a", strtotime($room_booking[0]->payment_date)) }}</div>
            </div>
        </div>
        <table style="width:100%">
            <tr>
                <th>Room No</th>
                <th>Rate</th>
                <th>Ex Bed Rate</th>
                <th>Ex Bed</th>
                <th>Amt ({{$room_booking[0]->days}} days)</th>
                <th>Ex Bed Amt ({{$room_booking[0]->days}} days)</th>
                <th>Amount</th>
            </tr>
            @foreach($room_booking as $booking)
            <tr>
                <td>{{ $booking->room->roomname }}</td>
                <td>{{ $booking->room->amount }}</td>
                <td>{{ $booking->room->extrabedamt }}</td>
                <td>{{ $booking->extra_bed }}</td>
                <td>{{ $booking->days*$booking->room->amount }}</td>
                <td>{{ $booking->days*$booking->room->extrabedamt*$booking->extra_bed }}</td>
                <td>{{ $booking->amount }}</td>
            </tr>
            @endforeach
        </table>
        <div class="main" style="margin-top: 20px;">
            <div class="row" style="text-align: right;"><strong>Total Amount:</strong> <span style="font-family: 'DejaVu Sans', sans-serif;">₹</span>{{ $room_booking[0]->total_amount }}</div>
        </div>
    </div>
</body>
</html>