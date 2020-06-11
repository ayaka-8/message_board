<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengeProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('public_name');
            $table->string('logo_image')->nullable();
            $table->string('area');
            $table->string('address');
            $table->string('phone_number');
            $table->string('url');
            $table->string('challenge_keyword');
            $table->string('challenge_detail');
            $table->string('challenge_image')->nullable();
            $table->string('challenge_method');
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
        Schema::dropIfExists('challenge_profiles');
    }
}
