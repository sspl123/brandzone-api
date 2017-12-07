<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            
			$table->increments('id');
			$table->string('productname')->nullable();
		    $table->string('manufacturer')->nullable();
			$table->string('productnameInArebic')->nullable();
		    $table->string('manufacturerInArebic')->nullable();
			$table->float('price')->nullable();
		    $table->string('unit')->nullable();
			$table->integer('CategoryId')->nullable();
		    $table->string('CategoryType')->nullable();
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
