<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solution_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('public_name');
            $table->string('logo_image')->nullable();
            $table->string('area');
            $table->string('address');
            $table->string('phone_number');
            $table->string('url');
            $table->string('solution_keyword');
            $table->string('solution_detail');
            $table->string('solution_performance');
            $table->string('solution_image')->nullable();
            $table->string('message');
            $table->string('contact_message');
            $table->string('contact_image')->nullable();
            $table->string('contact_email');
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
        Schema::dropIfExists('solution_profiles');
    }
}
