<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('label', 'labels');

        Schema::table('labels', function( Blueprint $table )
        {
            $table->dropColumn('slug');
            $table->string('name')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('labels', 'label');
        Schema::table('label', function( Blueprint $table )
        {
            $table->string('slug')->unique();
            $table->dropUnique('label_name_unique');
        });
    }
}
