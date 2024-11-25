<?php

namespace App\Services;

use App\Models\RoomType;
use App\Models\RoomMaster;
use App\Models\RoomBooking;

class RoomService
{

    public function getAllRoomTypes()
    {
        return RoomType::orderBy('created_at', 'asc')->get(); 
    }

    public function searchRooms($filters = '')
    {
        $query = RoomMaster::select('*');
        if ($filters['room_type']) {
            $query = $query->where('roomtypeid', '=', $filters['room_type']);
        }
        $query = $query->where('isactive', '=', 'Y');
        $rooms = $query->get();
        return $rooms;
    }

    public function getDetailsByBookingId($booking_id){
        return RoomBooking::where('booking_id', $booking_id)->get();
    }

    public function bookedRooms($room_type_id, $check_in_date, $check_out_date){
        $query = RoomMaster::select('room_master.*');
        $query = $query->leftJoin('room_bookings', 'room_master.id', '=', 'room_bookings.room_id');
        $query = $query->where('room_master.roomtypeid', $room_type_id);
        $query = $query->where('room_master.isactive', 'Y');
        $query = $query->where('room_bookings.check_in_date', '<', $check_out_date);
        $query = $query->where('room_bookings.check_out_date', '>', $check_in_date);
        $query = $query->where('room_bookings.status', '!=', 0);
        return $query->groupBy('room_master.id')->get();
    }

    public function update($room_booking, $data)
    {
        return $room_booking->update($data);
    }

    public function getUpcomingBooking(){
        return RoomBooking::where('status', 3)->whereRaw('check_out_date >= CURDATE()')->orderBy('check_in_date', 'asc')->groupBy('booking_id')->get();
    }

    public function getMyBooking($user_id){
        return RoomBooking::where('status', 3)->where('user_id', $user_id)->orderBy('booking_id', 'desc')->groupBy('booking_id')->paginate(10);
    }
    
}