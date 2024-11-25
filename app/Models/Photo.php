<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Album;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'album_id',
        'title',
        'image',
    ];
    public function album() {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }
}
