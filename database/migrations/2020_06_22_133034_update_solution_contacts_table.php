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
        Schema::table('solution_contacts', function (Blueprint $table) {
            //recipient_nameカラムの追加
            $table->string('recipient_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solution_contacts', function (Blueprint $table) {
            //recipient_nameカラムの削除
            $table->dropColumn('recipient_name');
        });
    }
}
