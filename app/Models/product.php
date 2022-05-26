<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
   public function carts(){

    return $this->belongsTo(Cart::class);
   }

   public function category(){

    return $this->belongsTo(category::class);
   }
}
