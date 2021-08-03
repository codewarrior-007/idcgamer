<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSignatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_signatures', function (Blueprint $table) {
            $table->id();
            $table->string('user_email')->nullable();
            $table->string('signature_id')->nullable();
            $table->string('account_id')->nullable();
            $table->string('app_id')->nullable();
            $table->string('event_type')->nullable();
            $table->string('event_hash')->nullable();
            $table->string('event_message')->nullable();
            $table->string('event_time')->nullable();
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
        Schema::dropIfExists('user_signatures');
    }
}
