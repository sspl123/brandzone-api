<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAhlanStatments3Table extends Migration
{
    
   public function up()
    {
        Schema::create('ahlanstatements', function (Blueprint $table) {
            $table->increments('id');
	    $table->integer('royaltyId');
            $table->foreign('royaltyId')->references('royaltyId')->on('ahlancustomers');
		    
	    $table->string('invoiceNumber')->nullable();       
		    $table->string('dataOfInvoice')->nullable();
           
			$table->string('totalAmount')->nullable();
			$table->string('points')->nullable();
		        $table->string('redeemedComment')->nullable();
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
