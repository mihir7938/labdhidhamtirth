<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonorCategory extends Model
{
    use HasFactory;

    protected $table = 'donor_categories';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'image',
    ];
}
