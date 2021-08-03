<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFormSectionFieldAutofillMode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_sections', function (Blueprint $table) {
            $table->string('fill_mode')->default('manual')->comment('specify auto-fill mode on section field values');
        });

        Schema::table('form_fields', function (Blueprint $table) {
            $table->string('alias_autofill')->nullable()->comment('alias of field name used in case of auto-fill mode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_sections', function (Blueprint $table) {
            $table->dropColumn('fill_mode');
        });

        Schema::table('form_fields', function (Blueprint $table) {
            $table->dropColumn('alias_autofill');
        });
    }
}
