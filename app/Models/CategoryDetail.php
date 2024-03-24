<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDetail extends Model
{
   protected $table='category_detail';
   protected $fillable=['id','id_category','name_category','name_code','created_at'];
}
