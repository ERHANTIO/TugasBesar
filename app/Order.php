<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){   return $this->belongsTo('App\User'); }
    public function stuffs(){   return $this->belongsToMany('App\Stuff')->withPivot('quantity');; } 
    public function getTotalQuantityAttribute(){     
    	$total_quantity = 0;          
    	foreach($this->stuffs as $stuff){         $total_quantity += $stuff->pivot->quantity;     } 
 
    return $total_quantity; }
}
