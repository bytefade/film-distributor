<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['status_id', 'distributor_id', 'roe', 'national_title', 'original_title', 'url_trailer', 'synopsis', 'release_date', 'age_group'];
}
