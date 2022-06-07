<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'distributor_id', 'roe', 'national_title', 'original_title', 'url_trailer', 'synopsis', 'launch_date', 'classification', 'duration'];
}
