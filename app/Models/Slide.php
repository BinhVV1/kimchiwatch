<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
   protected $table='slide';
   protected $fillable=['id','images', 'images_sp','created_at'];
}
