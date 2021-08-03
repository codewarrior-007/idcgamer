<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFormConditionsTableChangeParentId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_field_conditions', function (Blueprint $table) {
            $table->dropColumn('parent_id');
            $table->unsignedBigInteger('target_section_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form_field_conditions', function ($table) {
            $table->dropColumn('target_section_id');
            $table->unsignedBigInteger('parent_id')->default(0);
        });
    }
}
