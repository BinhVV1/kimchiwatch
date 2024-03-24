<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table='product';
   protected $fillable=['id','name','code','price', 'price_old', 'noibat','sex','trademark','material',
   'information','subtitle','description','images_main','images','link','created_at'];
}
