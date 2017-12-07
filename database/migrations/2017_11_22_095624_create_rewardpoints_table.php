<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewardpoints', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
		    $table->date('Date')->nullable();
			$table->integer('Point')->nullable();       
		    $table->integer('store_id')->nullable();
            $table->foreign('store_id')->references('id')->on('stores');
			$table->string('miscellanceous')->nullable();
			$table->boolean('Debit')->nullable();
		    $table->boolean('Credit')->nullable();
			$table->string('storename')->nullable();
            $table->integer('storenameInArebic')->nullable();
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
        Schema::dropIfExists('rewardpoints');
    }
}
