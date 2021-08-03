<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddBaseFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->unsignedBigInteger('manager_id')
                    ->after('email')
                    ->default(0);
            $table->string('hash', 128)
                    ->after('manager_id')
                    ->unique()
                    ->nullable()
                    ->default(null);
            $table->string('status')
                    ->after('hash');
            $table->string('type')
                    ->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('manager_id');
            $table->dropColumn('hash');
            $table->dropColumn('status');
            $table->dropColumn('type');
        });
    }
}
