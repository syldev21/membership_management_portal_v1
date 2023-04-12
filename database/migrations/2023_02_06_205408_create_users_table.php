<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('picture')->nullable();
            $table->integer('gender')->nullable();
            $table->dateTime('dob')->nullable();
            $table->string('phone')->nullable();
            $table->integer('marital_status_id')->nullable();
            $table->integer('estate_id')->nullable();
            $table->integer('cell_group_id')->nullable();
            $table->integer('employment_status_id')->nullable();
            $table->integer('born_again_id')->nullable();
            $table->integer('leadership_status_id')->nullable();
            $table->integer('ministry_id')->nullable();
            $table->integer('occupation_id')->nullable();
            $table->integer('education_level_id')->nullable();
            $table->integer('role_as')->default(0);
            $table->integer('age_cluster')->nullable();
            $table->string('ministries_of_interest')->nullable();
            $table->string('user_name')->nullable();
            $table->integer('active')->default(1);
            $table->integer('exists')->default(1);
            $table->string('password')->default(Hash::make(123456));
            $table->string('token')->nullable();
            $table->timestamp('token_expire')->nullable();
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
        Schema::dropIfExists('users');
    }
}
