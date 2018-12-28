<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStuffOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()     {         
        Schema::create('stuff_order', function (Blueprint $table) {             
            $table->increments('id');             
            $table->integer('order_id')->unsigned();             
            $table->integer('stuff_id')->unsigned();             
            $table->integer('quantity')->unsigned()->defaults(1);             
            $table->timestamps(); 
 
            $table->foreign('order_id')->references('id')->on('orders');             
            $table->foreign('stuff_id')->references('id')->on('stuffs');         
        });     
    } 
 
     public function down()     {         
        Schema::table('stuff_order', function(Blueprint $table){             
        $table->dropForeign(['order_id']);             
        $table->dropForeign(['stuff_id']);         
        }); 
        Schema::dropIfExists('stuff_order');     
    }
}
