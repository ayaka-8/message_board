<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSolutionContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('solution_contacts', function (Blueprint $table) {
        //     //recipient_idカラムの追加
        //     $table->integer('recipient_id');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('solution_contacts', function (Blueprint $table) {
        //     $table->dropColumn('recipient_id');
        // });
    }
}
