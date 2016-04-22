<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPrioritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('priorities', function( Blueprint $table )
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
        Schema::table('priorities', function( Blueprint $table )
        {
            $table->string('slug')->unique();
            $table->dropUnique('priorities_name_unique');
        });
    }
}
