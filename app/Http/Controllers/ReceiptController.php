<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomBooking;
use App\Services\RoomService;
use PDF;

class ReceiptController extends Controller
{
    private $roomService;
    public function __construct(
        RoomService $roomService
    )
    {
        $this->roomService = $roomService;
    }
    public function generatePDF($id)
    {
        $room_booking = $this->roomService->getDetailsByBookingId($id);
        $data = [
            'room_booking' => $room_booking,
            'receipt_no' => 'RCPT123456',
            'date' => now()->format('d-m-Y'),
            'customer_name' => $room_booking[0]->customer_name,
            'amount' => 300.00,
            'status' => 'Paid',
        ];

        $pdf = PDF::loadView('receipt', $data);

        return $pdf->download('receipt.pdf');
    }
}
