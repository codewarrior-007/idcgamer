<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserEntriesTableAddHash extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_entries', function (Blueprint $table) {
            $table->dropForeign('user_entries_field_id_foreign');
            $table->dropColumn('field_id');
        });

        Schema::table('user_entries', function (Blueprint $table) {
            $table->string('hash');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_entries', function ($table) {
            $table->dropColumn('hash');
        });

        Schema::table('user_entries', function (Blueprint $table) {
            $table->unsignedBigInteger('field_id');
            $table->foreign('field_id')->references('id')->on('form_fields');
        });
    }
}
