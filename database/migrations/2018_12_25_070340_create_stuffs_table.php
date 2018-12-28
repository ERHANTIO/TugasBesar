<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStuffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuffs', function (Blueprint $table) {             
            $table->increments('id');
            $table->integer('brand_id')->unsigned();
            $table->integer('category_id')->unsigned();              
            $table->string('title'); 
            $table->string('cover');                         
            $table->string('slug');             
            $table->text('description');                         
            $table->float('price');
            $table->enum('status', ['PUBLISH', 'DRAFT']);                           
            $table->integer('stock')->default(0)->unsigned();             
            $table->integer('created_by');             
            $table->integer('updated_by')->nullable();             
            $table->integer('deleted_by')->nullable(); 
            $table->timestamps();             
            $table->softDeletes();
            $table->foreign('brand_id')->references('id')->on('brands');             
            $table->foreign('category_id')->references('id')->on('categories');          
        });   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stuffs', function(Blueprint $table){             
            $table->dropForeign(['brands_id']);             
            $table->dropForeign(['categories_id']);         
        }); 
        Schema::dropIfExists('stuffs');
    }
}
