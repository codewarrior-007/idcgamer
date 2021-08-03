<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserInvitesTableAddMoreColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_invites', function (Blueprint $table) {
            $table->dropForeign('user_invites_recipient_id_foreign');
        });

        Schema::table('user_invites', function (Blueprint $table) {
            $table->dropColumn('recipient_id');
            $table->string('email');
            $table->string('name');
            $table->string('code');
            $table->boolean('invite_sent')->default(0);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_invites', function (Blueprint $table) {
            $table->unsignedBigInteger('recipient_id')->nullable();
            $table->foreign('recipient_id')->references('id')->on('users');
            $table->dropColumn('email');
            $table->dropColumn('name');
            $table->dropColumn('code');
            $table->dropColumn('invite_sent');
        });
    }
}
