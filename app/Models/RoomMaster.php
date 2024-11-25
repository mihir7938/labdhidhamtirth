<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomType;

class RoomMaster extends Model
{
    use HasFactory;
    protected $table = 'room_master';

    public function room_type() {
        return $this->belongsTo(RoomType::class, 'roomtypeid', 'id');
    }
}
