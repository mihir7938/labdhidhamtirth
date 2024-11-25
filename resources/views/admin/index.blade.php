@extends('layouts.admin-app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Upcoming Booking</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header">
            <h3 class="card-title">All Records</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Room Type</th>
                            <th>Check In Date</th>
                            <th>Check Out Date</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Room Type</th>
                            <th>Check In Date</th>
                            <th>Check Out Date</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($upcomingBooking as $booking)
                            <tr>
                                <td>{{$booking->customer_name}}</td>
                                <td>{{$booking->phone}}</td>
                                <td>{{$booking->room_type->name}}</td>
                                <td>{{date("d M Y", strtotime($booking->check_in_date)) }} {{ date("g:i a", strtotime($booking->check_in_time))}}</td>
                                <td>{{date("d M Y", strtotime($booking->check_out_date)) }} {{ date("g:i a", strtotime($booking->check_out_time))}}</td>
                                <td>₹{{$booking->total_amount}}</td>
                                <td style="min-width: 100px;">
                                    <a href="{{route('admin.booking.view', ['id' => $booking->booking_id])}}" class="btn btn-info btn-circle">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-success btn-circle">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('footer')
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable1').DataTable({
            "ordering": false
        });
    });
</script>
@endsection