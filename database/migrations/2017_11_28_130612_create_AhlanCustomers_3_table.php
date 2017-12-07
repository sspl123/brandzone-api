<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAhlanCustomers3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('ahlancustomers', function (Blueprint $table) {
            $table->increments('royaltyId');
            $table->string('name')->nullable();
            $table->string('mobileNumber');
	   
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
        Schema::dropIfExists('ahlancustomers');
    }
}
