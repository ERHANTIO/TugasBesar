<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class Category extends Model
{

    use SoftDeletes; 
    
    public function stuffs(){   return $this->hasMany("App\Stuff",'category_id'); }
}

