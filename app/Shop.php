<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{	

   public $timestamps = true;
   //protected $fillable = ['title'];
   protected $guarded = ['id'];
}
