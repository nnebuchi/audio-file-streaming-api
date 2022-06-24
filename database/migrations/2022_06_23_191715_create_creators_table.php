<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('user_type')->nullable();
            $table->string('password');
            $table->string('public_name')->nullable();
            $table->string('corporate')->nullable();
            $table->string('year_of_inception')->nullable();
            $table->string('founder')->nullable();
            $table->string('lead_minister')->nullable();
            $table->string('phone')->nullable();
            $table->string('country_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->text('about_ministry')->nullable();
            $table->text('about_minister')->nullable();
            $table->text('profile_pic')->nullable();
            $table->text('logo')->nullable();
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
        Schema::dropIfExists('creators');
    }
}
