<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreate1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahlanstatements', function (Blueprint $table) {
            $table->increments('id');
	    $table->string('royaltyid')->nullable();
              $table->integer('storeid');
            $table->foreign('storeid')->references('id')->on('stores');
	    $table->string('invoiceno')->nullable();       
		    $table->string('dateofinvoice')->nullable();
           
			$table->string('totalamount')->nullable();
			$table->string('points')->nullable();
		        $table->string('redeemedcomment')->nullable();
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
        Schema::dropIfExists('ahlanstatements');
    }
}
