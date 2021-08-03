<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFormSectionsTableAddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_sections', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id')->after('id')->default(0);
            $table->unsignedTinyInteger('sort')->default(0);
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
            $table->dropColumn('page_id');
            $table->dropColumn('sort');
        });

    }
}
