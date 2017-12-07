<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardPointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reward_Point', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
		    $table->date('Date')->nullable();
			$table->integer('Point')->nullable();       
		    $table->integer('store_id')->unsigned();
            $table->foreign('store_id')->references('id')->on('stores');
			$table->string('miscellanceous')->nullable();
			$table->boolean('Debit')->nullable();
		    $table->boolean('Credit')->nullable();
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
        Schema::dropIfExists('Reward_Point');
    }
}
