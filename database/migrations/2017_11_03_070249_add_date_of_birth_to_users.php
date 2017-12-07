<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateOfBirthToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
        $table->date('date_of_birth')->nullable();
		$table->string('gender')->nullable();
		$table->boolean('is_active')->nullable();
		$table->integer('role_id')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('users', function($table) {
        $table->date('date_of_birth');
		$table->string('gender');
		$table->boolean('is_active');
    });
    }
}
