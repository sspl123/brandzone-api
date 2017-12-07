<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahlancustomers', function (Blueprint $table) {
             $table->string('royaltyid', 30)->primary();
             $table->string('mobileno')->unique()->nullable();
           
            $table->string('name')->nullable();
           
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
