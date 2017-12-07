<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::drop('products');
	}

      /*Schema::table('products', function (Blueprint $table) {
           $table->increments('id');
            $table->string('productname');
            $table->string('manufacturer');
            $table->string('price');
			$table->string('unit');
            $table->bytea('image');
            $table->integer('categoryId');
			$table->string('productnameinarebic');
            $table->string('manufacturerinarebic');
			
          
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
		
        Schema::dropIfExists('products');
    }
}