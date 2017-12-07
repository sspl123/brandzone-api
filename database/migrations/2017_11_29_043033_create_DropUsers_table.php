<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDropUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
	Schema::dropIfExists('Rewardpoint');
	

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
	Schema::dropIfExists('Rewardpoint');
	}
}
