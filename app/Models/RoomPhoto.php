<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomPhotoCategory;

class RoomPhoto extends Model
{
    use HasFactory;

    protected $table = 'room_photos';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'image',
    ];
    public function room_photo_category() {
        return $this->belongsTo(RoomPhotoCategory::class, 'category_id', 'id');
    }
}
