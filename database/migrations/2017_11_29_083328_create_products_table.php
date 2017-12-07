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
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
		 $table->string('storename')->nullable();
		 $table->string('address')->nullable();
		 $table->string('city')->nullable();
		 $table->string('state')->nullable();
		 $table->integer('pinno')->nullable();
		 $table->integer('contactno')->nullable();
		 $table->string('email')->nullable()->unique();
		 $table->string('longitude')->nullable();
		 $table->string('latitude')->nullable();
		 $table->string('storenameinarabic')->nullable();
		$table->string('addressinarabic')->nullable();
		$table->string('cityinarabic')->nullable();
		$table->string('stateinarabic')->nullable();
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
        Schema::dropIfExists('stores');
    }
}
