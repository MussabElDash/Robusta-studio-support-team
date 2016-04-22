<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLabelsAndPrioritiesColorColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('labels', function (Blueprint $table) {
            $table->string('background_color')->change();
            $table->string('name_color')->change();
        });

        Schema::table('priorities', function (Blueprint $table) {
            $table->string('background_color')->change();
            $table->string('name_color')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('labels', function (Blueprint $table) {
            $table->integer('background_color')->change();
            $table->integer('name_color')->change();
        });

        Schema::table('priorities', function (Blueprint $table) {
            $table->integer('background_color')->change();
            $table->integer('name_color')->change();
        });
    }
}
