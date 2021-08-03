<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('field_id');
            $table->foreign('field_id')->references('id')->on('form_fields');
            $table->text('value');
            $table->string('secure');
            $table->integer('sort');
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
        Schema::table('user_entries', function (Blueprint $table) {
            $table->dropForeign('user_entries_user_id_foreign');
            $table->dropForeign('user_entries_field_id_foreign');
        });

        Schema::dropIfExists('user_entries');
    }
}
