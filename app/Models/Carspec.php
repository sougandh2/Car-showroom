<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carspec extends Model
{
    protected $fillable = ['hp','mileage','air_bags','type','fuel','img'];
    use HasFactory;
}
