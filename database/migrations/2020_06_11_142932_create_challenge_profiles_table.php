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
            $table->engine = 'InnoDB';
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
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
        //user_idの外部キー制約
        Schema::table('challenge_profiles', function ($table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
