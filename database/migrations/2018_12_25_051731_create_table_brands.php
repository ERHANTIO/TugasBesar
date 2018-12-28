<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBrands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {         
            $table->increments('id');         
            $table->string("name");       
            $table->string("slug")->unique();           
            $table->integer("created_by");         
            $table->integer("updated_by")->nullable();         
            $table->integer("deleted_by")->nullable();         
            $table->softDeletes();         
            $table->timestamps();     
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
