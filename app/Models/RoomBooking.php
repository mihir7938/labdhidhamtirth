<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomMaster;

class RoomBooking extends Model
{
    use HasFactory;
    protected $table = 'room_bookings';

    protected $fillable = [
        'extra_bed',
        'amount',
        'total_amount',
        'customer_name',
        'company_name',
        'address',
        'city',
        'state',
        'pin_code',
        'gender',
        'email',
        'phone',
        'id_proof',
        'id_proof_document',
        'status',
        'merchant_txn_no',
        'resp_description',
        'txn_id',
        'payment_id',
        'payment_date',
        'payment_mode',
        'payment_sub_inst_type',
    ];

    public function room() {
        return $this->belongsTo(RoomMaster::class, 'room_id', 'id');
    }

    public function room_type() {
        return $this->belongsTo(RoomType::class, 'room_type_id', 'id');
    }
}
