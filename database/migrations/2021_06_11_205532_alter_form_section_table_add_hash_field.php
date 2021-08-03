<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFormSectionTableAddHashField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_sections', function ($table) {
            $table->string('hash', 128)
                    ->after('status')
                    ->unique()
                    ->nullable()
                    ->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_sections', function ($table) {
            $table->dropColumn('hash');
        });
    }
}
