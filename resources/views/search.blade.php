<div class="booking_tag">{{ $booking_tag['days'] }} {{ $booking_tag['days'] == '1' ? 'day' : 'days' }} ({{ $booking_tag['checkin_date'] }} {{ $booking_tag['checkin_time'] }} to {{ $booking_tag['checkout_date'] }} {{ $booking_tag['checkout_time'] }})</div>
<div class="d-flex justify-content-end">
    <a class="btn btn-primary py-2 px-4 mb-4" href="{{route('amenities')}}" target="_blank">Room Amenities</a>
</div>
@if(isset($rooms) && count($rooms) > 0)
<form id="booking-form" name="booking-form" action="{{route('booking-rooms')}}" method="POST">
    @csrf
    <div class="room-msg-area"></div>
    <div class="d-flex">
        @foreach($rooms as $room)
            @if(in_array($room->id, $booked_room_ids))
                <div class="box disabled">
                    <input type="checkbox" name="room[{{$room->id}}]" value="{{ $room->id }}" id="room_{{ $room->id }}" class="room_checkbox" disabled>
                    <label for="room_{{ $room->id }}">
                        <h4>{{ $room->roomname }}</h4>
                        <p>₹{{ $room->amount }}</p>
                        <p>{{ $room->noofbed }} beds</p>
                    </label>
                </div>
            @else
                <div class="box">
                    <input type="checkbox" name="room[{{$room->id}}]" value="{{ $room->id }}" id="room_{{ $room->id }}" class="room_checkbox">
                    <label for="room_{{ $room->id }}">
                        <h4>{{ $room->roomname }}</h4>
                        <p>₹{{ $room->amount }}</p>
                        <p>{{ $room->noofbed }} beds</p>
                    </label>
                </div>
            @endif
        @endforeach
    </div>
    <div class="text-center mt-4">
        @if(Auth::check())
            <input type="submit" id="booking_now" value="Book Now" class="btn btn-primary py-3 px-5">
        @else
            <a class="btn btn-primary py-3 px-5" href="{{route('login')}}">Book Now</a>
        @endif
    </div>
</form>
@else
    <p>No records found</p>
@endif