<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateChallengeProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('challenge_profiles', function (Blueprint $table) {
            //user_idカラムの追加
            $table->integer('user_id');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('challenge_profiles', function (Blueprint $table) {
            //user_idカラムの削除
            $table->dropColumn('user_id');
        });
    }
}
