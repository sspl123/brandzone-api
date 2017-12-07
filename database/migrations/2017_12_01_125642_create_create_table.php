<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ahlancustomers', function (Blueprint $table) {
            $table->string('name')->nullable();
       
 $table->string('royaltyid');
    $table->string('mobileno');

    $table->primary(['royaltyid', 'mobileno']);
              
         // $table->primary(array('royaltyid', 'mobileno'));
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
