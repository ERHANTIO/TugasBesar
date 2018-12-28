<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class Brand extends Model
{
      use SoftDeletes; 
      public function stuffs(){   return $this->hasMany("App\Stuff",'brand_id'); }
}
