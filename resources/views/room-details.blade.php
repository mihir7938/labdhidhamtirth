<h3 class="mt-4">Room Details</h3>
<div class="room-details">
    <div class="w-500">
        <div class="row heading">
          <div class="col">Room No</div>
          <div class="col">Bed</div>
          <div class="col">Extra Bed</div>
          <div class="col">Rate</div>
          <div class="col">Ex Bed Rate</div>
          <div class="col">Amount</div>
        </div>
        <?php $sum_amount = 0 ?>
        @foreach($booking_rooms as $booking)
          <div class="row">
            <div class="col">{{ $booking->room->roomname }}</div>
            <div class="col">{{ $booking->room->noofbed }}</div>
            <div class="col">
                @if(isset($extrabed))
                    @foreach($extrabed as $k=>$v)
                        @if($booking->id == $k)
                            <select name="extrabed[{{$booking->id}}]" id="extrabed{{$booking->id}}" class="form-control extrabed">
                            @for ($i = 0; $i <= $booking->room->extrabed; $i++)
                                <option value="{{ $i }}" @if($i == $v) selected @endif>{{ $i }}</option>
                            @endfor
                            </select>
                        @endif
                    @endforeach
                @else
                    <select name="extrabed[{{$booking->id}}]" id="extrabed{{$booking->id}}" class="form-control extrabed">
                        @for ($i = 0; $i <= $booking->room->extrabed; $i++)
                            <option value="{{ $i }}" @if($i == $booking->extra_bed) selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                @endif
            </div>
            <div class="col">{{ $booking->room->amount }}</div>
            <div class="col">{{ $booking->room->extrabedamt }}</div>
            @if(isset($amount))
                @foreach($amount as $k=>$v)
                    @if($booking->id == $k)
                        <div class="col">{{ $v }}</div>
                    @endif
                @endforeach
            @else
                <div class="col">@if($booking->amount) {{ $booking->amount }} @else {{ $booking->room->amount }} @endif</div> 
            @endif
          </div>
          <?php $sum_amount += $booking->room->amount ?>
        @endforeach
        @php
            $tot_amount = $booking->total_amount ? $booking->total_amount : $sum_amount;
        @endphp
        <div class="row align-items-center mb-0 pt-2">
          <div class="col"></div>
          <div class="col"><input type="hidden" name="total_amount" value="@if(isset($total_amount)){{$total_amount}}@else{{$tot_amount}}@endif"></div>
          <div class="col">Total Amount : <strong class="total">@if(isset($total_amount)) ₹{{$total_amount}} @else ₹{{$tot_amount}} @endif</strong></div>
        </div>
    </div>
</div>