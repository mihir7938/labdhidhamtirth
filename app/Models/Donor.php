<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DonorCategory;

class Donor extends Model
{
    use HasFactory;

    protected $table = 'donors';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'title',
        'content',
        'image',
    ];
    public function donor_category() {
        return $this->belongsTo(DonorCategory::class, 'category_id', 'id');
    }
}
