<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;

    public $primaryKey = 'cnpj';

    protected $fillable = ['cnpj', 'social_name', 'name'];
}
