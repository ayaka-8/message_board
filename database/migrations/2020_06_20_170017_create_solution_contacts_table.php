<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolutionContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solution_contacts', function (Blueprint $table) {
             $table->engine = 'InnoDB';
             $table->bigIncrements('id');
             $table->unsignedBigInteger('user_id');
             $table->string('name');
             $table->string('email');
             $table->string('subject');
             $table->string('content');
             $table->unsignedBigInteger('solution_id');
             $table->string('recipient_name');
             $table->timestamps();
        });
        //user_id外部キー制約
        Schema::table('solution_contacts', function ($table) {
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
        //recipient_id外部キー制約
        Schema::table('solution_contacts', function ($table) {
            $table->foreign('solution_id')
            ->references('id')
            ->on('solution_profiles')
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
        Schema::dropIfExists('solution_contacts');
    }
}
