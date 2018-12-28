<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Stuff extends Model
{
    use SoftDeletes; 
    public function categories(){   return $this->belongsTo("App\Category"); }
    public function brands(){   return $this->belongsTo("App\Brand"); }
    public function orders(){   return $this->belongsToMany('App\Order'); } 
}
